<?php

namespace App\Services;

use App\DataTransferObjects\StudentDTO;
use App\Interfaces\StudentInterface;

class StudentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public StudentInterface $studentInterface)
    {
        
    }


    public function handleCreateStudent($request)
    {
      $studentData = $this->mapStudentFormData($request->validated());
    
       return $this->studentInterface->storeStudent($studentData);
      

    }

    public function handleCreateStudentCourseLevel($studentData, $courseId, $courseLevel)
    {   
          
        return $this->studentInterface->storeStudentCourseLevel($studentData, $courseId, $courseLevel);
    }

    public function mapStudentFormData($request)
    {
        return StudentDTO::fromArray($request);
    }








}
