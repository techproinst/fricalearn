<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAdminUser()
    {
        return User::all();
    }
}
