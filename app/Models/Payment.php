<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class, 'parent_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function courseLevel()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id');
    }
    
    public function scopePending($query)
    {
       return $query->where('status', PaymentStatus::Pending->value);
    }


    public function scopeApproved($query)
    {
        return $query->where('status', PaymentStatus::Success->value);
    }

    public function scopeDeclined($query)
    {
        return $query->where('status', PaymentStatus::Declined->value);
    }

}
