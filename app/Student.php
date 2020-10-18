<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['bachelor','position','user_id'];

    public function user($value='') 
    {
        return $this->belongsTo('App\User');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course','enrollments','course_id','student_id');
    }
}
