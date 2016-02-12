<?php
namespace App\Modules\Inventario\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class InventarioServiceProvider extends ServiceProvider
{
	/**
	 * Register the Inventario module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Inventario\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Inventario module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('inventario', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('inventario', base_path('resources/views/vendor/inventario'));
		View::addNamespace('inventario', realpath(__DIR__.'/../Resources/Views'));
	}
}
