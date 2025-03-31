<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function demoCourses()
    {
        return $this->hasMany(DemoCourse::class, 'course_id');
    }
}
