<?php

namespace App\DataTransferObjects;

readonly class StudentDTO
{
  public function __construct
  ( public readonly int $course_id,
    public readonly string $name,
    public readonly string $birthday,
    public readonly string $gender,
    public readonly string $course_level,
    

  )
  {
  
  }

  public static function fromArray(array $array)
  {
     return new self(
      $array['course_id'],
      $array['name'],
      $array['birthday'],
      $array['gender'],
      $array['course_level'],
     );
  }












}
