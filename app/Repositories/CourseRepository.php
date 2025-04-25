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

    public function getCourseLevels()
    {
        return CourseLevel::values();
    }

    public function getAllCourseDetails()
    {
        return Course::with('courseLevels')->get();
    }

    public function getCourseByName($courseName):Course
    {
         return Course::where('name', $courseName)->first();
    }
}
