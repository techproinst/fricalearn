<?php

namespace App\Services;

use App\DataTransferObjects\ClassScheduleDTO;
use App\Enums\ContinentSchedule;
use App\Enums\DayOfWeek;
use App\Interfaces\ClassScheduleInterface;

class ClassScheduleService  
{  
  public function __construct(public ClassScheduleInterface $classScheduleInterface)
  {
    
  }


  public function getContinents()
  {
      return ContinentSchedule::values();
  }

  public function getClassDays()
  {
    return DayOfWeek::values();
  }

  public function createClassSchedule($request)
  {
      $classScheduleDetails = $this->mapClassScheduleFormData($request->validated());

      return $this->classScheduleInterface->storeClassSchedule($classScheduleDetails);
  }

  public function handleUpdateClassSchedule($request, $classSchedule)
  {
      $mappedClassSheduleData = $this->mapClassScheduleFormData($request->validated());

      return $this->classScheduleInterface->updateClassSchedule($mappedClassSheduleData , $classSchedule);
  }


  public function handleDeleteClassSchedule($classSchedule)
  {
       return $this->classScheduleInterface->deleteClassSchedule($classSchedule);
  }


  public function getClassSchedules()
  {
    return $this->classScheduleInterface->getAllClassSchedules();
  }


  public function mapClassScheduleFormData($request) 
  {
      return ClassScheduleDTO::fromArray($request)->toArray();
  }

}