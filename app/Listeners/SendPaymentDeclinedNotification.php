<?php

namespace App\Listeners;

use App\Events\PaymentDeclined;
use App\Notifications\PaymentDeclinedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendPaymentDeclinedNotification
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
    public function handle(PaymentDeclined $event): void
    {
        try {

            $event->parent->notify(new PaymentDeclinedNotification(
                $event->data,
                $event->parent,
                $event->paymentData
            ));

        } catch (Throwable $th) {

            Log::error("Failed to send PaymentDeclinedNotification", [
                'parent_id' => $event->parent->id,
                'payment_id' => $event->paymentData->id,
                'error' => $th->getMessage(),
            ]);

            throw $th;
        }
    }   
}
