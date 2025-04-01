<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentCourseRequest;
use App\Http\Requests\ParentRegistrationRequest;
use App\Models\ParentModel;
use App\Http\Requests\StoreParentModelRequest;
use App\Http\Requests\UpdateParentModelRequest;
use App\Services\CourseService;
use App\Services\ParentService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ParentController extends Controller
{
    public function __construct
    (
        public CourseService $courseService,
        public ParentService $parentService
    )
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
        $courses =  $this->courseService->handleGetAllCourses();
        return  view('forms.demo_class_form', compact('courses'));

    }

    public function showRegistrationForm()
    {
        return view('forms.parent_registration_form');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ParentCourseRequest $request)
    {
        

        try {

            DB::beginTransaction();

            $parentDetails = $this->parentService->createParentWithDemoCourse($request);

            if(!$parentDetails) {
                DB::rollBack();
                ToastMagic::error('An error occured while proccessing your registration');
                return back();

            }

            if(!$this->parentService->sendParentDemoCourseLink($parentDetails)){ 
                 DB::rollBack();
                ToastMagic::error('An error occured while proccessing your mail notification');
                return redirect()->back();
    
            }

             DB::commit();
             ToastMagic::success('You have registered successfully');
            
             return redirect()->route('demo_class.success');

        
        }catch(Exception $e){

            DB::rollBack();
            Log::error('Error during registration: ' . $e->getMessage());
            ToastMagic::error('An unexpected error occured');
            return back();

        }

    }


    
    public function storeParentForm(ParentRegistrationRequest $request)
    {
        
    }


    /**
     * Display the specified resource.
     */
    public function show(ParentModel $parentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParentModel $parentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, ParentModel $parentModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentModel $parentModel)
    {
        //
    }
}
