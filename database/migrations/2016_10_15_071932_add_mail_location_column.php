<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class AddMailLocationColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::table('users',function(Blueprint $table){
      $table->string('mail_location')->nullable();
    });

    $users = User::all();

    foreach($users as $user) {
      $user_split = explode('@',$user->email);
      $user->mail_location = sprintf('maildir:/var/mail/vhosts/%s/%s/',$user_split[1],$user_split[0]);
      $user->save();
    }

    Schema::table('users',function(Blueprint $table){
      $table->string('mail_location')->nullable(false)->change();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
