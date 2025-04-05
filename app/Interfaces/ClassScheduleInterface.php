<?php

namespace App\Interfaces;

interface ClassScheduleInterface
{
   

    public function getAllClassSchedules();

    public function storeClassSchedule($classScheduleData);

    public function updateClassSchedule($mappedClassSheduleData , $classSchedule);

    public function deleteClassSchedule($classSchedule);
}
