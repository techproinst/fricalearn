<?php

namespace App\Interfaces;

use App\DataTransferObjects\Schedules\UpcomingClassLinkDTO;
use App\Models\ClassSchedule;

interface ClassScheduleInterface
{
   

    public function getAllClassSchedules();

    public function getContinents();

    public function getClassDays();

    public function storeClassSchedule($classScheduleData);

    public function updateClassSchedule($mappedClassSheduleData , $classSchedule);

    public function deleteClassSchedule($classSchedule);

    public function getUserContinent();

   // public function getContinentClassSchedule($continent, $courseId);

    public function getTimezoneClassSchedules($timezoneGroupId, $courseId);

    public function getStudentCourseId($studentId);

    public function getTimeZones();

    public function storeUpcomingClassLink(UpcomingClassLinkDTO $dto, ClassSchedule $classSchedule);

  


}
