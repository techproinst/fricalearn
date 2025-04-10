<?php

namespace App\Providers;

use App\Events\ParentRegistered;
use App\Events\ParentRegisteredForDemoCourse;
use App\Events\PaymentInitiated;
use App\Listeners\SendAdminPaymentNotification;
use App\Listeners\SendDemoCourseEmail;
use App\Listeners\SendParentEmailVerificationOtp;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{


    protected $listen = [
        ParentRegisteredForDemoCourse::class => [
            SendDemoCourseEmail::class,
        ],
        ParentRegistered::class => [
            SendParentEmailVerificationOtp::class,

        ],
        PaymentInitiated::class => [
            SendAdminPaymentNotification::class,

        ]

    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
