<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Gate15;
use App\Atypical_Location;
use App\Score;
use App\User;

class PageController extends Controller
{

    function city() {
      $locations = Atypical_Location::get();

      // get data of website
      $file = 'config/webpagesContent.json';
      $content = json_decode(file_get_contents($file), false);
      $introtekst = $content->stadIntroTekst;

      $scores = Score::all();
      foreach($scores as $userscore) {
        $userscore->totalscore = $userscore->scoreStacker + $userscore->scoreFrogger + $userscore->scoreFlappy + $userscore->scoreMaze;
        $username = User::select('name')->where('id', '=', $userscore->user_id)->get();
        $userscore->username = $username[0]->name;
      }
      $scores = array_values(array_sort($scores, function ($value) {
        return $value['totalscore'];
      }));
      $scores = array_reverse($scores);
      $scores = array_slice($scores, 0, 5);
      return $scores;

      return view('pages.city', compact('introtekst', 'locations'));
    }
}
