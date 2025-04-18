<?php

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;

class AppHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function convertToUTC($value)
    {
       return Carbon::parse($value, AppHelper::getUserTimezone())
                ->setTimezone('UTC')->format('H:i');
    }

    public static function getUserTimezone()
    {
        return Auth::guard('web')->user()?->timezone ?? Auth::guard('parent')->user()?->timezone ?? config('app.timezone');

    }


    public static function calculateMonthlySubscriptionEndDate(CarbonImmutable $startDate):CarbonImmutable
    {
        return   $startDate->addMonthsNoOverflow(1);

    }


    public function getAuthParent()
    {
      return  Auth::guard('parent')->user();

    }

    public static function getAuthAdmin()
    {
        return Auth::guard('web')->user();
    }

    
}
