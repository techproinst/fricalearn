<?php

namespace App\Services;

use App\DataTransferObjects\ContactDTO;
use App\Events\ContactFormSubmitted;
use App\Http\Requests\StoreContactFormRequest;
use App\Interfaces\ContactInterface;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ContactInterface $contactInterface,
        public UserService $userService
    ) {
        //
    }


    public function handleContactForm(array $validatedData)
    {
        $dto = $this->mapRequestDataToDto(validatedData: $validatedData);

        $contactData = $this->contactInterface->storeContactForm(dto: $dto);
        
        if(!$contactData){
            throw new Exception('Contact data could not be saved');
        }

        $this->dispatchAdminNotification(contactData: $contactData);
    }


    public function mapRequestDataToDto(array $validatedData)
    {
        return ContactDTO::fromRequest($validatedData);
    }

    public function dispatchAdminNotification(Contact $contactData)
    {
        $admins = $this->userService->getAdminUser();

        event(new ContactFormSubmitted($admins, $contactData));
    }
}
