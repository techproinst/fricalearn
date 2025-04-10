<?php

namespace App\Enums;

enum Continent : string
{
    case AFRICA = 'africa';
    case OTHER = 'other';

    public static function mapToCurrency(Continent $continent):?string
    {
         return match($continent){
            self::AFRICA => 'ngn',
            self::OTHER => 'usd',
            default => null,


         };
    }
}
