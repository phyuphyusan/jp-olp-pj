<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable=['name'];

    public function subject($value='')
      {
        return $this->hasMany('App\Subject');
      }

    public function course()
    {
      return $this->hasManyThrough('App\Course', 'App\Subject');
    }
    // public function courses($value='')
    // {
    // 	return $this->belongsToMany('App\Courses')
		  //   	->withPivot('')
		  //   	->withTimestamps();
    // }
}
