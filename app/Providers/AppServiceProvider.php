<?php

namespace App\Providers;

use App\Events\ParentRegisteredForDemoCourse;
use App\Interfaces\ClassScheduleInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\DemoCourseInterface;
use App\Interfaces\ParentInterface;
use App\Listeners\SendDemoCourseEmail;
use App\Repositories\ClassScheduleRepository;
use App\Repositories\CourseRepository;
use App\Repositories\DemoCourseRepository;
use App\Repositories\ParentRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DemoCourseInterface::class, DemoCourseRepository::class);
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(ParentInterface::class, ParentRepository::class);
        $this->app->bind(ClassScheduleInterface::class, ClassScheduleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
    }
}
