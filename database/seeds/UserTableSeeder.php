<?php

use Illuminate\UserTable\Seeder;
use Illuminate\UserTable\Eloquent\Model;
use App\Services\CustomHasher;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table('users')->insert([
			
		]);
	}

}
