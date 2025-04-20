<?php

namespace App\Interfaces;

use App\DataTransferObjects\Students\UpdateStudentDTO;
use App\Models\Student;

interface StudentInterface
{
   public function storeStudent($studentData);

   public function storeStudentCourseLevel($studentData, $courseId, $courseLevel);

   public function getStudentCourseLevel($studentId);

   public function getCourseLevelDetails($studentLevel);

   public function getStudentInfo($student);

   public function updateStudent(Student $student, UpdateStudentDTO $dto);
}
