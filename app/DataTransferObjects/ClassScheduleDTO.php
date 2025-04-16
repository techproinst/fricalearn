<?php

namespace App\DataTransferObjects;

use App\Helpers\AppHelper;

readonly class ClassScheduleDTO
{
   public function __construct
   (public readonly int $course_id,
  //  public readonly string $continent,
    public readonly int $timezone_group_id,
    public readonly string $day,
    public readonly string $morning,
    public readonly string $afternoon,
   )
   {
    
   }


   public  function toArray():array 
   {
    return [
      'course_id' => $this->course_id,
     // 'continent' => $this->continent,
      'timezone_group_id' => $this->timezone_group_id,
      'day' => $this->day,
      'morning' => AppHelper::convertToUTC($this->morning), 
      'afternoon' => AppHelper::convertToUTC($this->afternoon),

    ];
   }


   public static function fromArray(array $array) 
   {
      return new self(
        $array['course_id'],
       // $array['continent'],
        $array['timezone_group_id'],
        $array['day'],
        $array['morning'],
        $array['afternoon'],
      );

   }











}
