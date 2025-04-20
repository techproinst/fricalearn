<?php

namespace App\Providers;

use App\Views\Composers\ParentDataComposer;
use Illuminate\Support\ServiceProvider;

class ShareDataServiceProvider extends ServiceProvider
{
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
        view()->composer(['pages.parents.*'], ParentDataComposer::class);
    }
}
