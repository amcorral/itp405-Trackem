<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use DB;

class LoginController extends Controller
{
  public function loginPage(){
    if (Auth::check()){
      return redirect('/account');
    }
    else {
    return view('login');
    }
  }

  public function login()
  {

    $credentials = [
           'email' => request('email'),
           'password' => request('password'),
           'confirmed' => 1
       ];

    $loginWasSuccessful = Auth::attempt($credentials);

    if ($loginWasSuccessful) {
      return redirect ('/account');
    }
    else {
      return redirect ('/login')
      ->with('incorrectLogin', 'Login Unsuccessful');
    }
  }

  public function logout(){
    Auth::logout();
    return redirect ('/login');
  }



}
