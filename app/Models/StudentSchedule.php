<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
