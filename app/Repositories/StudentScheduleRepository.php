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


    public function getStudentScheduleById(int $studentId)
    {
      // return StudentSchedule::with('classSchedule.courseLevel.course')->where('student_id', $studentId)->first();
      return StudentSchedule::with([
        'classSchedule' => function ($query) {
            $query->select('id', 'day','course_level_id', 'morning_time', 'afternoon_time', 'morning_link', 'afternoon_link');

        },
        'classSchedule.courseLevel' => function ($query) {
            $query->select('id', 'course_id', 'level_name', 'description');
        },
        'classSchedule.courseLevel.course' => function ($query) {
            $query->select('id', 'description');

        },
      ])->where('student_id', $studentId)->first();

    }
}
