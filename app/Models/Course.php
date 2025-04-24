<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function demoCourses()
    {
        return $this->hasMany(DemoCourse::class, 'course_id');
    }

    public function  courseLevels()
    {
        return $this->hasMany(CourseLevel::class, 'course_id');
    }

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class, 'course_id');
    }

    public function courseMaterials()
    {
        return $this->hasMany(CourseMaterial::class, 'course_id');
    }
}
