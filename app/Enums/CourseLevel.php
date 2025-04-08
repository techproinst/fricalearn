<?php

namespace App\Enums;

enum CourseLevel: string
{
    case INTRODUCTORY = 'introductory';
    case BEGINNER = 'beginner';
    case INTERMEDIATE = 'intermediate';


    public static function values()
    {
        return array_column(self::cases(), 'value');
    }

}



