<?php

namespace App\Repositories;

use App\Interfaces\StudentScheduleInterface;
use App\Models\StudentSchedule;
use Exception;
use Illuminate\Support\Facades\Log;

class StudentScheduleRepository implements StudentScheduleInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeStudentClassSchedule($studentScheduleData)
    {

        return StudentSchedule::create($studentScheduleData);
    }


    public function getStudentSchedule($studentId)
    {
        return StudentSchedule::where('student_id', $studentId)->first();
    }

    public function getStudentByClassSchedule($classSchedule)
    {
        $studentSchedules = StudentSchedule::with(['student.parent'])
            ->where('class_schedule_id', $classSchedule->id)
            ->where('day', $classSchedule->day)
          //  ->where('session', $classSchedule->session)
            ->get();


        $data = $studentSchedules->map(function ($schedule) {

            return [
                'student' => $schedule->student,
                'parent' => $schedule->student->parent,
            ];

        });

        return $data;
    }
}
