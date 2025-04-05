<?php

namespace App\DataTransferObjects;

readonly class ClassScheduleDTO
{
   public function __construct
   (public readonly int $course_id,
    public readonly string $continent,
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
      'continent' => $this->continent,
      'day' => $this->day,
      'morning' => $this->morning,
      'afternoon' => $this->afternoon,

    ];
   }


   public static function fromArray(array $array) 
   {
      return new self(
        $array['course_id'],
        $array['continent'],
        $array['day'],
        $array['morning'],
        $array['afternoon'],
      );

   }











}
