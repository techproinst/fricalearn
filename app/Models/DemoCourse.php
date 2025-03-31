<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoCourse extends Model
{
    protected $guarded = [];


    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    
}
