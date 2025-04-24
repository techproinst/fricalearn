<?php

namespace App\Listeners;

use App\Events\Schedules\ClassLinkScheduled;
use App\Jobs\SendStudentNotifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendClassLinkNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassLinkScheduled $event): void
    {   
        SendStudentNotifications::dispatch($event->classScheduleId);
    }
}
