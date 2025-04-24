<?php

namespace App\Providers;

use App\Events\Parents\ParentRegistered;
use App\Events\Parents\ParentRegisteredForDemoCourse;
use App\Events\Payments\PaymentApproved;
use App\Events\Payments\PaymentDeclined;
use App\Events\Payments\PaymentInitiated;
use App\Events\Schedules\ClassLinkScheduled;
use App\Listeners\SendAdminPaymentNotification;
use App\Listeners\SendClassLinkNotification;
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
        ],
        ClassLinkScheduled::class => [
            SendClassLinkNotification::class,
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
