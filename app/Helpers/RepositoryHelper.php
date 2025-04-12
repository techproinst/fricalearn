<?php

namespace App\Helpers;

use App\Repositories\StudentRepository;

class RepositoryHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct (public StudentRepository $studentRepository)
    {
       
    }

    public function getStudentCourseLevel($student_id)
    {    

        return $this->studentRepository->getStudentCourseLevel($student_id);
    }
    

    public function  getCourseLevelDetails($studentLevel)
    {
         return $this->studentRepository->getCourseLevelDetails($studentLevel);

    }

   



}
