<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    protected $guarded = [];

    protected $casts = [
        'class_time' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function classSchedule()
    {
        return $this->belongsTo(ClassSchedule::class);
    }
}
