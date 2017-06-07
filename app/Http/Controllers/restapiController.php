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
        if ($request->token == '7D9wC3K9Cjna0NGVOXJl') {
            return "OK";
        } else {
            return "INCORRECT TOKEN";
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

            return response()->json([
                'scoreStacker' => $scoreStacker[0]->scoreStacker,
                'scoreFrogger' => $scoreFrogger[0]->scoreFrogger,
                'scoreFlappy' => $scoreFlappy[0]->scoreFlappy,
                'scoreMaze' => $scoreMaze[0]->scoreMaze
            ]);
        } else {
            return 'false';
        }
    }

}