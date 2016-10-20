<?php namespace App\Services;

use App\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		Validator::extend('floodprotection', function ($attribute, $value, $parameters) 
    {
      $time = Carbon::now()->subDay();
      return User::where('registered_ip',$_SERVER['REMOTE_ADDR'])->where('created_at','>=',$time)->count() < env('REGISTRATION_LIMIT',5);
		});

		return Validator::make($data, [
      'username' => ['required','regex:/^[0-9a-zA-Z]{1,32}$/'],
      'email' => 'required|floodprotection|email|unique:users',
      'domain' => 'required|exists:domains,domain,public,1,open,1',
			'password' => 'required|confirmed|min:8|max:255',
      'captcha' => 'required|captcha'
    ], [
      'username.regex' => 'Username invalid. 1-32 characters, 0-9, a-z, A-Z allowed.',
      'email.floodprotection' => 'Registration is limited to 5 accounts per 24 hours',
      'captcha' => 'Captcha incorrect',
      'password.min' => 'Password must be 8-255 characters',
      'domain.exists' => 'You tried to register with a non-existant domain.',
    ]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'email' => strtolower($data['username'] . '@' . $data['domain']),
			'password' => bcrypt($data['password']),
      'registered_ip' => $_SERVER['REMOTE_ADDR'],
      'mail_location' => strtolower(sprintf('mdbox:/mnt/mail/vhosts/%s/%s/',$data['domain'],$data['username']))
		]);
	}

}
