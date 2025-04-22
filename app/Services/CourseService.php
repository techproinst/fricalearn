<?php

namespace App\Services;

use App\Enums\ContinentSchedule;
use App\Interfaces\CourseInterface;
use App\Models\Course;

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

    public function  handleGetCourseLevels()
    {
        return  $this->courseInterface->getCourseLevels();
    }

    public function getYorubaCourseLevels($course_id)
    {
        return $this->courseInterface->getcourseByLevel($course_id);
    }

    public function getAllCourseDetails()
    {
           return $this->courseInterface->getAllCourseDetails();
    }

  
    


}
