<?php

namespace App\Repositories;

use App\DataTransferObjects\Courses\CourseMaterialDTO;
use App\Interfaces\CourseMaterialInterface;
use App\Models\CourseMaterial;

class CourseMaterialRepository implements CourseMaterialInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function storeCourseMaterial(CourseMaterialDTO $dto): CourseMaterial
    {
        return CourseMaterial::create($dto->toArray());
    }

    public function getCourseResources()
    {
        return CourseMaterial::with([
            'course:id,name,description',
            'courseLevel:id,level_name'
        ])->get();
    }

    public function updateCourseMaterial(CourseMaterial $courseMaterial, CourseMaterialDTO $dto):bool
    {
        return $courseMaterial->update($dto->toArray());
    }

    public function deleteCourseMaterial($courseMaterial):bool
    {
        return $courseMaterial->delete();
    }
}
