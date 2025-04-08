<?php

namespace App\Interfaces;

interface StudentInterface
{
   public function storeStudent($studentData);

   public function storeStudentCourseLevel($studentData, $courseId, $courseLevel);
}
