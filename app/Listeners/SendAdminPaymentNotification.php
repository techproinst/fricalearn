<?php

namespace App\Listeners;

use App\Events\PaymentInitiated;
use App\Notifications\AdminPaymentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAdminPaymentNotification
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
    public function handle(PaymentInitiated $event): void
    {     
        try {
            foreach($event->admins as $admin){
            
                $admin->notify(new AdminPaymentNotification($admin, $event->paymentDetails));
            }
        } catch (\Exception $e) {
        
            Log::error("Error in PaymentInitiated listener: {$e->getMessage()}");
            
             throw $e;
        }

        
    }
}
