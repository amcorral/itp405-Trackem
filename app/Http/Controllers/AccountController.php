<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\customer;
use App\customer_update;
use Hash;
use DB;

class AccountController extends Controller
{
  public function addInfo(){
    $user = Auth::user();
    $user->username = request('username');
    $user->first_name = request('first_name');
    $user->last_name = request('last_name');
    $user->city = request('city');
    $user->phone_number = request('phone_number');
    $user->birthday = request('birthday');
    $user->save();

    return redirect ('/account');
  }

  public function addCustomer(){
    $customer = new customer ();
    $customer->user_id = Auth::user()->id;
    $customer->customer_name = request('customer_name');
    $customer->street = request('street');
    $customer->city=request('city');
    $customer->state = request('state');
    $customer->email = request('email');
    $customer->poc_first_name = request('poc_first_name');
    $customer->poc_last_name = request('poc_last_name');
    $customer->poc_number = request('poc_number');
    $customer->save();
    return redirect('/account');
  }

  public function addCustomerUpdate($customerId){
    $customer = customer::find($customerId);

    $customer_update = new customer_update();
    $customer_update->customer_id = $customerId;
    $customer_update->update_date = request('update_date');
    $customer_update->update = request('update');
    $customer_update->save();

    return view ('customer', [
        'customer' => $customer,
        $customer = customer::with('customer_update')->get()
    ]);
  }

  public function detailedCustomerView($customerId){
    $customer=customer::find($customerId);

    return view ('customer', [
        'customer' => $customer,
        $customer = customer::with('customer_update')->get()
    ]);
  }

  // public function editAccount() {
  //       $user = Auth::user();
  //       $user->is_editing = 1;
  //
  //       return redirect ('/account', [
  //         'user' => $user
  //       ]);
  // }
  
}
