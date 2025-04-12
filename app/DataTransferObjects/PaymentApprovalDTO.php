<?php

namespace App\DataTransferObjects;

readonly class PaymentApprovalDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public readonly int $amount,
     public readonly string $payment_reference,
     public readonly ?string $purpose,
     public readonly ?string  $description,
     public readonly string $status,

    )
    {
        
    }



    public static function fromArray(array $array)
    {
        return new  self(
            $array['amount'],
            $array['payment_reference'],
            $array['purpose'] ?? null,
            $array['description'] ?? null,
            $array['status'],
        );
    }



    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'payment_reference' => $this->payment_reference,
            'purpose' => $this->purpose,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }



}
