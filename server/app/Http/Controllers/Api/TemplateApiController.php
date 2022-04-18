<?php

namespace App\Http\Controllers\Api;

use App\Modules\Repository;
use App\Repositories\TemplateRepository;

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
        $repotrash = $this->repository->read();
        return response()->json($repotrash);

    }

    //
}
