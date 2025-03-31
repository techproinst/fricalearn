<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    /** @use HasFactory<\Database\Factories\ParentModelFactory> */
    use HasFactory;

    protected $table = 'parents';

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

  public function demoCourseLinks()
  {
    return $this->hasMany(DemoCourse::class, 'course_id', 'course_id');

  }


}
