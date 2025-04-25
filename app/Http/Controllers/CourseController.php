<?php

namespace App\Http\Controllers;

use App\Enums\CourseEnums;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct(public CourseService $courseService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.courses');
    }


    public function showYorubaCourses()
    {
        $course = $this->courseService->getCourseByName(courseName: CourseEnums::YORUBA->value);
        $courseLevels =  $this->courseService->getCourseLevels($course->id);

        return view('pages.yoruba_courses', compact('courseLevels'));
    }


    public function showIgboCourses()
    {

        $course = $this->courseService->getCourseByName(courseName: CourseEnums::IGBO->value);
        $courseLevels =  $this->courseService->getCourseLevels($course->id);

        return view('pages.igbo_courses', compact('courseLevels'));
    }


    public function showHausaCourses()
    {
        $course = $this->courseService->getCourseByName(courseName: CourseEnums::HAUSA->value);
        $courseLevels =  $this->courseService->getCourseLevels($course->id);
    
        return view('pages.hausa_courses', compact('courseLevels'));
    }


    public function getAllCourses()
    {
        $courses =  $this->courseService->getAllCourseDetails();
        return view('admin.courses.index', compact('courses'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
