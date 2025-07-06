<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


// Your custom command
Schedule::command('app:process-expired-subscriptions')->everyMinute()->runInBackground();

// Process queued jobs
Schedule::command('queue:process')->everyMinute()
    ->appendOutputTo(storage_path('logs/queue.log'))
    ->runInBackground();

// Optional test
Schedule::command('inspire')->everyMinute()->appendOutputTo(storage_path('logs/test.log'));