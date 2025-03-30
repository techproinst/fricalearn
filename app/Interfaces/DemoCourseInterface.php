<?php

namespace App\Interfaces;

interface DemoCourseInterface
{   
    public function getDemoCourses();

    public function saveDemoCourse($request);

    public function updateDemoCourse($demoCourseRequest, $demoCourse);

    public function deleteDemoCourse($demoCourse);
}
