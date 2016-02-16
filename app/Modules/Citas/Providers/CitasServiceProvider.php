<?php
namespace App\Modules\Citas\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class CitasServiceProvider extends ServiceProvider
{
	/**
	 * Register the Citas module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Citas\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Citas module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('citas', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('citas', base_path('resources/views/vendor/citas'));
		View::addNamespace('citas', realpath(__DIR__.'/../Resources/Views'));
	}
}
