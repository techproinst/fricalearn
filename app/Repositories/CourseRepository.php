<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;
use App\Models\CourseLevel;

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

    public function getcourseByLevel($course_id)
    {
       return  CourseLevel::where('course_id', $course_id)->get();
    }
}
