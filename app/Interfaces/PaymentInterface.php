<?php

namespace App\Interfaces;

interface PaymentInterface
{
    public function createPayment($data);

    public function getPendingPayments();

    public function approvePayment($data, $payment);

    public function markPaymentAsPaid($studentLevel);

    
}
