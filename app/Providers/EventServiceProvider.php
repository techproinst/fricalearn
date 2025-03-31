<?php

namespace App\Providers;

use App\Events\ParentRegisteredForDemoCourse;
use App\Listeners\SendDemoCourseEmail;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{


    protected $listen = [
        ParentRegisteredForDemoCourse::class => [
            SendDemoCourseEmail::class,
        ],

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
