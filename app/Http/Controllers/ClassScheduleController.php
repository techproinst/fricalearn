<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassScheduleRequest;
use App\Models\ClassSchedule;
use App\Services\ClassScheduleService;
use App\Services\CourseService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{   
    public function __construct(
        public CourseService $courseService,
        public ClassScheduleService $classScheduleService
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $courses =  $this->courseService->handleGetAllCourses();
        $continents = $this->classScheduleService->getContinents();
        $days = $this->classScheduleService->getClassDays();

        $classSchedules = $this->classScheduleService->getClassSchedules();
    
        return view('admin.schedule.classes.index', compact('courses', 'continents', 'days', 'classSchedules'));
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
    public function store(StoreClassScheduleRequest $request)
    {
          $classSchedule = $this->classScheduleService->createClassSchedule($request);

          if(!$classSchedule) {
            ToastMagic::error('An error occured while creating class schedule');
            return back();

        }

        ToastMagic::success('Class schedule created successfully');  
        return back();

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
    public function update(StoreClassScheduleRequest $request, ClassSchedule $classSchedule)
    {
          $classSchedule = $this->classScheduleService->handleUpdateClassSchedule($request, $classSchedule);

          if(!$classSchedule) {

            ToastMagic::error('Unable to update class schedule');
            return back();
            
            
            }

        ToastMagic::success('class schedule updated successfully');
        return back();
         

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassSchedule $classSchedule)
    {
       $isDeleted = $this->classScheduleService->handleDeleteClassSchedule($classSchedule);

       if(!$isDeleted) {
        ToastMagic::error('Unable to delete class schedule');
        return back();

       }

       ToastMagic::success('Class schedule deleted successfully');
       return back();
    }
}
