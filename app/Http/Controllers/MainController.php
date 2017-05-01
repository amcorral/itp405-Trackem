<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\customer;
use Hash;
use DB;
use Validator;
use Mail;

class MainController extends Controller
{
    public function index(){
      return view('home');
    }


    public function signUp(){
      $validator=Validator::make(
         [
           'email' => request('email'),
           'password' => request('password')
         ],
        [
            'email' => 'required|min:6|unique:users',
            'password' => 'required|min:6'
        ]);

      if($validator->fails())
         {
             return redirect ('/')
             ->with('errorSigningUp', 'Email is already taken or password is not long enough. Must be at least 6 characters');
         }
      else {
        $confirmation_code = str_random(30);
        $user = new User();
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->confirmation_code = $confirmation_code;
        $user->save();

        Mail::send('email', ['confirmation_code' => $confirmation_code], function($message) {
            $message->to(request('email'), request('name'))
                ->subject('Verify your email address');
        });

        return redirect ('/login')
        ->with('successStatus', 'Confirm your email now to finish signing up!');
      }
    }

    public function account() {
      return view ('account', [
        'user'=>Auth::user(),
        $user = User::with('customer')->get()]);
    }

    public function confirm($confirmation_code){
      $user = User::whereConfirmationCode($confirmation_code)->first();
      $user->confirmed = 1;
      $user->confirmation_code = null;
      $user->save();

      return redirect ('/login');
    }


}
