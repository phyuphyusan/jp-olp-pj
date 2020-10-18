<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseDetail;
use App\Student;
class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = DB::table('enrollments')->get();
        return view('frontend.courseview', ['enrolls' => $enrolls]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required',
            'student' => 'required', 
        ]);
        $student = Student::find($request->student);
        $student->courses()->attach(Course::find($request->course)->id);
        return back();
    }

    // public function show()
    // {
    //     $enrolls = DB::table('enrollments')->get();
    //     return view('frontend.courseview', ['enrolls' => $enrolls]);
    // }

}