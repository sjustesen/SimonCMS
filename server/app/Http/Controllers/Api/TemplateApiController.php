<?php

namespace App\Http\Controllers\Api;

use App\Repositories\TemplateRepository;
use Illuminate\Http\Request;

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

    public function readTemplate(Request $request) {
        $template_files = $this->repository->read($request->file);
        return response()->json($template_files);

    }

    public function createTemplate(Request $request) {
        print_r($request->all);
    }

    //
}
