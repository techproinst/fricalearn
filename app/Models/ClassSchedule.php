<?php

namespace App\Models;

use App\Enums\ContinentGroup;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
   protected $guarded = [];
   
   protected $casts = [
      'morning' => 'datetime',
      'afternoon' => 'datetime',
  ];

   public function course()
   {
      return $this->belongsTo(Course::class);
   }

   public function timezoneGroup()
   {
      return $this->belongsTo(TimezoneGroup::class, 'timezone_group_id');
   }

   
}
