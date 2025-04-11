<?php

namespace App\Interfaces;

interface PaymentInterface
{
    public function createPayment($data);

    public function getPendingPayments();
}
