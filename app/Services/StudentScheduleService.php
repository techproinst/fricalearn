<?php

namespace App\Services;

use App\Interfaces\StudentScheduleInterface;

class StudentScheduleService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public StudentScheduleInterface $studentScheduleInterface)
    {
        //
    }

    public function handleCreateStudentSchedule($request)
    {
       return $this->studentScheduleInterface->storeStudentClassSchedule($request);
    }
}
