<?php

namespace App\Models;

use App\Enums\ContinentGroup;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
   protected $guarded = [];

   public function course()
   {
      return $this->belongsTo(Course::class);
   }

   
}
