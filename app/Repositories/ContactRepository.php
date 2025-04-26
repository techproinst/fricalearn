<?php

namespace App\Repositories;

use App\DataTransferObjects\ContactDTO;
use App\Interfaces\ContactInterface;
use App\Models\Contact;

class ContactRepository implements ContactInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function storeContactForm(ContactDTO $dto)
    {
        $contactData = Contact::create($dto->toArray());

        if ($contactData) {
            return $contactData->refresh();
        }

        return null;
    }
}
