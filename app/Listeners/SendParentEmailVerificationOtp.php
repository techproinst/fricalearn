<?php

namespace App\Listeners;

use App\Events\ParentRegistered;
use App\Mail\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendParentEmailVerificationOtp
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
    public function handle(ParentRegistered $event): void
    {   
        //Log::info($event->otp);
        Mail::to($event->parent->email)->send(new VerifyEmail($event->parent, $event->otp));
    }
}
