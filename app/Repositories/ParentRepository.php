<?php

namespace App\Repositories;

use App\Interfaces\ParentInterface;
use App\Models\ParentModel;
use Exception;
use Illuminate\Support\Facades\Log;

class ParentRepository implements ParentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function  saveParentDemoCourse($parentDemoDetails)
    {
        try {

            $parentDetails = ParentModel::create($parentDemoDetails);

            if($parentDetails) {

                return $parentDetails->refresh();
            }

            return null;

        }catch(Exception $e) {

            Log::error("Error saving parent demo course details: " . $e->getMessage());

            return null;

        }
    }

    
}
