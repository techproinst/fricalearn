<?php

namespace App\DataTransferObjects\Payments;;

readonly class PaymentDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public readonly int $parent_id,
     public readonly int $student_id,
     public readonly int $course_id,
     public readonly int  $course_level_id,
     public readonly ?string $amount ,
     public readonly string $amount_due,
     public readonly ?string $payment_reference,
     public readonly string $invoice_no,
     public readonly string $transaction_reference,
     public readonly ?string $status,
     public readonly ?string $purpose,
     public readonly string $currency,
     public readonly string $payment_receipt,
    
    )
    {
   
    }

    public static function fromArray(array $array)
    {
         return new self(
            $array['parent_id'],
            $array['student_id'],
            $array['course_id'],
            $array['course_level_id'],
            $array['amount'] ?? null,
            $array['amount_due'],
            $array['payment_reference'] ?? null,
            $array['invoice_no'],
            $array['transaction_reference'],
            $array['status'] ?? null,
            $array['purpose'] ?? null,
            $array['currency'],
            $array['payment_receipt'],
         ); 
    }

    public  function toArray()
    {
        return [
            'parent_id' => $this->parent_id,
            'student_id' => $this->student_id,
            'course_id' => $this->course_id,
            'course_level_id' => $this->course_level_id,
            'amount' => $this->amount,
            'amount_due' => $this->amount_due,
            'payment_reference' => $this->payment_reference,
            'invoice_no' => $this->invoice_no,
            'transaction_reference' => $this->transaction_reference,
            'status' => $this->status,
            'purpose' => $this->purpose,
            'currency' => $this->currency,
            'payment_receipt' => $this->payment_receipt,    
        ];


    }



    




















}
