<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use App\Http\Requests\StoreCourseMaterialRequest;
use App\Http\Requests\UpdateCourseMaterialRequest;
use App\Services\CourseMaterialService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseMaterialController extends Controller
{

    public function __construct(private CourseMaterialService $courseMaterialService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseMaterialService->getAllCourses();

        $courseResources = $this->courseMaterialService->getCourseResources();

        return view('admin.courses.material.index', compact('courses', 'courseResources'));
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
    public function store(StoreCourseMaterialRequest $request)
    {
        try {

            $this->courseMaterialService->processStoreCourseMaterial($request);

            ToastMagic::success('Course material uploaded successfully');
            return back();
        } catch (Exception $e) {

            Log::error(message: 'Course material upload error: ' . $e->getMessage());
            ToastMagic::error('Course material upload Failed');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeCourseMaterialRequest $request, CourseMaterial $courseMaterial)
    {
        try {

            $this->courseMaterialService->processUpdateCourseMaterial(request: $request, courseMaterial: $courseMaterial);

            ToastMagic::success('Course material updated successfully');
            return back();
        } catch (Exception $e) {

            Log::error(message: 'Course material update error: ' . $e->getMessage());
            ToastMagic::error('Course material update Failed');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseMaterial $courseMaterial)
    {
        try {

            $this->courseMaterialService->handleDestroyCourseMaterial(courseMaterial: $courseMaterial);

            ToastMagic::success('Course material deleted successfully');
            return back();
            
        } catch (Exception $e) {

            Log::error(message: 'Course material delete error: ' . $e->getMessage());
            ToastMagic::error('Course material deletion  Failed');
            return back();
        }
    }
}
