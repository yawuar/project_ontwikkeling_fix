<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;

class FacultyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $faculties = Faculty::get();
    return view('faculty.index', compact('faculties'));
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
    if ($request->faculty_id == 'new') {
        $faculty = new Faculty;
    } else {
        $faculty = Faculty::find($request->faculty_id);
    }

    if (!$request->name) {
        return redirect()->back()->withInput(); //future: return and don't empty entire form
    }

    if ($request->file('image')) {
        $file = $request->file('image');
        $destinationPath = 'images';
        $imageTitle = time() . $file->getClientOriginalName();
        $file->move($destinationPath,$imageTitle);

        $faculty->image_url = $destinationPath . '/' . $imageTitle;
    }

    $faculty->name = $request->name;
    $faculty->save();

    return redirect('/cms/studeren/faculties');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $faculty = Faculty::where('faculty_id', $id)->get()->first();
    return view('faculty.show', compact('faculty'));
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
    $faculty = Faculty::find($id);
    $faculty->delete();
    return redirect('/cms/studeren/faculties');
  }
}
