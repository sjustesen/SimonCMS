<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;

use App\Modules\Repository;

class ComponentApiController extends ApiController {
    
    protected $modulesRepository;

    public function __construct(Repository $modulesRepository)
    {
        parent::__construct();
        $this->modulesRepository = $modulesRepository;

    }

    public function installComponent() {
        return response()->json('Hello from installComponent');

    }

    public function disable() {
        return response()->json('Hello from disable');

    }

    public function enable() {
        return response()->json('Hello from enable');

    }


    public function listEnabled() {
        return response()->json('Hello from listEnabled');

    }

    public function list() {
        $modules = $this->modulesRepository->getModules();
		$rows = [];
		foreach ($modules as $module)
			$rows[] = $module;

        return response()->json($rows);
    }
}