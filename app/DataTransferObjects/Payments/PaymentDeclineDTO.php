<?php

namespace App\DataTransferObjects\Payments;;

readonly class PaymentDeclineDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly int $payment_id,
        public readonly int $admin_id,
        public readonly string $decline_reason
    ) {}

    public static function fromArray(array $array):self
    {
        return new self(
            $array['payment_id'],
            $array['admin_id'],
            $array['decline_reason'],

        );
    }

    public function toArray():array
    {
        return [
            'payment_id' => $this->payment_id,
            'admin_id' => $this->admin_id,
            'decline_reason' => $this->decline_reason,

        ];
    }



}
