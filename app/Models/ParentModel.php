<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentModel extends  Authenticatable
{
    /** @use HasFactory<\Database\Factories\ParentModelFactory> */
    use HasFactory, Notifiable;

    protected $table = 'parents';

    protected $guard = 'parent';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
      'password',
      'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
      return [
          'email_verified_at' => 'datetime',
          'password' => 'hashed',
      ];
  }

  public function course()
  {
      return $this->belongsTo(Course::class, 'course_id');
  }

  public function demoCourseLinks()
  {
    return $this->hasMany(DemoCourse::class, 'course_id', 'course_id');

  }

 /**
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $students
 */

  public  function students()
  {
    return $this->hasMany(Student::class, 'parent_id');
  }

  public function payments()
  {
    return $this->hasMany(Payment::class);
  }

  public function subscriptions()
  {
    return $this->hasMany(Subscription::class);
  }

  

}
