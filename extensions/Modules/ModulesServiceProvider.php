<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 */
	protected $defer = false;

	/**
	 * @var array
	 */
	protected $commands = [
		'App\Modules\Console\MakeModuleCommand',
		'App\Modules\Console\EnableModuleCommand',
		'App\Modules\Console\DisableModuleCommand',
		'App\Modules\Console\MakeModuleMigrationCommand',
		'App\Modules\Console\ModuleMigrateCommand',
		'App\Modules\Console\ModuleMigrateRollbackCommand',
		'App\Modules\Console\ModuleSeedCommand',
		'App\Modules\Console\MakeModuleRequestCommand',
		'App\Modules\Console\ModuleListCommand',
		'App\Modules\Console\MakeModuleCommandCommand',
		'App\Modules\Console\MakeModuleHandlerCommand',
		'App\Modules\Console\MakeModuleEventCommand'
	];

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->app->bind('modules', function($app) {
			return new Repository($app, $app['files']);
		});

		$this->commands($this->commands);
	}

	/**
	 * Boot the service provider.
	 */
	public function boot()
	{
		$this->app['modules']->register();
	}

	/**
	 * Get the services provided by the provider.
	 * @return array
	 */
	public function provides()
	{
		return ['modules'];
	}
}