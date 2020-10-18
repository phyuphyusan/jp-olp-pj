<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['name','photo','description','week','discount','fee','subject_id','lecturer_id'];

    public function subject($value='')
  		{
  			return $this->belongsTo('App\Subject');
  		}

    public function coursedetail($value='')
      {
        return $this->hasOne('App\CourseDetail');
      }

      public function lecturer($value='')
      {
        return $this->belongsTo('App\Lecturer');
      } 		

      public function students()
      {
        return $this->belongsToMany('App\Student','enrollments');
      }
}
