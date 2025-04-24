<?php

namespace App\Interfaces;

interface StudentScheduleInterface
{
   public function storeStudentClassSchedule($studentScheduleData);

   public function getStudentSchedule($studentId);

   public function getStudentByClassSchedule($classSchedule);

   public function getStudentScheduleById(int $studentId);
}
