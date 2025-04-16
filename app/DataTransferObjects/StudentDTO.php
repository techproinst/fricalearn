<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Facades\Auth;

readonly class StudentDTO
{
  public function __construct
  ( public readonly int $course_id,
    public readonly int $timezone_group_id,
    public readonly string $name,
    public readonly string $birthday,
   // public readonly string $age_range,
    public readonly string $gender,
    public readonly string $course_level,
    

  )
  {
  
  }



  public static function fromArray(array $array)
  {
   
     return new self(
      $array['course_id'],
      $array['timezone_group_id'],
      $array['name'],
      $array['birthday'],
     // $array['age_range'],
      $array['gender'],
      $array['course_level'],
     );
  }


  public function toArray()
  {
     $parent = Auth::guard('parent')->user();
    
    return [
      'parent_id' => $parent->id,
      'timezone_group_id' => $this->timezone_group_id,
      'name' => $this->name,
      'birthday' => $this->birthday,
      'gender' => $this->gender,     
    ];  
  }













}
