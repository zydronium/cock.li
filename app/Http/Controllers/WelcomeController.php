<?php namespace App\Http\Controllers;

use App\Domain;
use App\User;
use App\Testimonial;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
  {
    $domains = [];
    $total = 0;
    foreach(Domain::where('public',1)->orderBy('open','DESC')->get() as $domain) {
      $count = User::where('email','like',"%@{$domain->domain}")->count();
      $domains[] = (object) [
        'domain' => $domain->domain,
        'count' => $count,
	'open' => $domain->open
      ];
      $total += $count;
    }

    $testimonial = Testimonial::orderByRaw('RAND()')->first();

		return view('pages.welcome')->with('domains',$domains)->with('total',$total)->with('testimonial',$testimonial)->with('donations',DonationController::calculate());
	}

}
