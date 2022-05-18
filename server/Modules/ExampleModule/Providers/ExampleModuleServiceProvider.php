<?php

namespace Modules\ExampleModule\Providers;

use Illuminate\Support\ServiceProvider;

class ExampleModuleServiceProvider extends ServiceProvider
{
	/**
	 * Register the {name} module service provider.
	 */
	public function register()
	{
		//$this->app->register('Modules\ExampleModule\Providers\RouteServiceProvider');

		//Lang::addNamespace('{identifier}', base_path('Modules/{name}/Resources/Language'));
		//View::addNamespace('{identifier}', base_path('Modules/{name}/Resources/Views'));
	}
}