<?php

namespace App\Listeners;

use App\Events\Parents\ParentRegistered;
use App\Mail\VerifyEmail;
use Exception;
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
        try{

            Mail::to($event->parent->email)->send(new VerifyEmail($event->parent, $event->otp));

        }catch(Exception $e){
            Log::error(message:"Error occured while sending OTP email {$e->getMessage()}");
            throw $e;

        }
       
    }
}
