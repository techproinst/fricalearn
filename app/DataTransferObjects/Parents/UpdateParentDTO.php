<?php

namespace App\DataTransferObjects\Parents;

readonly class UpdateParentDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $phone,
        public readonly string $password,
        public readonly string $profilePhoto,

    ) {}

    
    public function toArray(): array
    {

        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'password' => $this->password,
            'profile_photo' => $this->profilePhoto,

        ];
    }
}
