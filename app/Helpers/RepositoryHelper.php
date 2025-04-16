<?php

namespace App\Helpers;

use App\Repositories\ClassScheduleRepository;
use App\Repositories\StudentRepository;
use App\Repositories\StudentScheduleRepository;

class RepositoryHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct 
    ( public StudentRepository $studentRepository,
      public ClassScheduleRepository $classScheduleRepository,
      public StudentScheduleRepository $studentScheduleRepository
    )
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


    public function getTimeZones()
    {
        return $this->classScheduleRepository->getTimeZones();
    }

    public function getStudentSchedule($studentId)
    {
        return $this->studentScheduleRepository->getStudentSchedule($studentId);
    }

    public function getStudentByParent($studentId, $parentId)
    {
        return $this->studentRepository->getStudentByParent($studentId, $parentId);

    }

   



}
