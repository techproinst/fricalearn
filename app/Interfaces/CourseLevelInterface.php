<?php

namespace App\Interfaces;

use App\Models\Course;
use App\Models\CourseLevel;

interface CourseLevelInterface
{
    public function updateCourseLevelPrice(CourseLevel $courseLevel, array $prices): bool;

    public function getCourseLevels($courseId);
}
