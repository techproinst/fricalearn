<?php

namespace App\Interfaces;

interface CourseInterface
{
    public function getAllCourses();

    public function getcourseByLevel($course_id);
}
