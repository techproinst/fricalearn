<?php

namespace App\Helpers;

use App\Enums\Currency;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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


    public static function calculateMonthlySubscriptionEndDate(CarbonImmutable $startDate): CarbonImmutable
    {
        return   $startDate->addMonthsNoOverflow(1);
    }


    public  function getAuthParent()
    {
        return  Auth::guard('parent')->user();
    }

    public static function getAuthAdmin()
    {
        return Auth::guard('web')->user();
    }


    public function handleFileUpload(Request $request, string $field): ?string
    {
        if (!$request->hasFile($field)) {
            Log::error(message: "File upload failed: No file received for field '{$field}'");
            return null;
        }

        $uploadedFile = $request->file($field);
        $rad = mt_rand(1000, 9999);

        $fileName = md5($uploadedFile->getClientOriginalName()) . $rad . '.' . $uploadedFile->getClientOriginalExtension();

        $filePath =  $uploadedFile->storeAs('uploads', $fileName, 'public');

        if (!$filePath) {
            Log::error(message: "File upload failed: Unable to store file '{$fileName}'");
            return null;
        }

        return  $fileName;
    }


    public static function currencySymbol(string $currency)
    {
        return $currency == 'ngn' ? Currency::NAIRA->value : Currency::DOLLAR->value;
    }
}
