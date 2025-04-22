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
}
