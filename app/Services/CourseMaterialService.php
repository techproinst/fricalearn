<?php

namespace App\Services;

use App\DataTransferObjects\Courses\CourseMaterialDTO;
use App\Helpers\RepositoryHelper;
use App\Http\Requests\StoreCourseMaterialRequest;
use App\Interfaces\CourseMaterialInterface;
use App\Models\CourseMaterial;

class CourseMaterialService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public CourseMaterialInterface $courseMaterialInterface,
        private RepositoryHelper $repositoryHelper
    ) {
        //
    }


    public function getAllCourses()
    {
        return  $this->repositoryHelper->getAllCourses();
    }


    public function processStoreCourseMaterial(StoreCourseMaterialRequest $request)
    {  
      
        $validatedData = $request->validated();

        $dto = $this->prepareDto($validatedData);

        $this->courseMaterialInterface->storeCourseMaterial(dto: $dto);
    }


    public function getCourseResources()
    {
        return   $this->courseMaterialInterface->getCourseResources();
    }

    public function  prepareDto($validatedData):CourseMaterialDTO
    {
        return CourseMaterialDTO::fromRequest(validatedData: $validatedData);

    }


    public function processUpdateCourseMaterial(StoreCourseMaterialRequest $request, CourseMaterial $courseMaterial)
    {
        $validatedData = $request->validated();

        $dto = $this->prepareDto($validatedData);

        $this->courseMaterialInterface->updateCourseMaterial(courseMaterial:$courseMaterial, dto:$dto);
    }


    public function handleDestroyCourseMaterial(CourseMaterial $courseMaterial)
    {
        $this->courseMaterialInterface->deleteCourseMaterial($courseMaterial);
    }
}
