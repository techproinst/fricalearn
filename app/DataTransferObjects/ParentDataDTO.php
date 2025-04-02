<?php

namespace App\DataTransferObjects;

readonly class ParentDTO 
{

  public function __construct(
    public readonly string $name,
    public readonly  string $email,
    public  readonly string $phone,
    public readonly string $password,
    public readonly bool $terms,

  ){

   
  }

}