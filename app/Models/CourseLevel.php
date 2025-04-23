<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    protected  $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function CourseMaterials()
    {
        return $this->hasMany(CourseMaterial::class, 'course_level_id');
    }
}
