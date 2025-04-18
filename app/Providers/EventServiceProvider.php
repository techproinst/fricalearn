<?php

namespace App\Providers;

use App\Events\ParentRegistered;
use App\Events\ParentRegisteredForDemoCourse;
use App\Events\PaymentApproved;
use App\Events\PaymentDeclined;
use App\Events\PaymentInitiated;
use App\Listeners\SendAdminPaymentNotification;
use App\Listeners\SendDemoCourseEmail;
use App\Listeners\SendParentEmailVerificationOtp;
use App\Listeners\SendPaymentApprovalNotification;
use App\Listeners\SendPaymentDeclinedNotification;
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

        ],
        PaymentApproved::class => [
            SendPaymentApprovalNotification::class,
        ],
        PaymentDeclined::class => [
            SendPaymentDeclinedNotification::class,
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
