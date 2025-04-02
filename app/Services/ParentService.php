<?php

namespace App\Services;

use App\DataTransferObjects\ParentDTO;
use App\Events\ParentRegistered;
use App\Events\ParentRegisteredForDemoCourse;
use App\Interfaces\ParentInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ParentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public ParentInterface $parentInterface,)
    {
        
    }


    public function createParent($request)
    {
        $parentDemoDetails = $this->mapParentFormData($request->validated());

        return $this->parentInterface->storeParent($parentDemoDetails);
    }

    public function sendParentDemoCourseLink($parentDetails) 
    {    
        try {

            event(new ParentRegisteredForDemoCourse($parentDetails));

            return true;

        }catch(Exception $e) {

            Log::error('Error sending email: ' . $e->getMessage());

            return false;

        }
         
    }

    public function sendVerificationPin($parent)
    {    
       try {

       $this->parentInterface->checkPasswordReset($parent);

       $otp = $this->parentInterface->storeOtp($parent, $this->generatePin());
       
     //  Log::info($otp);

       if($otp) {

        event(new ParentRegistered($parent, $otp));

        return true;

       }

       return false;

       } catch(Exception $e){

        Log::error('Error sending otp: ' . $e->getMessage());

        return false;

       } 

    }

    public function generatePin() 
    {
        return rand(100000, 999999);;
    }

    public function verifyOtp($request) 
    {
        $email = $request->validated()['email'];

        $otp = '';
        for($i = 1; $i <= 6; $i++) {
          $otp .= $request->validated()["otp_$i"];
        }  

        //fetch otp record
        $otpRecord = $this->parentInterface->getOtpRecord($email);


       if(!$otpRecord) {
        return null;
       }

        $otpCreatedAt = Carbon::parse($otpRecord->created_at);

        if(!Hash::check($otp, $otpRecord->token) || $otpCreatedAt->diffInMinutes(now()) >= 60) {

            return null; 

        }


        return   $this->parentInterface->getParentByEmail($email);
    }
    

    public function markEmailAsVerified($email)
    {
          return $this->parentInterface->updateEmailVerification($email);

    }

    public function deleteOtpToken($email)
    {    
       return $this->parentInterface->deleteOtpRecord($email);
    }

   

    public function mapParentFormData($request) 
    {   

        return ParentDTO::fromArray($request)->toArray();
       
    }




    



}
