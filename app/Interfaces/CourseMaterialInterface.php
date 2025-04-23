<?php

namespace App\Interfaces;

use App\DataTransferObjects\Courses\CourseMaterialDTO;
use App\Models\CourseMaterial;

interface CourseMaterialInterface
{
    public function storeCourseMaterial(CourseMaterialDTO $dto): CourseMaterial;

    public function getCourseResources();

    public function updateCourseMaterial(CourseMaterial $courseMaterial, CourseMaterialDTO $dto):bool;

    public function deleteCourseMaterial(CourseMaterial $courseMaterial):bool;

    public function getStudentCourseResources(int $courseId, int $courseLevelId);
}
