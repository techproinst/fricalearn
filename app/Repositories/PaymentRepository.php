<?php

namespace App\Repositories;

use App\Enums\FeeStatus;
use App\Enums\PaymentStatus;
use App\Interfaces\PaymentInterface;
use App\Models\Payment;
use App\Models\PaymentDecline;
use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentRepository implements PaymentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function createPayment($data)
    {
        try {

            $payment = Payment::create($data);

            if (!$payment) {
                Log::error(message: "Payment could not be created");
                return null;
            }

            return $payment->refresh();
        } catch (Exception $e) {

            Log::error(message: "Payment error: " . $e->getMessage());

            throw $e;
        }
    }

    public function getPendingPayments()
    {
        return Payment::with([
            'student:id,name',
            'parent:id,name',
            'course:id,name',
            'courseLevel:id,level_name'
        ])->pending()->get();
    }

    public function approvePayment($data, $payment)
    {
        $payment = Payment::find($payment->id);

        $payment->update($data);

        $payment->refresh();

        return $payment;
    }

    public function markPaymentAsPaid($studentLevel)
    {
        $studentLevel->is_paid = FeeStatus::PAID->value;

        return  $studentLevel->save();
    }

    public function createSubscription($subscriptionData)
    {
        return Subscription::create($subscriptionData);
    }


    public function getApprovedPayments()
    {
        return Payment::with([
            'student:id,name',
            'parent:id,name',
            'course:id,name',
            'courseLevel:id,level_name'
        ])->approved()->get();
    }


    public function createPaymentDecline($mappedRequestDataDTO)
    {
        return PaymentDecline::create($mappedRequestDataDTO);
    }

    public function markPaymentAsDeclined($paymentId)
    {

        $payment = Payment::find($paymentId);

        $payment->status = PaymentStatus::Declined->value;

        return $payment->save();
    }


    public function getDeclinedPayments()
    {
        return Payment::with([
            'student:id,name',
            'parent:id,name',
            'course:id,name',
            'courseLevel:id,level_name',
        ])->declined()->get();
    }
    

    public function getApprovedPaymentsForParent($parentId)
    {
        return  Payment::with(['student', 'course', 'courseLevel'])
                       ->where('parent_id', $parentId)
                       ->approved()
                       ->paginate(1);
    }

    public function getPendingPaymentsForParent($parentId)
    {
        
        return  Payment::with(['student', 'course', 'courseLevel'])
                       ->where('parent_id', $parentId)
                       ->pending()
                       ->paginate(10);

    }


    public function getDeclinedPaymentsForParent($parentId)
    {
        return  Payment::with(['student', 'course', 'courseLevel'])
                       ->where('parent_id', $parentId)
                       ->declined()
                       ->paginate(10);
    }




























}
