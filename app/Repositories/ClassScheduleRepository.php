<?php

namespace App\Repositories;

use App\Enums\ContinentSchedule;
use App\Enums\DayOfWeek;
use App\Enums\FeeStatus;
use App\Interfaces\ClassScheduleInterface;
use App\Models\ClassSchedule;
use App\Models\StudentCourseLevel;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ClassScheduleRepository implements ClassScheduleInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllClassSchedules()
    {
        return ClassSchedule::with('course')->get();
    }

    public function getContinents()
    {
        return ContinentSchedule::values();
    }

    public function getClassDays()
    {
        return DayOfWeek::values();
    }



    public function storeClassSchedule($classScheduleData)
    {

        try{
            $classScheduleDetails = ClassSchedule::create($classScheduleData);
       
            if($classScheduleDetails) {
            return $classScheduleDetails->refresh();
        }

        return null;

        }catch(Exception $e){

            Log::error("Error saving class schedules: " . $e->getMessage());

            return null;

        }
       
       
       
    }

    public function  updateClassSchedule($mappedData, $classSchedule)
    {

        try{

            if($classSchedule->update($mappedData)) {
                return $classSchedule->refresh();
            }


            return null;
        }catch(Exception $e) {

            Log::error('Error updating class Schedule: '. $e->getMessage());

            return null;
    
    
           }
    

    }

    public function deleteClassSchedule($classSchedule)
    {
          try {

            if($classSchedule->delete()) {

                return true;
            }

            return false;

          }catch(Exception $e) {

            Log::error('Error deleting  classSchedule: ' . $e->getMessage());

            return false;


          }
    }

    public function getUserContinent()
    {
        $ip = app()->environment('local') ? config('services.location.test') : request()->ip(); 
        
        $response = Http::get("http://ipwho.is/{$ip}");

        if($response->successful())
        {
            return $response->json();
        }

        return null;
    }

    public function getStudentCourseId($studentId)
    {   
        return  StudentCourseLevel::where('student_id', $studentId)->where('paid', FeeStatus::UNPAID->value)->first();
    }

    public function getContinentClassSchedule($continent, $courseId)
    { 
       
       return ClassSchedule::where('course_id', $courseId)->where('continent', $continent)->get();
       

    }
        
    

    








}
