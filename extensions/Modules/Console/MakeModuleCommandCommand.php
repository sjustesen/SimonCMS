<?php

namespace App\Modules\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Modules\Repository;
use App\Modules\Generators\ModuleCommandGenerator;

class MakeModuleCommandCommand extends Command
{
	/**
	 * @var string
	 */
	protected $name = 'module:make-command';

	/**
	 * @var string
	 */
	protected $description = 'Creates a new command for the specified module.';

	/**
	 * @var Repository
	 */
	protected $moduleRepo;

	/**
	 * Class constructor.
	 * @param Repository $moduleRepo
	 */
	public function __construct(Repository $moduleRepo)
	{
		$this->moduleRepo = $moduleRepo;

		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$moduleName = $this->argument('moduleName');
		$module = $this->moduleRepo->getByName($moduleName);

		if (!$module)
			return $this->error("Module [$moduleName] does not exist.");

		$commandName = $this->argument('commandName');

		$generator = new ModuleCommandGenerator($commandName, $this->laravel, $module);
		$generator->generate();

		$this->info("The command [$commandName] has been created for module [$moduleName].");

		$this->call('module:make-handler', [
			'type' 			=>	'command',
			'moduleName' 	=>	$moduleName,
			'handlerName'	=>	$commandName . 'Handler',
			'handlingName'	=>	$commandName
		]);
	}

	/**
	 * Get the console command arguments.
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['moduleName', InputArgument::REQUIRED, 'The name of your module.'],
			['commandName', InputArgument::REQUIRED, 'The name of your command.'],
		];
	}

	/**
	 * Get the console command options.
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}
}