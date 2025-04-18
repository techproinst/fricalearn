<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentCourseRequest;
use App\Http\Requests\ParentRegistrationRequest;
use App\Models\ParentModel;
use App\Models\Student;
use App\Http\Requests\StoreParentModelRequest;
use App\Http\Requests\UpdateParentModelRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Services\CourseService;
use App\Services\ParentService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Support\Facades\Auth;
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
        $students =  $this->parentService->handleGetParentKids();

        return view('pages.parent_dashboard', compact('students'));
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

    public function showOtpForm(ParentModel $parent)
    {
        return view('forms.verify_email', compact('parent'));
    }


    public function selectStudent()
    {     
       // $parent = Auth::guard('parent')->user();

        // if(!$parent) {
        //     ToastMagic::error('You must be logged in !!');
        //     return redirect()->route('login');
        // }

        $students =  $this->parentService->handleGetParentKids();

        return view('pages.select_student', compact('students'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeParentWithDemoCourse(ParentCourseRequest $request)
    {
        

        try {

            DB::beginTransaction();

            $parentDetails = $this->parentService->createParent($request);

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
        try{  

            DB::beginTransaction();

            $parent = $this->parentService->createParent($request);

            if(!$parent) {

                DB::rollBack();
                ToastMagic::error('An error occured while proccessing your registration');
                return back();
            }

            if(!$this->parentService->sendVerificationPin($parent)) {
  
                DB::rollBack();
                ToastMagic::error('An error occured while proccessing your mail notification');
                return redirect()->back();

            }

            DB::commit();
            ToastMagic::success('Kindly check your mail for your OTP');
            return redirect()->route('parent.verify_otp',['parent' => $parent]);

          

         }catch(Exception $e) {
            DB::rollBack();
            Log::error('Error during registration: ' . $e->getMessage());
            ToastMagic::error('An unexpected error occured');
            return back();


         }
       
    }
 
    
    public function verifyOtp(VerifyOtpRequest $request)
    {

        try {

            $parentData = $this->parentService->verifyOtp($request);
    

            if(!$parentData){
               ToastMagic::error('The provided OTP is invalid or expired');
               return back();
            }

           

            DB::beginTransaction();

            

              //update email verification timestamp
            if(!$this->parentService->markEmailAsVerified($parentData->email)) {
                DB::rollBack();
                ToastMagic::error('An error occured while processing your verification');
                return back();
    
            }

            
             
            //Delete OTP entry
            if(!$this->parentService->deleteOtpToken($parentData->email)) {
                DB::rollBack();
                ToastMagic::error('An error occured while processing your verification');
                return back();
    
            }
            
            DB::commit();
            ToastMagic::success('Your email has been verified successfully');
            Auth::guard('parent')->loginUsingId($parentData->id);
           // dd(Auth::guard('parent')->check());
            return redirect()->route('parent.dashboard');
    

        }catch(Exception $e) {
            DB::rollBack();
            Log::error('OTP verification error : ' . $e->getMessage());
            ToastMagic::error('unfortunately, your verification could not be completed');
                return back();

        }
       



    }

    public function resendOtp(ParentModel $parent)
    {

        try {

            DB::beginTransaction();

            if(!$this->parentService->sendVerificationPin($parent)) {
                 DB::rollBack();
                ToastMagic::error('An error occured while proccessing your mail notification');
                return redirect()->back();
    
            }

            
            DB::commit();
            ToastMagic::success('Kindly check your mail for your OTP');
            return redirect()->route('parent.verify_otp',['parent' => $parent]);

          

        }catch(Exception $e) {

            DB::rollBack();
            Log::error('Error during registration: ' . $e->getMessage());
            ToastMagic::error('An unexpected error occured');
            return back();

        }
       

    }

    public function getIncompleteEnrollment()
    {   
        $studentEnrollments = $this->parentService->handleGetParentEnrollments();

        return view('pages.enrollment', compact('studentEnrollments'));
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
