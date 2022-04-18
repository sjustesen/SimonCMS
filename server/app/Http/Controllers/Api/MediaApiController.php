<?php

namespace App\Http\Controllers\Api;

class MediaApiController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function listMedia() {
        return response()->json('Hello from Media');

    }

    //
}
