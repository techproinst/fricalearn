<?php

namespace App\Repositories;

use App\DataTransferObjects\Students\UpdateStudentDTO;
use App\Enums\FeeStatus;
use App\Interfaces\StudentInterface;
use App\Models\CourseLevel;
use App\Models\Student;
use App\Models\StudentCourseLevel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentRepository implements StudentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeStudent($student)
    {
        try {

             $parent = Auth::guard('parent')->user();

             if(!$parent) {
                throw new Exception('User unauthorized to perform this action');
             }

            $studentData = Student::create($student);

            if($studentData) {
                return $studentData->refresh();
            }

            return null;

        }catch(Exception $e){

            Log::error('Unable to store student' . $e->getMessage());

            throw $e;

        }
        
    }

    public function storeStudentCourseLevel($student, $courseId, $courseLevel)
    {
        $courseDetails = $this->getCourseLevel($student, $courseId, $courseLevel);

        if(!$courseDetails) {
            return false;
        }

      $studentCourseLevel =  StudentCourseLevel::create([
            'student_id' => $student->id,
            'course_id' => $courseId,
            'course_level_id' => $courseDetails->id,
        ]);

        if(!$studentCourseLevel) {
            return false;
        }


        return true;


    }

    public function getCourseLevel($student, $courseId, $courseLevel)
    {   
        //dd($student);
      return CourseLevel::where('course_id', $courseId)->where('level_name', $courseLevel)->first();

     
    }

    public function getStudentCourseLevel($student_id)
    {     
    
        return    StudentCourseLevel::where('student_id', $student_id)
                                  ->where('is_paid', FeeStatus::UNPAID->value)
                                  ->first();
    }

    public function getCourseLevelDetails($studentLevel)
    {

       return   CourseLevel::where('course_id', $studentLevel->course_id)
                    ->where('id', $studentLevel->course_level_id)
                    ->first();
    }

    public function getStudentInfo($student)
    {
        return Student::with(['parent','studentCourseLevels.level.course'])->find($student->id);
    }


    public function getStudentByParent($studentId, $parentId)
    {
        return Student::with('parent')->where('parent_id', $parentId)->where('id', $studentId)->first();
    }

    public function updateStudent(Student $student, UpdateStudentDTO $dto)
    {
       return $student->update($dto->toArray());
    }





}
