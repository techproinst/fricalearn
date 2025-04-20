<?php

namespace App\Enums;

enum AgeRange : string
{
    case ZeroToFive = '0-5';
    case FiveToTen = '5-10';
    case TenToFifteen = '10-15';

    public function label()
    {
       return match($this){
        self::ZeroToFive => '0 to 5 years',
        self::FiveToTen => '5 to 15 years',
        self::TenToFifteen => '10 to 15 years',
       };
       
    }
}
