<?php

namespace App\Repositories;

use App\Interfaces\ClassScheduleInterface;
use App\Models\ClassSchedule;
use Exception;
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
        
    

    








}
