<?php

namespace App\Http\Controllers;

use App\Helpers\RepositoryHelper;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use App\Models\StudentCourseLevel;
use App\Services\CourseService;
use App\Services\StudentService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{

    public function __construct(
        public CourseService $courseService,
        public StudentService $studentService,
        public RepositoryHelper $repositoryHelper,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        $student = $this->studentService->getStudentInfo(student: $student);

        $courseResources  =  $this->studentService->handleGetCourseResources(student: $student);

        $studentSchedule = $this->studentService->handleGetClassLink($student->id);

        $classSchedule = $studentSchedule?->classSchedule;

        $courseLevel = $classSchedule?->courseLevel;

        
        return view('pages.students.student_dashboard', compact(
            'student',
            'courseResources',
            'classSchedule',
            'courseLevel',
            'studentSchedule'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->courseService->handleGetAllCourses();
        $levels =  $this->courseService->handleGetCourseLevels();
        $timezones = $this->repositoryHelper->getTimeZones();

        return view('forms.student_registration_form', compact('courses', 'levels', 'timezones'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {


        try {

            $studentData = null;
            DB::transaction(function () use ($request, &$studentData) {

                $studentData = $this->studentService->handleCreateStudent($request);

                if (!$studentData) {
                    throw new Exception('Failed to create student');
                }



                $courseLevel = $this->studentService->handleCreateStudentCourseLevel($studentData, $request->course_id, $request->course_level);

            

                if (!$courseLevel) {
                    throw new Exception('Failed to assign course level');
                }
            });


            if ($studentData) {


                ToastMagic::success('Student registration completed successfully');
                return redirect()->route('student.schedule', ['student' => $studentData->id]);
            }
        } catch (Exception $e) {

            Log::error('student registration error: ' . $e->getMessage());
            ToastMagic::error('An error occurred during student registration');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $studentInfo =   $this->studentService->getStudentInfo($student);

        if (!$studentInfo) {
            ToastMagic::error('Student information not available');
            return back();
        }

        return view('admin.student.info', compact('studentInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {

            $this->studentService->handleUpdateStudentProfile(request: $request, student: $student);

            ToastMagic::success('You have successfully updated your profile');
            return back();
        } catch (Exception $e) {

            Log::error("Error updating parent profile:" . $e->getMessage());
            ToastMagic::error("An error occured while updating profile");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
