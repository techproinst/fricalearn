<?php

namespace App\Services;

use App\Interfaces\DemoCourseInterface;
use App\Models\DemoCourse;

class DemoCourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public DemoCourseInterface $demoCourseInterface)
    {
        //
    }

    public function getDemoCourse(){

        return $this->demoCourseInterface->getDemoCourses();
    }


    public function handleSaveDemoCourse($request) 
    {
       $demoCourse = $this->mapDemoCourseFormData($request->validated());

       return $this->demoCourseInterface->saveDemoCourse($demoCourse);
    }

    public function handleUpdateDemoCourse($request, $demoCourse) 
    {
        $mappedDemoCourse = $this->mapDemoCourseFormData($request->validated());

        return $this->demoCourseInterface->updateDemoCourse($mappedDemoCourse, $demoCourse);
    }

    public function mapDemoCourseFormData($request) 
    {
        return [
            'course_id' => $request['course_id'],
            'demo_course_link' => $request['demo_course_link'],
            
        ];
    }


    public function handleDeleteDemoCourse($demoCourse)
    {
        return $this->demoCourseInterface->deleteDemoCourse($demoCourse);
    }


}
