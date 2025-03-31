<?php

namespace App\Services;

use App\Interfaces\CourseInterface;

class CourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public CourseInterface $courseInterface)
    {
        //
    }

    public function handleGetAllCourses()
    {
        return $this->courseInterface->getAllCourses();
    }
}
