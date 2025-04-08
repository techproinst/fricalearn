<?php

namespace App\Interfaces;

interface ClassScheduleInterface
{
   

    public function getAllClassSchedules();

    public function getContinents();

    public function getClassDays();

    public function storeClassSchedule($classScheduleData);

    public function updateClassSchedule($mappedClassSheduleData , $classSchedule);

    public function deleteClassSchedule($classSchedule);

    public function getUserContinent();

    public function getContinentClassSchedule($continent, $courseId);

    public function getStudentCourseId($studentId);


}
