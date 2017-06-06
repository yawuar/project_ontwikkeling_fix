<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gate15;
use App\Gate15Event;

class HomeController extends Controller
{
  public function index() {
    $is_accepted = 1; // check if article is accepted
    $articles = Gate15::where('is_accepted', $is_accepted)->orderBy('published_on', 'desc')->limit(3)->get();
    $event = Gate15Event::all()->last();

    // get data of website
    $file = 'config/webpagesContent.json';
    $content = json_decode(file_get_contents($file), false);
    $introtekst = $content->homepageIntroTekst;
    $tagline = $content->homepageTagline;

    return view('home.index', compact('articles', 'event', 'introtekst', 'tagline'));
  }
}
