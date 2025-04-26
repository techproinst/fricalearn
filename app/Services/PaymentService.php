<?php

namespace App\Services;

use App\DataTransferObjects\Payments\PaymentApprovalDTO;
use App\DataTransferObjects\Payments\PaymentDeclineDTO;
use App\DataTransferObjects\Payments\PaymentDTO;
use App\DataTransferObjects\Subscriptions\SubscriptionDTO;
use App\Enums\Continent;
use App\Enums\PaymentStatus;
use App\Events\Payments\PaymentApproved;
use App\Events\Payments\PaymentDeclined;
use App\Events\Payments\PaymentInitiated;
use App\Helpers\AppHelper;
use App\Helpers\RepositoryHelper;
use App\Interfaces\PaymentInterface;
use Carbon\CarbonImmutable;
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
        private RepositoryHelper $repositoryHelper,
        private AppHelper $appHelper,
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
        return $this->appHelper->handleFileUpload(request: $request,  field: 'payment_receipt');
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
        //   $data['amount'] = $request->amount;
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

            return  DB::transaction(function () use ($request, $payment) {

                $paymentData = $this->PaymentApproval($request, $payment);

                if (!$paymentData) {
                    throw new Exception("Payment could not be approved");
                }

                $isMarked = $this->markPaymentAsPaid($request->student_id);

                if (!$isMarked) {
                    throw new Exception("Payment could not be marked as paid");
                }


                $subscription =  $this->handleSubscription($paymentData);

                if (!$subscription) {
                    Log::error('creating subscription failed');
                }


                $this->sendPaymentApprovalNotifcation($paymentData);


                return true;
            });
        } catch (Exception $e) {

            Log::error(message: "Payment approval error:" . $e->getMessage());

            return null;
        }
    }


    public function PaymentApproval($request, $payment)
    {

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

        return $this->repositoryHelper->getCourseLevelDetails($studentLevel);
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

        return $this->paymentInterface->markPaymentAsPaid($studentLevel);
    }

    public function sendPaymentApprovalNotifcation($paymentData)
    {
        $parent = $this->getStudentByParent($paymentData);

        event(new PaymentApproved($parent, $paymentData));
    }

    public function handleSubscription($paymentData)
    {
        try {


            $data = $this->mapSubscriptionPaymentData($paymentData);

            $subscriptionData = $this->mapPaymentDataToSubscriptionDTO($data);

            return $this->paymentInterface->createSubscription($subscriptionData);
        } catch (Exception $e) {

            Log::error(message: 'creating subscription error' . $e->getMessage());

            throw $e;
        }
    }


    public function mapSubscriptionPaymentData($paymentData): array
    {

        $startDate =  CarbonImmutable::now();
        $endDate = AppHelper::calculateMonthlySubscriptionEndDate($startDate);

        $data = [];

        $data['parent_id'] = $paymentData->parent_id;
        $data['student_id'] = $paymentData->student_id;
        $data['course_level_id'] = $paymentData->course_level_id;
        $data['payment_id'] = $paymentData->id;
        $data['start_date'] = $startDate;
        $data['end_date'] = $endDate;
        $data['is_active'] = true;


        return $data;
    }



    public function mapPaymentDataToSubscriptionDTO(array $data)
    {
        return SubscriptionDTO::fromArray($data)->toArray();
    }

    /**
     * This function will get all payment approved by an admin
     */
    public function handleApprovedPayments()
    {
        return $this->paymentInterface->getApprovedPayments();
    }

    public function processDeclinedPayment($request,  $payment)
    {
        try {

            return  DB::transaction(function () use ($request, $payment) {

                $declineData = $this->handleDeclinePayment($request);

                $isMarked = $this->markPaymentAsDeclined($payment->id);

                if (!$isMarked) {
                    return false;
                }

                $this->sendPaymentDeclinedNotification($declineData, $payment);

                return true;
            });
        } catch (Exception $e) {

            Log::error(message: "error while processing payment decline: {$e->getMessage()}");
            return null;
        }
    }


    public function handleDeclinePayment($request)
    {
        try {

            $mappedData = $this->mapDeclineRequestData($request);

            $dto = $this->mapRequestDataToPaymentDeclineDTO($mappedData);

            return $this->paymentInterface->createPaymentDecline($dto);
        } catch (Exception $e) {
            Log::error(message: "error occured while processing payment decline for payment with id {$request->payment->id}");
            throw $e;
        }
    }


    public function mapDeclineRequestData($request): array
    {
        $admin = AppHelper::getAuthAdmin();

        return [
            'payment_id' => $request['payment_id'],
            'admin_id' => $admin->id,
            'decline_reason' => $request['decline_reason'],
        ];
    }

    public function mapRequestDataToPaymentDeclineDTO(array $data)
    {
        return PaymentDeclineDTO::fromArray($data)->toArray();
    }

    public function markPaymentAsDeclined($payment)
    {
        return $this->paymentInterface->markPaymentAsDeclined($payment);
    }

    public function sendPaymentDeclinedNotification($data, $paymentData)
    {

        $parent = $this->getStudentByParent($paymentData);

        event(new PaymentDeclined($data, $parent, $paymentData));
    }


    public function getStudentByParent($paymentData)
    {
        $student = $this->repositoryHelper->getStudentByParent($paymentData->student_id, $paymentData->parent_id);
        $parent = $student->parent;

        return $parent;
    }


    public function handleGetDeclinePayment()
    {
        return $this->paymentInterface->getDeclinedPayments();
    }
}
