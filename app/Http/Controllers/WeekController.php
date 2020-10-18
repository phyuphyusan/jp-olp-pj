<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Week;
use Alert;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeks = Week::all();
        // dd($items);
        return view('backend.weeks.index',compact('weeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.weeks.create');
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
        $week = new Week;
        $week->name = $request->name;
        $week->save();

        // Redirect
        // Alert::success('Success!', 'New Brand Inserted Successfully.');

        return redirect()->route('weeks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.weeks.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $week = Week::find($id);
        // dd($item);
        return view('backend.weeks.edit',compact('week'));
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
        $week = Week::find($id);
        // dd($category);
        $week->name = $request->name;
        $week->save();

        // Redirect
        // Alert::success('Success!', 'Brand Updated Successfully.');

        return redirect()->route('weeks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $week = Week::find($id);

        $week->delete();

        // Alert::success('Success!', 'Brand Deleted Successfully.');
        
        return redirect()->route('weeks.index');
    }
}
