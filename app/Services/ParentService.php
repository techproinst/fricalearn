<?php

namespace App\Services;

use App\DataTransferObjects\Parents\ParentDTO;
use App\DataTransferObjects\Parents\UpdateParentDTO;
use App\Events\Parents\ParentRegistered;
use App\Events\Parents\ParentRegisteredForDemoCourse;
use App\Helpers\AppHelper;
use App\Helpers\RepositoryHelper;
use App\Http\Requests\UpdateParentModelRequest;
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
    public function __construct(
        public ParentInterface $parentInterface,
        public AppHelper $appHelper,
        public RepositoryHelper $repositoryHelper,
    ) {}


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
        } catch (Exception $e) {

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

            if ($otp) {

                event(new ParentRegistered($parent, $otp));

                return true;
            }

            return false;
        } catch (Exception $e) {

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
        for ($i = 1; $i <= 6; $i++) {
            $otp .= $request->validated()["otp_$i"];
        }

        //fetch otp record
        $otpRecord = $this->parentInterface->getOtpRecord($email);


        if (!$otpRecord) {
            return null;
        }

        $otpCreatedAt = Carbon::parse($otpRecord->created_at);

        if (!Hash::check($otp, $otpRecord->token) || $otpCreatedAt->diffInMinutes(now()) >= 10) {

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


    public function getStudents($parent)
    {
        return $this->parentInterface->fetchStudentByParent($parent);
    }


    public function handleGetParentEnrollments()
    {
        return $this->parentInterface->getUnpaidStudentEnrollments();
    }


    public function handleGetParentKids()
    {
        $parent = $this->appHelper->getAuthParent();

        return $this->parentInterface->getEnrolledStudents($parent->id);
    }


    public function processApprovedPayments()
    {
        $parent = $this->appHelper->getAuthParent();

        return $this->repositoryHelper->getApprovedPaymentsForParent($parent->id);
    }


    public function processPendingPayments()
    {
        $parent = $this->appHelper->getAuthParent();

        return $this->repositoryHelper->getPendingPaymentsForParent($parent->id);
    }

    public function processDeclinedPayments()
    {
        $parent = $this->appHelper->getAuthParent();

        return $this->repositoryHelper->getDeclinedPaymentsForParent($parent->id);
    }


    public function handleUpdateParentInfo(UpdateParentModelRequest $request, $parent)
    {
        
         $validatedData = $request->validated();

         $profilePhoto = $this->appHelper->handleFileUpload($request, 'profile_photo');

         if(!$profilePhoto){
            throw new Exception('Profile photo upload failed');
         }
         
        $dto = new UpdateParentDTO(
            name: $validatedData['name'],
            phone: $validatedData['phone'],
            password: $validatedData['password'],
            profilePhoto: $profilePhoto

         );


         $this->parentInterface->updateParentData($parent, $dto);
         
    }

   

   
}
