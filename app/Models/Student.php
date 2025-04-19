<?php

namespace App\Models;

use App\Enums\ContinentGroup;
use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }

    

    public function studentCourseLevels()
    {
        return $this->hasMany(StudentCourseLevel::class);
    }

    
    public function paidCourseLevels()
    {
        return $this->hasMany(StudentCourseLevel::class)->where('is_paid', true);
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscriptions()
    {
        return $this->hasMany(Subscription::class)
                     ->where('is_active', SubscriptionStatus::Active->value)
                     ->where('end_date', '>=', now());
    }


    





   
    

    

    
}
