<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class HighSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $schools = School::get();
      return view('highschool.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->school_id == 'new') {
          $school = new School;
      } else {
          $school = School::find($request->school_id);
      }

      if (!$request->name || !$request->abbreviation) {
          return redirect()->back()->withInput(); //future: return and don't empty entire form
      }


      $school->name = $request->name;
      $school->abbreviation = $request->abbreviation;
      $school->save();

      return redirect(url('/cms/studeren/scholen'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $school = School::where('school_id', $id)->get()->first();
      return view('highschool.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
      $school = School::find($id);
      $school->delete();
      return redirect(url('/cms/studeren/scholen'));
    }
}
