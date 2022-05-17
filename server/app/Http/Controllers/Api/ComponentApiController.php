<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;

class ComponentApiController extends ApiController {
    public function __construct()
    {
        //
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
        return response()->json('Hello from listInstalled');
    }
}