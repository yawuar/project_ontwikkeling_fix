<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Gate15;
use App\Atypical_Location;

class PageController extends Controller
{

    function city() {
      $locations = Atypical_Location::get();

      // get data of website
      $file = 'config/webpagesContent.json';
      $content = json_decode(file_get_contents($file), false);
      $introtekst = $content->stadIntroTekst;
      return view('pages.city', compact('introtekst', 'locations'));
    }
}
