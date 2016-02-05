<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Domain;
use Mail;
use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
    $this->redirectTo  = "/user";

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register')->with('domains', Domain::where('public',1)->where('open',1)->get());
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
    $data = $request->all();

    if(isset($data['username']) && isset($data['domain'])) {
      $data['email'] = $data['username'] . '@' . $data['domain'];
      $data['email'] = strtolower($data['email']);
    }

		$validator = $this->registrar->validator($data);

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));

    if(isset($data['news_subscription']) && $data['news_subscription'] === "on" && env('APP_ENV','local') === 'production') {
      $un = $data['email'];
      `echo "$un" | /usr/lib/mailman/bin/add_members -w n -r - cock.li-news`;
    }

    Mail::send(['text' => 'emails.welcome'], ['username' => Auth::user()->email], function($message){
      $message->to(Auth::user()->email)->subject('Welcome to Cockmail!');
    });

		return redirect($this->redirectPath());
	}

}
