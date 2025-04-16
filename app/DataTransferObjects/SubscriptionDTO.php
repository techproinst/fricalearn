<?php

namespace App\DataTransferObjects;

readonly class SubscriptionDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public readonly int $parent_id,
     public readonly int $student_id,
     public readonly int $course_level_id,
     public readonly int $payment_id,
     public readonly string $start_date,
     public readonly string $end_date,
     public readonly bool $is_active,
    )
    {
        
    }


    public static function fromArray(array $array)
    {
        return new self(
            $array['parent_id'],
            $array['student_id'],
            $array['course_level_id'],
            $array['payment_id'],
            $array['start_date'],
            $array['end_date'],
            $array['is_active'],
        );
    }


    public function toArray()
    {
        return [
            'parent_id' => $this->parent_id,
            'student_id' => $this->student_id,
            'course_level_id' => $this->course_level_id,
            'payment_id' => $this->payment_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_active' => $this->is_active,

        ];
    }







}
