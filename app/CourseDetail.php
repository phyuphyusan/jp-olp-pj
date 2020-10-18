<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $fillable=['week','chapter_title','video','document','course_id'];

    public function course($value='')
  		{
  			return $this->belongsTo('App\Course');
  		}
}

