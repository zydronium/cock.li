<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Hash;
use Validator;
use Auth;

class UserController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	
	public function getIndex() {
  		return view('pages.user.home');
	}

	public function getChangepass() {
		return view('pages.user.changepass');
	}

	public function postChangepass(Request $request) {
		Validator::extend('passcheck', function ($attribute, $value, $parameters) 
		{
			return Hash::check($value, Auth::user()->password);
		});
		$this->validate($request, [
			'old_password' => 'required|passcheck',
			'password' => 'required|confirmed|min:8|max:255',
		],[
			
      			'old_password.passcheck' => 'The password you entered is incorrect',
      			'password.min' => 'Password must be 8-255 characters',
		]);

		$user = Auth::user();
		$user->password = Hash::make($request->password);
		$user->save();

		return redirect('/user/changepass')->with('message','Your password has been changed!');
		
	}

	public function getReserve() {
    return view('pages.user.reserve')->with('reserved',Auth::user()->reserved_username);
	}

	public function postReserve(Request $request) {
		Validator::extend('gayhomo', function ($attribute, $value, $parameters) 
		{
      return Auth::user()->reserved_username === '';
		});
		$this->validate($request, [
			'reserved_username' => 'required|max:512|gayhomo',
		],[
      			'reserved_username.max' => 'Reserved username field must be <= 512 characters',
      			'reserved_username.gayhomo' => 'You\'ve already reserved a username! fag!',
		]);

		$user = Auth::user();
		$user->reserved_username = $request->reserved_username;
		$user->save();

		return redirect('/user/reserve')->with('message','Your username has been painstakingly chiseled into the stone of cock. A quiet breeze brushes away the remaining dust and you feel a warmth come over you, knowing your your mark has been made. The rumbling you hear in the distance is your call back to duty as the Phallic Reich gears up to take back from the Nazis what is rightfully theirs. CUM MENTULUS, UNITAS.');
		
	}

}
