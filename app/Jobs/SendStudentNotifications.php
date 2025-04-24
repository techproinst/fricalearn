<?php

namespace App\Jobs;

use App\Helpers\RepositoryHelper;
use App\Mail\StudentClassLinkNotification;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendStudentNotifications implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected $classScheduleId,

    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(RepositoryHelper $repositoryHelper): void
    {
        $classScheduleData = $repositoryHelper->getClassSheduleById($this->classScheduleId);
        $studentsAndParents = $repositoryHelper->getStudentByClassSchedule($classScheduleData);


        foreach ($studentsAndParents as $entry) {
            $student = $entry['student'];
            $parent = $entry['parent'];

            try {

                Mail::to($parent->email)->send(new  StudentClassLinkNotification($parent, $student, $classScheduleData));
                
            } catch (Exception $e) {

                Log::error("Failed to send email to {$parent->email}: " . $e->getMessage());
            }
        }
    }
}
