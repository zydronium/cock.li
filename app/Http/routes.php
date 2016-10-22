<?php
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Domain;

Route::get('/', 'WelcomeController@index');

Route::get('/server', function() {
  return view('pages.server');
});

Route::get('/mailinglist', function() {
  return view('pages.mailinglist');
});

Route::get('/xmpp', function() {
  return view('pages.xmpp');
});

Route::get('/donate', function() {
  return view('pages.donate')->with('donations',App\Http\Controllers\DonationController::calculate());;
});

Route::post('/donate','\App\Http\Controllers\DonationController@postDonate');

Route::get('/tos', function() {
  return view('pages.tos');
});

Route::get('/abuse', function() {
  return view('pages.abuse');
});

Route::get('/privacy', function() {
  return view('pages.privacy');
});

Route::controller('auth','Auth\AuthController');
Route::controller('user','UserController');
