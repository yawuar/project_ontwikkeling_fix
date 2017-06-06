<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;
use App\Faculty;
use App\School;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $studies = Study::get();
      return view('study.index', compact('studies'));
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
      if ($request->opleiding_id == 'new') {
          $study = new Study;
      } else {
          $study = Study::find($request->opleiding_id);
      }

      if (!$request->name || !$request->content) {
          return redirect()->back()->withInput(); //future: return and don't empty entire form
      }

      //image
      if ($request->file('image')) {
          $file = $request->file('image');
          $destinationPath = 'images';
          $imageTitle = time() . $file->getClientOriginalName();
          $file->move($destinationPath,$imageTitle);

          $study->image_url = '/' . $destinationPath . '/' . $imageTitle;
      }
      $study->opleiding_id = $request->opleiding_id;
      $study->url = $request->url;

      $study->name = $request->name;
      $study->content = $request->content;
      $study->faculty_id = $request->faculty;
      $study->school_id = $request->school;
      $study->save();

      return redirect('/cms/studeren');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $study = Study::where('opleiding_id', $id)->get()->first();
      $faculties = Faculty::get();
      $schools = School::get();
      return view('study.show', compact('study', 'faculties', 'schools'));
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
      $study = Study::find($id);
      $study->delete();
      return redirect('/cms/studeren');
    }
}
