<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use Alert;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $universities = University::all();
        // dd($items);
        // return $universities;
        return view('backend.universities.index',compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.universities.create');
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
        'name' => 'required|string',
        'photo' => 'required|mimes:jpeg,bmp,png,jpg',
        'location' => 'required|string',
        ]);

         //File Upload
         $imageName = time().'.'.$request->photo->extension();  
   
        $request->photo->move(public_path('backendtemplate/universityimg'), $imageName);
          $myfile='backendtemplate/universityimg/'.$imageName;


        //Store Data
          $university=new University;
          $university->name=$request->name;
          $university->photo=$myfile;
          $university->location=$request->location;
          $university->save();
           // Alert::success('Success!', 'New University Inserted Successfully.');

        //Redirect
          return redirect()->route('universities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.universities.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university=University::find($id);
         //dd($item);
         return view('backend.universities.edit',compact('university'));
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
        'photo' => 'nullable|sometimes|image',
        'location' => 'required',
        ]);
        //File Upload
         
        $myfile =$request->old_photo_path;
        //dd($myfile);
        
        if ($request->hasfile('photo')) 
        {
          $imageName = time().'.'.$request->photo->extension(); 
          $name=$request->old_photo_path; 

          // dd($name);
     
          if (file_exists(public_path($name)))
          {
            unlink(public_path($name));
            $request->photo->move(public_path('backendtemplate/universityimg'), $imageName);
            $myfile='backendtemplate/universityimg/'.$imageName;
          }

        }

        //Update Data
          $university=University::find($id);
          $university->name=$request->name;
          $university->photo=$myfile;
          $university->location=$request->location;
          $university->save();

          // Alert::success('Success!', 'University Updated Successfully.');

        //Redirect
          return redirect()->route('universities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = University::find($id);

        $university->delete();

        // Alert::success('Success!', 'University Deleted Successfully.');
        
        return redirect()->route('universities.index');
    }
}
