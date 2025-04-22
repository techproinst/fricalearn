<?php

namespace App\Services;

use App\DataTransferObjects\Courses\CourseMaterialDTO;
use App\Helpers\RepositoryHelper;
use App\Http\Requests\StoreCourseMaterialRequest;
use App\Interfaces\CourseMaterialInterface;

class CourseMaterialService
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public CourseMaterialInterface $courseMaterialInterface,
     private RepositoryHelper $repositoryHelper
    )
    {
        //
    }


    public function getAllCourses()
    {
        return  $this->repositoryHelper->getAllCourses();
    }


    public function processStoreCourseMaterial(StoreCourseMaterialRequest $request)
    {   
        $validatedData = $request->validated();

        $dto = CourseMaterialDTO::fromRequest(validatedData: $validatedData);

        $this->courseMaterialInterface->storeCourseMaterial(dto:$dto);
    }


  
}
