<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Major;
use Alert;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        // dd($items);
        return view('backend.majors.index',compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.majors.create');
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
        ]);

        // Store Data
        $major = new Major;
        $major->name = $request->name;
        $major->save();

        // Redirect
        Alert::success('Success!', 'New Major Inserted Successfully.');

        return redirect()->route('majors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.majors.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::find($id);
        // dd($item);
        return view('backend.majors.edit',compact('major'));
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
        ]);

        // Update Data
        $major = Major::find($id);
        // dd($category);
        $major->name = $request->name;
        $major->save();

        // Redirect
        Alert::success('Success!', 'Major Updated Successfully.');

        return redirect()->route('majors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::find($id);
        $major->delete();

        Alert::success('Success!', 'Major Deleted Successfully.');
        
        return redirect()->route('majors.index');
    }
}
