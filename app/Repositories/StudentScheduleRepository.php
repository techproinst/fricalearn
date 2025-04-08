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

    public function storeStudentClassSchedule($request)
    {   

        $schedules = [];

        foreach($request->input('schedule') as $day => $data) {

        $schedules[] = [
                'student_id' => $request->student_id,
                'course_id' => $request->course_id,
                'class_schedule_id' => $request->class_schedule_id,
                'day' => $day,
                'slot' => 'morning_afternoon',
                'class_time' => $data['time'],
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }


        if(!empty($schedules)){
            StudentSchedule::insert($schedules);
        }

        return $schedules;

        

    
    }
}
