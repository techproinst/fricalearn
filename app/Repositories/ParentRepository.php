<?php

namespace App\Repositories;

use App\Enums\FeeStatus;
use App\Interfaces\ParentInterface;
use App\Models\ParentModel;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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


    public function  storeParent($parentData)
    {
        try {

            $parentDetails = ParentModel::create($parentData);

            if ($parentDetails) {

                return $parentDetails->refresh();
            }

            return null;
        } catch (Exception $e) {

            Log::error("Error saving parent demo course details: " . $e->getMessage());

            return null;
        }
    }


    public function checkPasswordReset($parentData)
    {
        $verify = DB::table('password_reset_tokens')->where('email', $parentData->email);

        if ($verify->exists()) {
            $verify->delete();
        }
    }

    public function storeOtp($parentData, $pin)
    {
        try {

            $otpData = DB::table('password_reset_tokens')->insert([
                'email' => $parentData->email,
                'token' => Hash::make($pin),
                'created_at' => now(),

            ]);

            if ($otpData) {

                return $pin;
            }

            return null;
        } catch (Exception $e) {

            Log::error("Error saving otp data: " . $e->getMessage());

            return null;
        }
    }

    public function getOtpRecord($email)
    {
        return  DB::table('password_reset_tokens')->where('email', $email)->first();
    }


    public function getParentByEmail($email)
    {
        log::info('get parentEmail :' . $email);
        return $this->fetchParentData($email);
    }

    public function updateEmailVerification($email)
    {

        return DB::table('parents')->where('email', $email)->update([
            'email_verified_at' => now(),

        ]);
    }

    public function deleteOtpRecord($email)
    {

        return  DB::table('password_reset_tokens')->where('email', $email)->delete();
    }

    public function fetchParentData($email)
    {
        log::info('fetch parent  :' . $email);
        return  DB::table('parents')->where('email', $email)->first();
    }


    public function fetchStudentByParent($parent)
    {
        return Student::with('parent')->where('parent_id', $parent->id)->get();
    }


    public function getUnpaidStudentEnrollments()
    {
        $parent = Auth::guard('parent')->user();

        $students = $parent->students()->withWhereHas('studentCourseLevels', function ($query) {
            $query->where('is_paid', FeeStatus::UNPAID->value);
        })->get();

        //   dd($students);


        return $students;
    }


    public function getEnrolledStudents($parentId)
    {
        return Student::with(['parent', 'paidCourseLevels.course'])
            ->where('parent_id', $parentId)
            ->has('paidCourseLevels')
            ->get();
    }
}
