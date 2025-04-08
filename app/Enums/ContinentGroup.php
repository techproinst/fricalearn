<?php

namespace App\Enums;

enum ContinentGroup: string
{
    case AFRICA = 'Africa';
    case ASIA = 'Asia';
    case EUROPE = 'Europe';
    case NORTH_AMERICA = 'North America';
    case SOUTH_AMERICA = 'South America';
    case AUSTRALIA = 'Australia';
    case ANTARCTICA = 'Antarctica';


    public static  function mapContinentToGroup(ContinentGroup $continent): ?string
    {   
        
        return match ($continent) {
            self::AFRICA => 'africa_europe',
            self::ASIA => 'asia_australia',
            self::EUROPE => 'africa_europe',
            self::NORTH_AMERICA => 'usa_canada',
            self::SOUTH_AMERICA => 'south_america',
            self::AUSTRALIA => 'asia_australia',
            self::ANTARCTICA => 'antarctica',
            default => null,
        };
    }
}
