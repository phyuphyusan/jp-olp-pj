<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Course;
use App\CourseDetail;

class CourseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursedetails = CourseDetail::with('course')->latest()->paginate(6);
        // dd($courses);
        return view('backend.coursedetails.index',compact('coursedetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('backend.coursedetails.create',compact('courses'));
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
            // 'chapter_title' => 'required',
            // 'video' => 'required',
            // 'document' => 'required',
            // 'course_id' => 'required',
        ]);
        $chapter_title=$request->chapter_title;
        // $video= $request->video;
        // $document= $request->document;
        $course=$request->course;
        $week=$request->week;

        // $fileName = time().'.'.$request->course_reading->extension();
        // $request->course_reading->move(public_path('backendtemplate/cdreadingfile'),$fileName);
        // $myfile = 'backendtemplate/cdreadingfile/'.$fileName;

       // if ($files = $request->file('course_reading')) {

       //  $destinationPath = 'public/document/'; // upload path
       //     $fileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
       //     $files->move($destinationPath, $fileName);
       //     $insert['course_reading'] = "$fileName";
       //  }

        // Store Data
        $coursedetail = new CourseDetail;

        if($request->file('video')){
            $video=$request->file('video');
            $videoname=time().'.'.$video->getClientOriginalExtension();
            $request->video->move('backendtemplate/storage/',$videoname);
            $coursedetail->video=$videoname;
        }

        if($request->file('document')){
            $document=$request->file('document');
            $filename=time().'.'.$document->getClientOriginalExtension();
            $request->document->move('backendtemplate/storage/',$filename);
            $coursedetail->document=$filename;
        }
        $coursedetail->chapter_title=$chapter_title;
        $coursedetail->course_id= $course;
        $coursedetail->week=$week;
        // dd($coursedetail);
        $coursedetail->save();

        // Redirect
        // Alert::success('Success!', 'New Item Inserted Successfully.');

        return redirect()->route('coursedetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coursedetail = CourseDetail::findOrFail($id);
        return view('backend.coursedetails.show',compact('coursedetail'));
    }

    // public function showvideo($id)
    // {
    //     $coursedetail = CourseDetail::findOrFail($id);
    //     return view('backend.coursedetails.showvideo',compact('coursedetail'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($video){
        return response()->download('backendtemplate/storage/'.$video);
    }

    public function edit($id)
    {
        //
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
        //
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
        $coursedetail = CourseDetail::find($id);
        $coursedetail->delete();
        // Alert::success('Success!', 'Item('.$item->codeno.') Deleted Successfully.');
        return redirect()->route('coursedetails.index');
    }
}
