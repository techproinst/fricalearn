<?php

namespace App\Listeners;

use App\Events\PaymentApproved;
use App\Notifications\PaymentApprovedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPaymentApprovalNotification
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
    public function handle(PaymentApproved $event): void
    {
          $event->parent->notify(new PaymentApprovedNotification($event->parent, $event->paymentData));
    }
}
