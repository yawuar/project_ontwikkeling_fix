<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Score;

class restapiController extends Controller
{
    public function login(){
        if (isset($_GET['token']) && $_GET['token'] == '7D9wC3K9Cjna0NGVOXJl' && isset($_GET['username']) && isset($_GET['password'])) {
            $username = $_GET['username'];
            $password = $_GET['password'];
            if (Auth::attempt(array('name' => $username, 'password' => $password))){
                return "success";
            } else {
                return "false";
            }
        } else {
            return('false');
        }
    }

    public function register(){
        if (isset($_GET['token']) && $_GET['token'] == '7D9wC3K9Cjna0NGVOXJl' && isset($_GET['username']) && isset($_GET['password']) && isset($_GET['email'])) {
            $username = $_GET['username'];
            $password = $_GET['password'];
            $email = $_GET['email'];
            //email validation?

            User::create([
                'name' => $username,
                'email' => $email,
                'password' => bcrypt($password),
                'user_role' => 0
            ]);

            $userid = User::select('id')->where('name', '=', $username)->get();
            $userid = $userid[0]->id;

            $userscore = new Score;
            $userscore->user_id = $userid;
            $userscore->scoreStacker = 0;
            $userscore->scoreFrogger = 0;
            $userscore->scoreFlappy = 0;
            $userscore->scoreMaze = 0;
            $userscore->save();

            return "success";
        } else {
            return 'false';
        }
    }

    public function sendScore(){
        if (isset($_GET['token']) && $_GET['token'] == '7D9wC3K9Cjna0NGVOXJl' && isset($_GET['username']) && isset($_GET['scoreStacker']) && isset($_GET['scoreFrogger']) && isset($_GET['scoreFlappy']) && isset($_GET['scoreMaze'])) {
            $username = $_GET['username'];
            $userid = User::select('id')->where('name', '=', $username)->get();
            $userid = $userid[0]->id;

            $scoreStacker = $_GET['scoreStacker'];
            $scoreFrogger = $_GET['scoreFrogger'];
            $scoreFlappy = $_GET['scoreFlappy'];
            $scoreMaze = $_GET['scoreMaze'];

            $score = Score::where('user_id', '=', $userid)->get();
            $score = $score[0];
            $score->scoreStacker = (int) $scoreStacker;
            $score->scoreFrogger = (int) $scoreFrogger;
            $score->scoreFlappy = (int) $scoreFlappy;
            $score->scoreMaze = (int) $scoreMaze;

            $score->save();

            return "OK";
        } else {
            return 'false';
        }
    }

    public function getScore(){
        if (isset($_GET['token']) && $_GET['token'] == '7D9wC3K9Cjna0NGVOXJl' && isset($_GET['username'])) {
            $username = $_GET['username'];
            $userid = User::select('id')->where('name', '=', $username)->get();
            $userid = $userid[0]->id;

            $scoreStacker = Score::select('scoreStacker')->where('user_id', '=', $userid)->get();
            $scoreFrogger = Score::select('scoreFrogger')->where('user_id', '=', $userid)->get();
            $scoreFlappy = Score::select('scoreFlappy')->where('user_id', '=', $userid)->get();
            $scoreMaze = Score::select('scoreMaze')->where('user_id', '=', $userid)->get();

            $response = ($scoreStacker[0]->scoreStacker . " " . $scoreFrogger[0]->scoreFrogger . " " . $scoreFlappy[0]->scoreFlappy . " " . $scoreMaze[0]->scoreMaze);
            return $response;
        } else {
            return 'false';
        }
    }

}