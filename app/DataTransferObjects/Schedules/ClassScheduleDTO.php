<?php

namespace App\DataTransferObjects\Schedules;

use App\Helpers\AppHelper;

readonly class ClassScheduleDTO
{
   public function __construct
   (public readonly int $course_id,
    public readonly int $course_level_id,
  //  public readonly string $continent,
    public readonly int $timezone_group_id,
    public readonly string $day,
    public readonly string $morning_time,
    public readonly string $afternoon_time,
   )
   {
    
   }


   public  function toArray():array 
   {
    return [
      'course_id' => $this->course_id,
      'course_level_id' => $this->course_level_id,
     // 'continent' => $this->continent,
      'timezone_group_id' => $this->timezone_group_id,
      'day' => $this->day,
      'morning_time' => AppHelper::convertToUTC($this->morning_time), 
      'afternoon_time' => AppHelper::convertToUTC($this->afternoon_time),

    ];
   }


   public static function fromArray(array $array) 
   {
      return new self(
        $array['course_id'],
        $array['course_level_id'],
       // $array['continent'],
        $array['timezone_group_id'],
        $array['day'],
        $array['morning_time'],
        $array['afternoon_time'],
      );

   }











}
