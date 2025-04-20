<?php

namespace App\DataTransferObjects\Students;

readonly class UpdateStudentDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $birthday,
        public readonly string $ageRange,
        public readonly string $profilePhoto,
    ) {}

    public function toArray(): array 
    {
        return [
            'name' => $this->name,
            'birthday' => $this->birthday,
            'age_range' => $this->ageRange,
            'profile_photo' => $this->profilePhoto,

        ];
    }

    



}
