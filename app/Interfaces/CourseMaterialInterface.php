<?php

namespace App\Interfaces;

use App\DataTransferObjects\Courses\CourseMaterialDTO;
use App\Models\CourseMaterial;

interface CourseMaterialInterface
{
    public function storeCourseMaterial(CourseMaterialDTO $dto): CourseMaterial;
}
