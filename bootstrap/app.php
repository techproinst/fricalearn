<?php

use App\Http\Middleware\EnsureStudentHasActiveSubscription;
use App\Http\Middleware\EnsureUserIsParent;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isParent' => EnsureUserIsParent::class,
            'active_subscription' => EnsureStudentHasActiveSubscription::class,

        ]);
    })
     ->withSchedule(function (Schedule $schedule) {
        $schedule->command('queue:work --once')
            ->everyMinute()
            ->runInBackground()
            ->appendOutputTo(storage_path('logs/queue.log'));

        // Optional: schedule additional logic
        // $schedule->job(new Heartbeat)->everyFiveMinutes();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
