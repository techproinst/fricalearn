<?php

namespace App\Enums;

enum DayOfWeek: string
{
    case MONDAY = 'monday';
    case TUESDAY = 'tuesday';
    case WEDNESSDAY = 'wednessday';
    case THURSDAY = 'thursday';
    case FriDAY = 'friday';
    case SATURDAY = 'saturday';
    case SUNDAY = 'sunday';


    public static  function values()
    {
        return array_column(self::cases(), 'value');
    }
}
