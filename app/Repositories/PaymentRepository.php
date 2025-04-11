<?php

namespace App\Repositories;

use App\Interfaces\PaymentInterface;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentRepository implements PaymentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function createPayment($data)
    {
        try{

           $payment = Payment::create($data);

           if(!$payment) {
            Log::error(message:"Payment could not be created");
            return null;
           }

           return $payment->refresh();
    

        }catch(Exception $e) {
            
            Log::error(message:"Payment error: ". $e->getMessage());
            
            throw $e;



        }
        
        
    }

    public function getPendingPayments()
    {
       return Payment::with([
        'student:id,name',
        'parent:id,name',
        'course:id,name',
        'courseLevel:id,level'
        ])->pending()->get();
    }






}
