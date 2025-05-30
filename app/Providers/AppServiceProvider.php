<?php

namespace App\Providers;

use App\Events\ParentRegisteredForDemoCourse;
use App\Interfaces\ClassScheduleInterface;
use App\Interfaces\ContactInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\CourseLevelInterface;
use App\Interfaces\CourseMaterialInterface;
use App\Interfaces\DemoCourseInterface;
use App\Interfaces\ParentInterface;
use App\Interfaces\PaymentInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\StudentScheduleInterface;
use App\Interfaces\SubscriptionInterface;
use App\Listeners\SendDemoCourseEmail;
use App\Repositories\ClassScheduleRepository;
use App\Repositories\ContactRepository;
use App\Repositories\CourseLevelRepository;
use App\Repositories\CourseMaterialRepository;
use App\Repositories\CourseRepository;
use App\Repositories\DemoCourseRepository;
use App\Repositories\ParentRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\StudentRepository;
use App\Repositories\StudentScheduleRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        $this->app->bind(StudentInterface::class, StudentRepository::class);
        $this->app->bind(StudentScheduleInterface::class, StudentScheduleRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);
        $this->app->bind(SubscriptionInterface::class, SubscriptionRepository::class);
        $this->app->bind(CourseLevelInterface::class, CourseLevelRepository::class);
        $this->app->bind(CourseMaterialInterface::class, CourseMaterialRepository::class);
        $this->app->bind(ContactInterface::class, ContactRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    
    public function boot()
    {
        // if (app()->environment('production')) {
        //     URL::forceScheme('https');
        // }
        
       Schema::defaultStringLength(191);

    }
}
