<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;
use App\Domain;

class ActivateReservedUsernames extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
  $users = User::where('reserved_username','!=','')->get();
  $users_to_create = []; 

  foreach($users as $user) {
    // here we go...

    // First thing: why do so many of you use capital fucking letters???
    $user->reserved_username = strtolower($user->reserved_username);

    // tfw you can't even write an E-mail address properly on an E-mail website
    if(!preg_match('/^([0-9a-z]{1,32})@([0-9a-z\.]+\.[a-z]+)$/',$user->reserved_username,$matches))
      continue;

    // This shouldn't happen
    if(!isset($matches))
      continue;

    // User exists :\
    if(User::where('email',$user->reserved_username)->count())
      continue;

    // Domain doesn't exist?!?!
    if(!Domain::where('domain',$matches[2])->where('public',1)->where('open',0)->count())
      continue;

    // okay, fine. The user doesn't exist, the domain exists, the user actually didn't fuck things up.
    // There's still one check left, though...

    // I'm not sorry for what I'm about to do.

    // Did two or more people reserve the same username?
    $dupe = User::where('reserved_username',$user->reserved_username)->count() !== 1;

    // Time to create the user.

    User::create([
      'email' => $user->reserved_username,
      'password' => $user->password,
      'disabled' => $dupe, // Yep, that's right motherfucker. If two users reserved the same username,
                           // it is created and instantly banned. This is the only way I can make sure that
                           // an impostor never gets access to this account. No exceptions. There is no
                           // "mediation process", I lied to you from the beginning.
      'registered_ip' => $user->registered_ip
    ]); 
  }

  Schema::table('users',function($table){
    $table->dropColumn('reserved_username'); // *drops mic*
  });

  $domains = Domain::where('public',1)->where('open',0)->get();

  foreach($domains as $domain) {
    $domain->open = 1; // open the flood gates
    $domain->save();
  }

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// rollbacks are for pussies
	}

}
