<?php

namespace App\Repositories;

use App\Interfaces\DemoCourseInterface;
use App\Models\DemoCourse;
use Exception;
use Illuminate\Support\Facades\Log;

class DemoCourseRepository implements DemoCourseInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function  getDemoCourses()
    {         
         return DemoCourse::with('courses')->get();
    }

    public function saveDemoCourse($demoCourseRequest)
    {
        try {

            $demoCourse = DemoCourse::create($demoCourseRequest);

            if($demoCourse) {

                return $demoCourse->refresh();  
    
             }

             return null;


        }catch(Exception $e) {

            Log::error('Error saving demo course: ' . $e->getMessage());

            return null;


        }

    }

    public function updateDemoCourse($demoCourseRequest, $demoCourse) 
    {
       try {

        //dd($demoCourse);

        if($demoCourse->update($demoCourseRequest)) {

            return $demoCourse->refresh();

        }

        return null;

       } catch (Exception $e) {

        Log::error('Error updating demo course: '. $e->getMessage());

        return null;


       }

       

    }

    public function deleteDemoCourse($demoCourse)
    {
        try {

           if($demoCourse->delete()) {

              return true;

           }

           return false;

        }catch(Exception $e) {

            Log::error('Error deleting demo course: ' . $e->getMessage());

            return false;

        }
    }








}
