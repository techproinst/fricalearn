<?php

namespace App\Http\Controllers;

use App\Enums\ContinentGroup;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\CourseLevel;
use App\Models\Student;
use App\Models\StudentCourseLevel;
use App\Services\LocationService;
use App\Services\StudentService;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PaymentController extends Controller
{  
    public function __construct
    (public LocationService $locationService,
     public StudentService $studentService,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showPaymentPage(Student $student)
    {   
        
        list($amount, $continent) = $this->studentService->getStudentPaymentAmount($student->id); 

        if(is_null($amount) || is_null($continent)) {
            
            ToastMagic::error("Unable to determine payment amount");
            return redirect()->route('parent.enrollments');
        }
        
        return view('pages.payment', compact('amount','student', 'continent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
