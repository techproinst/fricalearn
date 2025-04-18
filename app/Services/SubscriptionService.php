<?php

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\SubscriptionInterface;

class SubscriptionService
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public SubscriptionInterface $subscriptionInterface,
     public AppHelper $appHelper
     )
    {
        //
    }


    public function handleGetActiveSubscriptions()
    {
        return  $this->subscriptionInterface->getAllActiveSubscriptions();
    }

    public function handleGetInActiveSubscriptions()
    {
        return $this->subscriptionInterface->getAllInActiveSubscriptions();
    }


    public function handleGetParentActiveSubscriptions()
    {   
        $parent = $this->appHelper->getAuthParent();

        return $this->subscriptionInterface->getParentActiveSubscriptions($parent->id);
    }

    
    public function handleGetParentInActiveSubscriptions()
    {   
        $parent = $this->appHelper->getAuthParent();

        return $this->subscriptionInterface->getParentInActiveSubscriptions($parent->id);
    }

    
}
