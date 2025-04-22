<?php

namespace App\Http\Controllers;

use App\Http\Requests\Courses\UpdateCourseLevelRequest;
use App\Models\Course;
use App\Models\CourseLevel;
use App\Services\CourseLevelService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseLevelController extends Controller
{  

    public function __construct(public CourseLevelService $courseLevelService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getLevels($courseId)
    {   
      return   $this->courseLevelService->getCourseLevels($courseId);
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
    public function update(UpdateCourseLevelRequest $request,  CourseLevel $courseLevel)
    {    
        try {

            $this->courseLevelService->processUpdateCourseLevel(request: $request, courseLevel:$courseLevel);

            ToastMagic::success('CourseLevel price has been updated successfully');
            return back();

        }catch(Exception $e) {

            Log::error("Error updating  courseLevel price:" . $e->getMessage());
            ToastMagic::error("An error occured while updating courseLevel price");
            return back();

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
