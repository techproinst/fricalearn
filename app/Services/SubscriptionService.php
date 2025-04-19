<?php

namespace App\Services;

use App\Enums\SubscriptionStatus;
use App\Helpers\AppHelper;
use App\Interfaces\SubscriptionInterface;
use App\Models\Subscription;

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


    public function processSubsription()
    {
        $subscriptions = Subscription::where('end_date', '<=', now())->get();

     return     $subscriptions->update([
            'is_active' => SubscriptionStatus::Inactive->value,

        ]);

    }

    
}
