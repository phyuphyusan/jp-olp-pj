<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notificable;

class Lecturer extends Model
{
    protected $fillable=['bachelor','position','user_id','university_id'];

    public function user($value='')
    {
        return $this->belongsTo('App\User');
    }

    public function university()
    {
        return $this->belongsTo('App\University');
    }

    public function course($value='')
  		{
  			return $this->hasMany('App\Course');
  		}
}
