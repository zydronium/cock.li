<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Hash;
use Validator;
use Auth;
use App\PasswordChange;

class UserController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	
	public function getIndex() {
  		return view('pages.user.home');
	}

  public function getCongrats() {
    if(!session()->has('just_registered'))
      return redirect('/user');

    return view('pages.user.congrats');
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

    $password_change = new PasswordChange();
    $password_change->user_id = $user->id;
    $password_change->save();

		return redirect('/user/changepass')->with('message','Your password has been changed!');
		
	}

}
