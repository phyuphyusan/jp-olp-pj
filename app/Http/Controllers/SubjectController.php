<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Subject;
use App\Major;
use Alert;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $majors = Major::all();
        // dd($items);
        return view('backend.subjects.index',compact('majors','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();
        return view('backend.subjects.create',compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required',
        ]);

        // Store Data
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->major_id = $request->major;
        $subject->save();

        // Redirect
        // Alert::success('Success!', 'New Brand Inserted Successfully.');

        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.subjects.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        $majors = Major::all();
        // dd($item);
        return view('backend.subjects.edit',compact('majors','subject'));
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
        $request->validate([
            'name' => 'required',
            'major' => 'required',
        ]);

        // Update Data
        $subject = Subject::find($id);
        // dd($category);
        $subject->name = $request->name;
        $subject->major_id = $request->major;
        $subject->save();

        // Redirect
        // Alert::success('Success!', 'Brand Updated Successfully.');

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        $subject->delete();

        // Alert::success('Success!', 'Brand Deleted Successfully.');
        
        return redirect()->route('subjects.index');//compact('status')
    }
}
