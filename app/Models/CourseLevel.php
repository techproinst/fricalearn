<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

 
}
