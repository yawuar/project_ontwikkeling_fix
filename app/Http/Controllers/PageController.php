<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Gate15;

class PageController extends Controller
{

    function city() {
      return view('pages.city');
    }
}
