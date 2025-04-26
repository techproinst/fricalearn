<?php

namespace App\Listeners;

use App\Events\Parents\ParentRegisteredForDemoCourse;
use App\Repositories\DemoCourseRepository;
use App\Mail\DemoCourseEmail;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendDemoCourseEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(public DemoCourseRepository $demoCourseRepository)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ParentRegisteredForDemoCourse $event): void
    {
        try {

            $parent = $this->demoCourseRepository->getParentDemoCourses($event->parentData->id);
            $parentCourse = $parent->course;
            $demoCourseLinks = $parent->demoCourseLinks;

            Mail::to($event->parentData->email)->send(new DemoCourseEmail($event->parentData, $parentCourse, $demoCourseLinks));
            
        } catch (Exception $e) {
            Log::error(message: "Error while sending notification {$e->getMessage()}");
            throw $e;
        }
    }
}
