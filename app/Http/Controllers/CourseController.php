<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Subject;
use App\Lecturer;
use App\Course;
use App\CourseDetail;
use App\Major;
use Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        // dd($courses);
        return view('backend.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $subjects = Subject::all();
        $lecturers = Lecturer::all();
        $majors = Major::all();
        return view('backend.courses.create',compact('subjects','lecturers','majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'week' => 'required',
            'fee'=> 'required',
            'discount' => 'required',
            'subject' => 'required',
        ]);
        $name=$request->name;
        $description= $request->description;
        $week= $request->week;
        $fee= $request->fee;
        $discount =$request->discount;
        $subject=$request->subject;
        $lecturer=\Auth::user()->lecturer->id;
        // $major=subject()->major->id;

        
        // File Upload
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backendtemplate/courseimg'),$imageName);
        $myfile = 'backendtemplate/courseimg/'.$imageName;
         // $name=$request->name;
        // Store Data
        // dd($name);
        $course = new Course;
        // $course->name = $request->name;
        $course->name=$name;
        $course->photo = $myfile;
        $course->description =$description;
        $course->week = $week;
        $course->fee=$fee;
        $course->discount= $discount;
        $course->subject_id = $subject;
        $course->lecturer_id = $lecturer;
        $course->save();

        // Redirect
        // Alert::success('Success!', 'New Item Inserted Successfully.');

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('backend.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $subjects = Subject::all();
        $lecturers = Lecturer::all();
        return view('backend.courses.edit',compact('course','subjects','lecturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'required',
        //     'photo' => 'required',
        //     // may be present or absent
        //     'description' => 'required',
        //     'time_period' => 'required',
        //     'fee' => 'required',
        //     'discount' => 'required',
        //     'subject' => 'required',
        // ]);

        // File Upload
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();

            $request->photo->move(public_path('backendtemplate/courseimg'),$imageName);
            $myfile = 'backendtemplate/courseimg/'.$imageName;
        }

        // if upload new image, delete old image;

        // Update Data
        $course = Course::find($id);
        $course->name = $request->name;
        if ($request->hasFile('photo')) {
                File::delete($course->photo);
                $course->photo = $myfile;  
            }else{
                $course->photo = $course->photo;
            }
        $course->description = $request->description;
        $course->week = $request->week;
        $course->fee= $request->fee;
        $course->discount= $request->discount;
        $course->subject_id = $request->subject;
        $course->lecturer_id = $request->lecturer;
        // dd($request);
        $course->save();

        // Redirect
        // Alert::success('Success!', 'Course Updated Successfully.');

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $course = Course::find($id);
        // delete related file from storage
        // File::delete($item->photo);
        $course->delete();
        // Alert::success('Success!', 'Item('.$item->codeno.') Deleted Successfully.');
        return redirect()->route('courses.index');
    }
}
