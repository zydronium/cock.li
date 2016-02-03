<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CustomHasher;

class HasherServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
    $this->app->bind('hash', function() {
      return new CustomHasher();
    });
	}

}
