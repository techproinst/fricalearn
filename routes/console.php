<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


// Your custom command
Schedule::command('app:process-expired-subscriptions')
->everyMinute()
->withoutOverlapping();


// Process queued jobs
Schedule::command('queue:work --once')->everyMinute()
        ->withoutOverlapping();
   

   // cd /home/rombdjvllyaj/public_html/fricalearn && /usr/local/bin/php artisan schedule:run >> /dev/null 2>&1
    
