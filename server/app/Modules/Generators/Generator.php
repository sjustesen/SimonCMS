<?php

namespace App\Modules\Generators;

use Illuminate\Support\Str;

abstract class Generator
{
	/**
	 * Returns the name of the module.
	 * @return string
	 */
	abstract public function getModuleName();

	/**
	 * Returns the path to the destination file.
	 * @return string
	 */
	abstract public function getFilePath();

	/**
	 * Generates the file.
	 * @return mixed
	 */
	public function generate()
	{
		$stub = $this->getStubContents($this->stub);
		$path = $this->getFilePath();

		return app('files')->put($path, $stub);
	}

	protected function replaceStubContents($contents) {
		// TODO
	}

	/**
	 * Returns the stub contents of the given stub.
	 * @param  string $stub
	 * @return string
	 */
	protected function getStubContents($stub)
	{
		$contents = app('files')->get(__DIR__ . '/../Console/stubs/' . $stub);
		$namespace = 'Modules\\' . $this->getModuleName() . '\\';

		$contents = str_replace('{name}', $this->getModuleName(), $contents);
		$contents = str_replace('{identifier}', Str::slug($this->getModuleName()), $contents);
		$contents = str_replace('{namespace}', $namespace, $contents);

		if (method_exists($this, 'replaceStubContents'))
			$contents = $this->replaceStubContents($contents);

		return $contents;
	}
}