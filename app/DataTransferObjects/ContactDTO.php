<?php

namespace App\DataTransferObjects;

readonly class ContactDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $subject,
        public readonly string $message
    ) {
        //
    }


    public static function fromRequest(array $validatedData): self
    {
        return new self(
            firstname: $validatedData['firstname'],
            lastname: $validatedData['lastname'],
            email: $validatedData['email'],
            phone: $validatedData['phone'],
            subject: $validatedData['subject'],
            message: $validatedData['message'],

        );
    }


    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ];
    }
}
