<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['name','major_id'];

    public function major($value='')
  		{
    		return $this->belongsTo('App\Major');
  		}

  	public function course()
  	{
    	return $this->hasMany('App\Course');
  	}
}
