<?php

namespace App\Interfaces;

interface StudentInterface
{
   public function storeStudent($studentData);

   public function storeStudentCourseLevel($studentData, $courseId, $courseLevel);

   public function getStudentCourseLevel($studentId);

   public function getCourseLevelDetails($studentLevel);
}
