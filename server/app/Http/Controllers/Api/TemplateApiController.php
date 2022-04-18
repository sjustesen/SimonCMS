<?php

namespace App\Http\Controllers\Api;

class TemplateApiController extends ApiController
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

    public function listTemplates() {

        return response()->json('Hello from Template');

    }

    //
}
