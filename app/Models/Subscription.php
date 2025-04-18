<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    protected $casts = [
       'start_date' => 'datetime',
       'end_date' => 'datetime',
    ];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class, 'parent_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function courseLevel()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id');
    }


    public function scopeActive($query)
    {
      return $query->where('is_active', SubscriptionStatus::Active->value);
    }

    public function scopeInActive($query)
    {
      return $query->where('is_active', SubscriptionStatus::Inactive->value);
    }
}
