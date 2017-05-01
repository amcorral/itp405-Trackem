<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');
Route::post('/', 'MainController@signUp');
Route::get('/account', 'MainController@account')->middleware('protected');
Route::get('/register/{confirmationCode}', 'MainController@confirm');

Route::post('/account/customer', 'AccountController@addCustomer');
Route::post('/account', 'AccountController@addInfo');
Route::get('/account/customer/{id}', 'AccountController@detailedCustomerView')->middleware('protected2');
Route::post('/account/customer/{id}', 'AccountController@addCustomerUpdate');

Route::get('/login', 'LoginController@loginPage');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
