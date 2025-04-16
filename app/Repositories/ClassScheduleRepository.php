<?php

namespace App\Repositories;

use App\Enums\ContinentSchedule;
use App\Enums\DayOfWeek;
use App\Enums\FeeStatus;
use App\Interfaces\ClassScheduleInterface;
use App\Models\ClassSchedule;
use App\Models\StudentCourseLevel;
use App\Models\TimezoneGroup;
use App\Services\LocationService;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ClassScheduleRepository implements ClassScheduleInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(public LocationService $locationService)
    {
        //
    }

    public function getAllClassSchedules()
    {
        return ClassSchedule::with(['course', 'timezoneGroup'])->get();
    }

    public function getContinents()
    {
        return ContinentSchedule::values();
    }

    public function getClassDays()
    {
        return DayOfWeek::values();
    }



    public function storeClassSchedule($classScheduleData)
    {

        try {
            $classScheduleDetails = ClassSchedule::create($classScheduleData);

            if ($classScheduleDetails) {
                return $classScheduleDetails->refresh();
            }

            return null;
        } catch (Exception $e) {

            Log::error("Error saving class schedules: " . $e->getMessage());

            return null;
        }
    }

    public function  updateClassSchedule($mappedData, $classSchedule)
    {

        try {

            if ($classSchedule->update($mappedData)) {
                return $classSchedule->refresh();
            }


            return null;
        } catch (Exception $e) {

            Log::error('Error updating class Schedule: ' . $e->getMessage());

            return null;
        }
    }

    public function deleteClassSchedule($classSchedule)
    {
        try {

            if ($classSchedule->delete()) {

                return true;
            }

            return false;
        } catch (Exception $e) {

            Log::error('Error deleting  classSchedule: ' . $e->getMessage());

            return false;
        }
    }

    public function getUserContinent()
    {
        return $this->locationService->getUserContinent();
    }

    public function getStudentCourseId($studentId)
    {
        return  StudentCourseLevel::where('student_id', $studentId)->where('is_paid', FeeStatus::UNPAID->value)->first();
    }
    
    /*
    public function getContinentClassSchedule($continent, $courseId)
    {
        return ClassSchedule::where('course_id', $courseId)->where('continent', $continent)->get();
    }
    */
    
    public function getTimezoneClassSchedules($timezoneGroupId, $courseId)
    {
        return ClassSchedule::where('course_id', $courseId)->where('timezone_group_id', $timezoneGroupId)->get();
    }

    public function getTimeZones()
    {
        return TimezoneGroup::all();
    }
}
