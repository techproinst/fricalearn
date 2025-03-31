<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemoApplicationRequest;
use App\Http\Requests\DemoCourseRequest;
use App\Http\Requests\UpdateDemoCourseRequest;
use App\Models\Course;
use App\Models\DemoCourse;
use App\Services\CourseService;
use App\Services\DemoCourseService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class DemoCourseController extends Controller
{

   public function __construct(
    public DemoCourseService $demoCourseService,
    public CourseService $courseService,
   )
   {
    
   }

    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $demoCourses = $this->demoCourseService->getDemoCourse();
        $courses =  $this->courseService->handleGetAllCourses();

        return view('admin.courses.demo_course.index', compact('courses', 'demoCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
       
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DemoCourseRequest $request)
    {
        $demoCourse = $this->demoCourseService->handleSaveDemoCourse($request);

          if($demoCourse) {
              ToastMagic::success('Demo course link added successfully');
              return back();
            
          }
           ToastMagic::error('Unable to create demo course link');
          return back();
          
    }

   
    /**
     * Display the specified resource.
     */
    public function show(DemoCourse $demoCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemoCourse $demoCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemoCourseRequest $request, DemoCourse $demoCourse)
    {
        
        $demoCourse = $this->demoCourseService->handleUpdateDemoCourse($request, $demoCourse);


        if($demoCourse) {
            ToastMagic::success('Demo course link updated successfully');
            return back();
          
        }
         ToastMagic::error('Unable to update demo course link');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemoCourse $demoCourse)
    {
        $isDeleted = $this->demoCourseService->handleDeleteDemoCourse($demoCourse);
        
        if($isDeleted) {

            ToastMagic::success('Demo course link deleted successfully');
        
        }else {

            ToastMagic::error('Unable to delete demo course link');

        }

      
        return back();

    }





}
