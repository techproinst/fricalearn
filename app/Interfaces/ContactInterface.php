<?php

namespace App\Interfaces;

use App\DataTransferObjects\ContactDTO;

interface ContactInterface
{
    public function storeContactForm(ContactDTO $dto);
}
