<?php

namespace App\Repositories;

use App\Interfaces\SubscriptionInterface;
use App\Models\Subscription;

class SubscriptionRepository implements SubscriptionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllActiveSubscriptions()
    {
        return Subscription::with([
           'parent:id,name',
           'student:id,name',
           'courseLevel.course' ])->active()
          ->get();
    }

    public function getAllInActiveSubscriptions()
    {
        return Subscription::with([
           'parent:id,name',
           'student:id,name',
           'courseLevel.course' ])->inActive()
          ->get();
    }

    public function getParentActiveSubscriptions($parentId)
    {   

        return Subscription::with([
            'parent:id,name',
            'student:id,name',
            'courseLevel.course' ])
            ->where('parent_id', $parentId)
            ->active()
           ->paginate(10);
    }

    public function getParentInActiveSubscriptions($parentId)
    {   
        
        return Subscription::with([
            'parent:id,name',
            'student:id,name',
            'courseLevel.course' ])
            ->where('parent_id', $parentId)
            ->inActive()
           ->paginate(10);
    }



}
