<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourseLevel extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function level()
    {
       return $this->belongsTo(CourseLevel::class, 'course_level_id');
    }

    
}
