<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeExpensesStopsAtNullable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::table('expenses', function($table) {
      $table->datetime('stops_at')->nullable()->change();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('expenses', function($table) {
      $table->datetime('stops_at')->change();
    });
	}

}
