<?php

namespace App\DataTransferObjects\Schedules;

readonly class UpcomingClassLinkDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $morningLink,
        public readonly string $afternoonLink
    ) {}

    public static function fromRequest(array $validatedData): self
    {
        return new self(
            morningLink: $validatedData['morning_link'],
            afternoonLink: $validatedData['afternoon_link'],

        );
    }


    public function toArray()
    {
        return [
            'morning_link' => $this->morningLink,
            'afternoon_link' => $this->afternoonLink,

        ];
    }
}
