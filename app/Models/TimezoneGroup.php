<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimezoneGroup extends Model
{
    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
