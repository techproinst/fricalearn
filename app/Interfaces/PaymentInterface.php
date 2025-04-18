<?php

namespace App\Interfaces;

interface PaymentInterface
{
    public function createPayment($data);

    public function getPendingPayments();

    public function approvePayment($data, $payment);

    public function markPaymentAsPaid($studentLevel);

    public function createSubscription($subscriptionData);

    public function getApprovedPayments();

    public function createPaymentDecline($mappedRequestDataDTO);

    public function markPaymentAsDeclined($paymentId);

    public function getDeclinedPayments();

    
}
