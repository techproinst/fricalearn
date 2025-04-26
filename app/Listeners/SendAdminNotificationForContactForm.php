<?php

namespace App\Listeners;

use App\Events\ContactFormSubmitted;
use App\Notifications\AdminContactFormNotification;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendAdminNotificationForContactForm
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactFormSubmitted $event): void
    {
        try {

            foreach ($event->admins as $admin){
                   
                $admin->notify(new AdminContactFormNotification($admin, $event->contactData));
            }

        }catch(Exception $e){

            Log::error("Error while sending AdminContactFormNotification: {$e->getMessage()}");
            
            throw $e;

        }
    }
}
