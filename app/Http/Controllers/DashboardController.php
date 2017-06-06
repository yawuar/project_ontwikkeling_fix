<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

class DashboardController extends Controller
{
    public function index() {
      $user = Auth::user();
      $user_role = (int)$user->user_role;
      $users = User::all();
      if($user_role === 0) {
        return redirect('/');
      } else {
        return view('dashboard.index', compact('user_role', 'users'));
      }
    }

    public function change(Request $request) {
      $data = $request->all();
      $user = User::find($data['user_id']);
      $user->user_role = $data['permissions'];
      $user->save();
      return Redirect::back();
    }
}
