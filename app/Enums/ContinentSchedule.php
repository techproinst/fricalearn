<?php

namespace App\Enums;

enum ContinentSchedule: string
{
    case AFRICA_EUROPE = 'africa_europe';
    case Australia_ASIA = 'australia_asia';
    case USA_CANADA = 'usa_canada';


    public static function values()
    {
         return array_column(self::cases(), 'value');
    }
}
