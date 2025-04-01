<?php

namespace App\Services;

use App\DataTransferObjects\ParentDTO;
use App\Events\ParentRegisteredForDemoCourse;
use App\Interfaces\ParentInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class ParentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public ParentInterface $parentInterface,)
    {
        
    }


    public function createParentWithDemoCourse($request)
    {
        $parentDemoDetails = $this->mapParentDemoCourseFormData($request->validated());

        return $this->parentInterface->saveParentDemoCourse($parentDemoDetails);
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

    public function mapParentDemoCourseFormData($request) 
    {   

        return ParentDTO::fromArray($request)->toArray();
       
    }


    



}
