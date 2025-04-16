<?php

namespace App\Services;

use App\DataTransferObjects\ClassScheduleDTO;
use App\Enums\ContinentGroup;
use App\Interfaces\ClassScheduleInterface;
use App\Models\ClassSchedule;
use Illuminate\Support\Facades\Log;

class ClassScheduleService  
{  
  public function __construct
  (
    public ClassScheduleInterface $classScheduleInterface,
    public LocationService  $locationService
  )
  {
    
  }


  public function handleGetContinents()
  {
     return $this->classScheduleInterface->getContinents();
  }

  public function handleGetClassDays()
  {
    return $this->classScheduleInterface->getClassDays();
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


  public function handleGetContinent()
  {
      $data = $this->classScheduleInterface->getUserContinent();

      return $this->locationService->handleGetContinent($data, [ContinentGroup::class, 'mapContinentToGroup']);

  }
  

  /*
  public function handleGetClassScheduleByContinent($continent, $courseId)
  {
      return $this->classScheduleInterface->getContinentClassSchedule($continent, $courseId);
  }
   */
  
  public function handleGetClassScheduleByTimezone($timezoneGroupId, $courseId)
  {
     return $this->classScheduleInterface->getTimezoneClassSchedules($timezoneGroupId, $courseId);
  }

  public function handleGetStudentCourseId($studentId)
  {
    return $this->classScheduleInterface->getStudentCourseId($studentId);
  }


  public function handleGetTimeZones()
  {
    return $this->classScheduleInterface->getTimeZones();
  }

  






}