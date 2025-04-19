<?php

namespace App\Interfaces;

interface SubscriptionInterface
{
    public function getAllActiveSubscriptions();

    public function getAllInActiveSubscriptions();

    public function getParentActiveSubscriptions($parentId);

    public function getParentInActiveSubscriptions($parentId);

    public function markSubscriptionAsInactive();
}
