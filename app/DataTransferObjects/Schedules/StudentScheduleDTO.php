<?php

namespace App\DataTransferObjects\Schedules;

use App\Helpers\AppHelper;

readonly class StudentScheduleDTO
{  
    /**
     * Create a new class instance.
     */
    public function __construct
    (public readonly int $student_id,
     public readonly int  $course_id,
     public readonly int $class_schedule_id,
     public readonly string $day,
     public readonly string  $time,
     public readonly ?string $slot,
   
    )
    {
        //
    }


    public static function fromArray(array $array)
    {
        return new self(
            $array['student_id'],   
            $array['course_id'],
            $array['class_schedule_id'],
            $array['schedule']['day'],
            $array['schedule']['time'],
            $array['slot'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'student_id' => $this->student_id,
            'course_id' => $this->course_id,
            'class_schedule_id' => $this->class_schedule_id,
            'day' => $this->day,
            'class_time' => AppHelper::convertToUTC($this->time),
            'slot' => $this->slot ?? 'N/A',

        ];
    }
}
