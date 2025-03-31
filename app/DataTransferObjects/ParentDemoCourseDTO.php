<?php

namespace App\DataTransferObjects;

readonly class ParentDemoCourseDTO 
{
   public function __construct(
    public readonly int $course_id,
    public readonly string $name,
    public readonly string $email,
    public readonly string $phone,
    public bool $terms,
   ){
    
   }

   public function toArray(): array {
    return [
        'course_id' => $this->course_id,
        'name'      => $this->name,
        'email'     => $this->email,
        'phone'     => $this->phone,
        'terms'     => $this->terms,
    ];
}

  
   public static function fromArray(array $array)
   {
      return new self(
        $array['course_id'],
        $array['name'],
        $array['email'],
        $array['phone'],
        $array['terms']
      );
   }












}
