<?php

namespace App\Services;

use App\Enums\Continent;
use App\Http\Requests\Courses\UpdateCourseLevelRequest;
use App\Interfaces\CourseLevelInterface;
use App\Models\Course;
use App\Models\CourseLevel;
use Exception;

class CourseLevelService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public CourseLevelInterface $courseLevelInterface)
    {
        //
    }


    public function processUpdateCourseLevel(UpdateCourseLevelRequest $request, CourseLevel $courseLevel)
    {

        $validatedData = $request->validated();

        $priceData = $this->preparePriceData(validatedData: $validatedData, courseLevel: $courseLevel);
        if (!$priceData) {
            throw new Exception('Price data processing failed');
        }

        $this->courseLevelInterface->updateCourseLevelPrice($courseLevel, $priceData);
    }

    public function preparePriceData(array $validatedData, CourseLevel $courseLevel):array
    {
        $prices =  json_decode($courseLevel->prices, true) ?? [];

        $prices[Continent::OTHER->value] = $validatedData['amount_other'];
        $prices[Continent::AFRICA->value] = $validatedData['amount_africa'];

        return $prices;
    }


    public function getCourseLevels($courseId)
    {
       return $this->courseLevelInterface->getCourseLevels($courseId);
    }
}
