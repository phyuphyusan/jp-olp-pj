<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
use App\Course;
use App\CourseDetail;
use App\User;
use App\Lecturer;
use App\University;
use Auth;

class FrontendController extends Controller
{
    // function home($value=''){
    // 	return view('frontend.home');
    // }
    public function home($value='')
    {
    	$courses = Course::orderBy('id','desc')->take(4)->get();
    	return view('frontend.home',compact('courses'));
    }

    // ItemController -> show
    public function course($value='')
    {
      $courses = Course::orderBy('id','desc')->take(4)->get();
      return view('frontend.course',compact('courses'));
    }

     public function courseview($id)
    {
      // dd($id);
      $course = Course::find($id);
      $coursedetails = CourseDetail::where('course_id',$id)->get();
      $enrolls = DB::table('enrollments')->get();
      return view('frontend.courseview',compact('coursedetails','course','enrolls'));
    }

    public function signup($value='')
    {
      $universities=University::all();
     return view('auth.signup',compact('universities'));
    }

    public function createLecturer(Request $request)
    {
      //Validation 
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'bachelor' => ['required'],
        'position' => ['required'],
      ]);
   
      // dd($request);
      // insert user
       $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
      // assign lecturer
        $user->assignRole('lecturer');

      // insert lecturer
        $lecturer = new Lecturer;
        $lecturer->user_id = $user->id;
        $lecturer->bachelor = $request->bachelor;
        $lecturer->position = $request->position;
        $lecturer->university_id = $request->university;
        $lecturer->save();

        Auth::login($user);  
        return redirect()->route('dashboard');
    }

    public function signin($value='')
  	{
    	return view('auth.signin');
  	}

    public function show($id)
    {
        $coursedetail = CourseDetail::findOrFail($id);
        return view('frontend.show',compact('coursedetail'));
    }

    public function showvideo($id)
    {
        $coursedetail = CourseDetail::findOrFail($id);
        return view('frontend.showvideo',compact('coursedetail'));
    }


    public function loginLecturer(Request $request,$user)
    {
      $roles = auth()->user()->getRoleNames();
        // Check user role
        switch ($roles[0]) {
            case 'lecturer':
                    return redirect()->route('dashboard');
                break;
            case 'student':
                    return redirect()->route('homepage');
                break; 
            default:
                    return redirect()->route('/');  
                break;
        }
    }
}
