<?php

namespace App\Interfaces;

use App\Enums\CourseEnums;
use App\Models\Course;

interface CourseInterface
{
    public function getAllCourses();

    public function getCourseByName(CourseEnums $courseName):Course;

    public function getcourseByLevel($course_id);

    public function getCourseLevels();

    public function getAllCourseDetails();


}
