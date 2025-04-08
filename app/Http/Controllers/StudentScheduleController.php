<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentScheduleRequest;
use App\Models\StudentSchedule;
use App\Services\StudentScheduleService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;

class StudentScheduleController extends Controller
{
    public function __construct(public StudentScheduleService $studentScheduleService)
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreStudentScheduleRequest $request)
    {  
        try {

        $studentSchedules = $this->studentScheduleService->handleCreateStudentSchedule($request);
       
        if(!$studentSchedules) {
         ToastMagic::error('An error occured during student schedule creation process');
         return back();
        }

        ToastMagic::success('Student class schedule created successfully');
        return redirect()->route('payment',['student' => $request->student_id]);

        }catch(Exception $e) {

            ToastMagic::error('An error occurred during student schedule creation: ' . $e->getMessage());
            return back()->withInput();

        }
      


       
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentSchedule $studentSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentSchedule $studentSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentSchedule $studentSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentSchedule $studentSchedule)
    {
        //
    }
}
