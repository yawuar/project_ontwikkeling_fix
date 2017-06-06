<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use App\Faculty;
use App\Study;
use App\School;
use Response;

class SchoolController extends Controller
{
    public $hearts = [];
    public function index()
    {
      // get all faculties
      $faculties = Faculty::select('*')->get();
      return view('school.index', compact('faculties'));
    }

    public function show($name)
    {
      $facultyName = str_replace('-', ' ', $name);
      $facultyId = Faculty::select('faculty_id')->where('name', $facultyName)->first()->faculty_id;
      $studies = Study::select('*')->where('faculty_id', $facultyId)->groupBy('name')->get();
      return view('school.studies', compact('studies', 'facultyName'));
    }

    public function showStudies($name, $id)
    {
      $schools = Study::join('school', 'opleidingen.school_id', '=', 'school.school_id')->join('faculties', 'opleidingen.faculty_id', '=', 'faculties.faculty_id')->select('opleidingen.name', 'opleidingen.url', 'school.name AS school_name', 'faculties.name AS faculty_name', 'opleidingen.content', 'opleidingen.image_url', 'school.abbreviation')->where('opleidingen.name', '=', str_replace('-', ' ', $id))->get();
      return view('school.studydetail', compact('schools'));
    }

    public function showRandomStudy() {
      $schools = Study::join('school', 'opleidingen.school_id', '=', 'school.school_id')->join('faculties', 'opleidingen.faculty_id', '=', 'faculties.faculty_id')->select('opleidingen.name', 'opleidingen.url', 'opleidingen.content', 'faculties.name AS faculty_name')->get()->random(1)->first();
      $facultyName = str_slug($schools['faculty_name'], '-');
      $studyName = str_slug($schools['name'], '-');
      return redirect('school/'. $facultyName .'/' . $studyName);
    }

    public function keepInSession($name) {
      // array_push($this->hearts, $name);
      Session::put('buttons.' . $name, $name);
      return Response::json(['isBtn' => true]);
    }

    public function keepInCourseSession($name) {
      // array_push($this->hearts, $name);
      Session::put('courses.' . $name, $name);
      return Response::json(['isCourse' => true]);
    }

    public function removeItemFromSession($name) {
      return Session::forget('buttons.' . $name);
    }

    public function removeFromCourseSession($name) {
      return Session::forget('courses.' . $name);
    }
}
