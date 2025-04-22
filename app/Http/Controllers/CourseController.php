<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct(public CourseService $courseService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.courses');
    }


    public function showYorubaCourses()
    {   
         $course_id = 1;
         $courseLevels =  $this->courseService->getYorubaCourseLevels($course_id);
        
        return view('pages.yoruba_courses', compact('courseLevels'));
    }

    
    public function showIgboCourses()
    {
        return view('pages.igbo_courses');
    }

    
    public function showHausaCourses()
    {
        return view('pages.hausa_courses');
    }


    public function getAllCourses()
    {
       $courses =  $this->courseService->getAllCourseDetails();

       // return $courses;

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
