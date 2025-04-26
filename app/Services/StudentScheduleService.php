<?php

namespace App\Services;

use App\DataTransferObjects\Schedules\StudentScheduleDTO;
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
        $mappedStudentScheduleData = $this->mapStudentSchedule($request);

        return $this->studentScheduleInterface->storeStudentClassSchedule($mappedStudentScheduleData);
    }

    public function mapStudentSchedule($request)
    {     
        return   StudentScheduleDTO::fromArray($request)->toArray();
    }
}
