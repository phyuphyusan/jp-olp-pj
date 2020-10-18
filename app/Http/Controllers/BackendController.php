<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;
use App\Subject;
use App\CourseDetail;
use App\Course;

class BackendController extends Controller
{
    function dashboard($value=''){
    	return view('backend.dashboard');
    }
    
    public function getSubjects($id){
      $subjects=Subject::where('major_id',$id)->pluck('name','id');
      return json_encode($subjects);
    }
   
    public function getWeeks($id){
        if($id==0){ 
            $courses = Course::orderby('id','asc')->select('id','name','week')->first(); 
        }else{   
            $courses = Course::select('id','name','week')->where('id', $id)->first(); 
        }
    	return json_encode($courses);
    }

}
