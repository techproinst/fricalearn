<?php

namespace App\Services;

use App\DataTransferObjects\PaymentApprovalDTO;
use App\DataTransferObjects\PaymentDTO;
use App\Enums\Continent;
use App\Enums\PaymentStatus;
use App\Events\PaymentInitiated;
use App\Helpers\RepositoryHelper;
use App\Interfaces\PaymentInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public PaymentInterface $paymentInterface,
        public StudentService $studentService,
        public UserService $userService,
        public RepositoryHelper $repositoryHelper,
    ) {
        //
    }

    public function handleStudentPayment($request)
    {
        try {

            return   DB::transaction(function () use ($request) {

                $paymentDetails = $this->handlePayment($request);

                if (!$paymentDetails) {
                    throw new Exception('payment details not available');
                }

                $notification = $this->sendAdminPaymentNotification($paymentDetails);

                if (!$notification) {
                    throw new Exception('Admin Notification not sent');
                }

                return true;
            });
        } catch (Exception $e) {

            Log::error(message: "Student payment error: {$e->getMessage()}");

            return false;
        }
    }

    public function sendAdminPaymentNotification($paymentDetails)
    {
        try {

            $admins = $this->userService->getAdminUser();

            if (event(new PaymentInitiated($admins, $paymentDetails))) {
                return true;
            }

            return false;
        } catch (Exception $e) {

            Log::error(message: "Error sending email: {$e->getMessage()}");

            throw $e;
        }
    }

    public function handlePayment($request)
    {
        $paymentReceipt = $this->handleFileUpload($request);

        if (!$paymentReceipt) {
            return null;
        }

        //  dd($paymentReceipt);

        $parentId = Auth::guard('parent')->user()->id;
        $student = $this->studentService->getStudentCourseLevel($request->student_id);

        if (!$student) {
            Log::error(message: "Student course level details for : {$request->student_id} not found");
            return null;
        }

        $data = $this->mapPaymentData(request: $request, parentId: $parentId, student: $student, paymentReceipt: $paymentReceipt);

        $paymentDataDTO = $this->mapDataToPaymentDTO(data: $data);

        return $this->paymentInterface->createPayment($paymentDataDTO);
    }

    public function handleFileUpload($request)
    {
        if (!$request->hasFile('payment_receipt')) {
            Log::error('Payment receipt upload failed: No file received');
            return null;
        }

        $paymentReceipt = $request->file('payment_receipt');
        $rad = mt_rand(1000, 9999);

        $paymentReceiptName = md5($paymentReceipt->getClientOriginalName()) . $rad . '.' . $paymentReceipt->getClientOriginalExtension();

        $filePath =  $paymentReceipt->storeAs('uploads', $paymentReceiptName);

        if (!$filePath) {
            Log::error('Payment receipt upload failed: Unable to store file');
            return null;
        }

        return  $paymentReceiptName;
    }

    public function  genUniqueTransactionNumber(string $prefix): string
    {

        $part1 = rand(1000, 9999);

        $part2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4));


        $part3 = rand(1000, 9999);

        $part4 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3));

        return "$prefix-" . $part1 . '-' . $part2 . '-' . $part3 . '-' . $part4;
    }

    public function mapPaymentData(object $request, int $parentId, object $student,  string $paymentReceipt): array
    {
        $data = [];

        $continent = Continent::tryFrom($request->continent);

        $data['parent_id'] = $parentId;
        $data['student_id'] = $request->student_id;
        $data['course_id']  = $student->course_id;
        $data['course_level_id'] = $student->course_level_id;
        $data['amount'] = $request->amount;
        $data['amount_due'] = $request->amount;
        $data['invoice_no'] = $this->genUniqueTransactionNumber(prefix: 'INV');
        $data['transaction_reference'] = $this->genUniqueTransactionNumber(prefix: 'TRX');
        $data['status'] = PaymentStatus::Pending->value;
        $data['currency'] = Continent::mapToCurrency($continent) ?? 'N/A';
        $data['payment_receipt'] = $paymentReceipt;


        return $data;
    }


    public function mapDataToPaymentDTO(array $data): array
    {
        return PaymentDTO::fromArray($data)->toArray();
    }



    public function handlePendingPayments()
    {
        return  $this->paymentInterface->getPendingPayments();
    }

    public function verifyAmountPaid($request)
    {
        $amountDue = (float) $request->amount_due;
        $amountPaid = (float) $request->amount;
        $epilson = 0.01;

        return abs($amountDue - $amountPaid) < $epilson;
    }

    public function handlePaymentApproval($request, $payment)
    {
        try {

            $isApproved = $this->PaymentApproval($request, $payment);

            if (!$isApproved) {
                throw new Exception("Payment could not be approved");
            }


        } catch (Exception $e) {


        }
    }


    public function PaymentApproval($request, $payment)
    {
        $isVerified =  $this->verifyAmountPaid($request);

        if (!$isVerified) {
            return false;
        }

        $levelDetails = $this->getCourseLevelDetails($request);

        if (!$levelDetails) {
            Log::error(message: "Course level details not found for student with id: $request->student_id");

            return false;
        }

        $mappedData =  $this->mapPaymentApprovalData($request, $levelDetails);

        $data = $this->mapPaymentToApprovalDTO($mappedData);

        return $this->paymentInterface->approvePayment($data, $payment);
    }


    public function getCourseLevelDetails($request)
    {
        $studentLevel = $this->repositoryHelper->getStudentCourseLevel($request->student_id);

        $courseLevelDetails = $this->repositoryHelper->getCourseLevelDetails($studentLevel);

        return $courseLevelDetails;
    }

    public function mapPaymentApprovalData($request, $levelDetails): array
    {


        $data = [];

        $data['amount'] = $request->amount;
        $data['payment_reference'] = $request->payment_reference;
        $data['purpose'] = $levelDetails->purpose;
        $data['description'] = $levelDetails->description;
        $data['status'] = PaymentStatus::Success->value;


        return $data;
    }


    public function mapPaymentToApprovalDTO($data)
    {
        return PaymentApprovalDTO::fromArray($data)->toArray();
    }


    public function markPaymentAsPaid($studentId)
    {
        $studentLevel = $this->repositoryHelper->getStudentCourseLevel($studentId);

        //dd($studentLevel);

        return $this->paymentInterface->markPaymentAsPaid($studentLevel);
    }
}
