<?php

namespace Package\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;

class PackageApiController extends ApiController {
    public function __construct()
    {
        //
    }

    public function installPackage() {
        return response()->json('Hello from installPackage');

    }

    public function disablePackage() {
        return response()->json('Hello from listEnabledPackages');

    }



    public function listEnabledPackages() {
        return response()->json('Hello from listEnabledPackages');

    }

    public function listInstalledPackages() {
        return response()->json('Hello from listInstalledPackages');
    }
}