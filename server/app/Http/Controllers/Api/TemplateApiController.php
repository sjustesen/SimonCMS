<?php

namespace App\Http\Controllers\Api;

use App\Modules\Repository;
use App\Repositories\TemplateRepository;
use Illuminate\Http\Client\Request;

class TemplateApiController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $repository; 

    public function __construct(TemplateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listTemplates() {
        $template_files = $this->repository->list();
        return response()->json($template_files);
    }

    public function createTemplate(Request $request) {
        print_r($request->all);
    }

    //
}
