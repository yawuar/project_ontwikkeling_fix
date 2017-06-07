<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;

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
        if ($request->token == '7D9wC3K9Cjna0NGVOXJl') {
            return "OK";
        } else {
            return "INCORRECT TOKEN";
        }
    }
}