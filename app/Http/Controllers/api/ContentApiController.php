<?php

namespace App\Http\Controllers\Api;

class ContentApiController extends ApiController
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

    public function listContent() {
        return response()->json('Hello from Content');
    }
}
