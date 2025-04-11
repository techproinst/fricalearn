<?php

namespace App\Services;

use App\DataTransferObjects\StudentDTO;
use App\Enums\ContinentGroup;
use App\Interfaces\StudentInterface;
use Illuminate\Support\Facades\Log;

class StudentService
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (
    public StudentInterface $studentInterface,
    public LocationService $locationService
    )
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

    public function getStudentPaymentAmount($studentId)
    {
        $studentLevel = $this->getStudentCourseLevel($studentId);

        if(!$studentLevel) {
            Log::warning("No unpaid course level found for student ID : {$studentId}");
            return null;
        }

        $courseLevelDetails = $this->getCourseLevelDetails($studentLevel);
        
        if(!$courseLevelDetails) {

            Log::warning("Course level details not found for course ID: {$studentLevel->course_id} and level ID: {$studentLevel->course_level_id}");

            return null;
        }


        return $this->determineUserContinent($studentId, $courseLevelDetails);

       
    }


    public function getStudentCourseLevel($studentId)
    {
        return $this->studentInterface->getStudentCourseLevel($studentId);
    }

    public function getCourseLevelDetails($studentLevel)
    {
         return $this->studentInterface->getCourseLevelDetails($studentLevel);
    }

    public function determineUserContinent($studentId, $courseLevelDetails)
    {
        $data = $this->locationService->getUserContinent();

        $continent = $this->locationService->handleGetContinent($data, [ContinentGroup::class, 'mapContinentToPaymentSchedule']);

        if(!$continent) {
            Log::warning("Continent could not be determined for student ID: {$studentId}");
            return null;
        }

        $amounts = json_decode($courseLevelDetails->price, true);

        return  [$amounts, $continent];




    }


    public  function getStudentInfo($student) 
    {
       $studentInfo = $this->studentInterface->getStudentInfo($student);

       if(!$studentInfo){
          Log::info(message:"No student Data found for student with this id: $student->id");
          return null;
       }

       return $studentInfo;
    }








}
