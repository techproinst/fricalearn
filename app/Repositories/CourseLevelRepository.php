<?php

namespace App\Repositories;

use App\Interfaces\CourseLevelInterface;
use App\Models\Course;
use App\Models\CourseLevel;
use Illuminate\Support\Facades\Log;

class CourseLevelRepository implements CourseLevelInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function updateCourseLevelPrice(CourseLevel $courseLevel,  array $prices): bool
    {

        return $courseLevel->update([
            'prices' => json_encode($prices)
        ]);

    }

    public function getCourseLevels($courseId)
    {     

          $courseLevels =  CourseLevel::where('course_id', $courseId)->get();

         return response()->json($courseLevels);

      
    }
}
