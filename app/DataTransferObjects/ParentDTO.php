<?php

namespace App\DataTransferObjects;

readonly class ParentDTO 
{
   public function __construct(
    public readonly ?int $course_id, //nullable for full registration
    public readonly string $name,
    public readonly string $email,
    public readonly string $phone,
    public readonly ?string $password, //nullable for demo_registration
    public readonly bool $terms,

   ){
    
   }

   public function toArray(): array {
    return [
        'course_id' => $this->course_id,
        'name'      => $this->name,
        'email'     => $this->email,
        'phone'     => $this->phone,
        'password'  => $this->password,
        'terms'     => $this->terms,
    ];
}

  
   public static function fromArray(array $array)
   {
      return new self(
        $array['course_id'] ?? null,
        $array['name'],
        $array['email'],
        $array['phone'],
        $array['password'] ?? null,
        $array['terms']
      );
   }












}
