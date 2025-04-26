<?php

namespace App\Listeners;

use App\Events\Payments\PaymentApproved;
use App\Notifications\PaymentApprovedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

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
        try {

            $event->parent->notify(new PaymentApprovedNotification($event->parent, $event->paymentData));
        } catch (Throwable $th) {
            Log::error("Failed to send PaymentApprovalNotification", [
                'parent_id' => $event->parent->id,
                'payment_id' => $event->paymentData->id,
                'error' => $th->getMessage(),
            ]);

            throw $th;
        }

     
    }
}
