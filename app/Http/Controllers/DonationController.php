<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Donation;
use App\Expense;

class DonationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

  public static function calculate() {
    $donations = [
      "this" => [
        "balance" => env('D_BALANCE',0.0),
        "donations" => env('D_DONATIONS',0.0),
        "expenses" => env('D_EXPENSES',1.0)
      ],
      "last" => [
        "balance" => env('L_BALANCE',0.0),
        "donations" => env('L_DONATIONS',0.0),
        "expenses" => env('L_EXPENSES',1.0)
      ]
    ];

    return $donations;

    $this_month = Carbon::now()->day(1)->hour(0)->minute(0)->second(0);
    $last_month = Carbon::now()->subMonth()->day(1)->hour(0)->minute(0)->second(0);

    $donations_this = Donation::where('created_at','>=',$this_month)->get();
    $expenses_this = Expense::all();

    $donations_upToLast = Donation::where('created_at','<',$last_month)->get();
    $expenses_upToLast = Expense::where('effective_at','<',$last_month)->get();
    $expenses_last = Expense::where('effective_at','<',$this_month)->get();
    $donations_last = Donation::where('created_at','<',$this_month)->where('created_at','>=',$last_month)->get();

    foreach($donations_upToLast as $donation)
      $donations["last"]["balance"] += $donation->amount;

    foreach($expenses_upToLast as $expense) {
      $date = Carbon::parse($expense->effective_at);
      $difference = $date->diffInMonths($last_month);

      $donations["last"]["balance"] -= $expense->amount * $difference;
    }

    foreach($donations_last as $donation)
      $donations["last"]["donations"] += $donation->amount;

    foreach($expenses_last as $expense)
      $donations["last"]["expenses"] += $expense->amount;

    $donations["this"]["balance"] = $donations["last"]["balance"] - $donations["last"]["expenses"] + $donations["last"]["donations"];

    foreach($donations_this as $donation)
      $donations["this"]["donations"] += $donation->amount;

    foreach($expenses_this as $expense)
      $donations["this"]["expenses"] += $expense->amount;

    return $donations;
  }
}
