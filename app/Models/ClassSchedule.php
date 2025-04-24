<?php

namespace App\Models;

use App\Enums\ContinentGroup;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
   protected $guarded = [];
   
   protected $casts = [
      'morning_time' => 'datetime',
      'afternoon_time' => 'datetime',
  ];

   public function course()
   {
      return $this->belongsTo(Course::class);
   }

   public function timezoneGroup()
   {
      return $this->belongsTo(TimezoneGroup::class, 'timezone_group_id');
   }

   public function courseLevel()
   {
      return $this->belongsTo(CourseLevel::class, 'course_level_id');
   }

   
}
