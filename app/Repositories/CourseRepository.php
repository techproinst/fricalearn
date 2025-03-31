<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;

class CourseRepository implements CourseInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllCourses()
    {
       return Course::all(); 
    }
}
