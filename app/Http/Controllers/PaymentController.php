<?php

namespace App\Http\Controllers;

use App\Enums\ContinentGroup;
use App\Http\Requests\StoreDeclinePaymentRequest;
use App\Http\Requests\StorePaymentApprovalRequest;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\CourseLevel;
use App\Models\Student;
use App\Models\StudentCourseLevel;
use App\Services\LocationService;
use App\Services\PaymentService;
use App\Services\StudentService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct(
        public LocationService $locationService,
        public StudentService $studentService,
        private PaymentService $paymentService,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function showPaymentPage(Student $student)
    {
        $studentSchedule = $this->studentService->handleCheckStudentSchedule($student->id);

        if (!$studentSchedule) {
            return redirect()->route('student.schedule', ['student' => $student->id]);
        }

        list($amount, $continent) = $this->studentService->getStudentPaymentAmount($student->id);

        if (is_null($amount) || is_null($continent)) {

            ToastMagic::error("Unable to determine payment amount");
            return redirect()->route('parent.enrollments');
        }

        return view('pages.payment', compact('amount', 'student', 'continent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {

        $payment  = $this->paymentService->handleStudentPayment($request);

        if (!$payment) {

            ToastMagic::error('An error occured during payment processing');
            return redirect()->route('payment.enrollments');
        }

        ToastMagic::success('Payment receipt uploaded successfully');
        return redirect()->route('payment.processing');
    }

    public function loadProcessingPage()
    {

        return view('pages.payment_processing');
    }

    public function getPayments()
    {
        $pendingPayments =  $this->paymentService->handlePendingPayments();
        $approvedPayments = $this->paymentService->handleApprovedPayments();
        $declinedPayments = $this->paymentService->handleGetDeclinePayment();

        return view('admin.payments.index', compact('pendingPayments', 'approvedPayments', 'declinedPayments'));
    }

    public function approvePayment(StorePaymentApprovalRequest $request, Payment $payment)
    {
        $isVerified =  $this->paymentService->verifyAmountPaid($request);

        if (!$isVerified) {
            Log::error(message: "Wrong amount paid for student with ID: $request->student_id");
            ToastMagic::error('Wrong amount entered!!');
            return back();
        }

        $isApproved = $this->paymentService->handlePaymentApproval($request, $payment);

        if (!$isApproved) {
            ToastMagic::error('An error occured during payment approval!!');
            return back();
        }


        ToastMagic::success('Payment Approved successfully');
        return back();
    }

    /**
     * This function  decline payment made by a parent
     */
    public function declinePayment(StoreDeclinePaymentRequest $request, Payment $payment)
    {
        $isDeclined = $this->paymentService->processDeclinedPayment($request->validated(), $payment);

        if (!$isDeclined) {
            ToastMagic::error("Payment decline could not not be processed!!");
            return back();
        }

        ToastMagic::success("Payment declined successfully");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
