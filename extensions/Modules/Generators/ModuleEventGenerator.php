<?php

namespace App\Modules\Generators;

use Laravel\Lumen\Application;
use App\Modules\Module;
use Illuminate\Support\Str;


class ModuleEventGenerator extends Generator
{	
	/**
	 * @var string
	 */
	protected $eventName;

	/**
	 * @var Application
	 */
	protected $app;

	/**
	 * @var Module
	 */
	protected $module;

	/**
	 * @var string
	 */
	protected $stub = 'moduleEvent.stub';

	/**
	 * Class constructor.
	 * @param string      $eventName
	 * @param Application $app
	 * @param Module      $module
	 */
	public function __construct($eventName, Application $app, Module $module)
	{
		$this->eventName = $eventName;
		$this->app = $app;
		$this->module = $module;
	}

	/**
	 * Returns the name of the module.
	 * @return string
	 */
	public function getModuleName()
	{
		return $this->module->getName();
	}

	/**
	 * Returns the path to the destination file.
	 * @return string
	 */
	public function getFilePath()
	{
		$fileName = Str::studly($this->eventName) . '.php';

		return $this->module->getPath() . 'Events/' . $fileName;
	}

	/**
	 * @param  string $contents
	 * @return string
	 */
	public function replaceStubContents($contents)
	{
		return str_replace('{className}', Str::studly($this->eventName), $contents);
	}
}