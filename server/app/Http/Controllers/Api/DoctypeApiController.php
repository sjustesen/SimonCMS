<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api;
use App\Models\Doctype;
use App\Repositories\DoctypeRepository;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Str;

class DoctypeApiController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected DoctypeRepository $doctypeRepository;

    public function __construct(DoctypeRepository $repo)
    {
        $this->doctypeRepository = $repo;
    }

    // doctype endpoints 
    public function showAllDoctypes() {
        return response()->json('Hello from Doctype');
    }

    public function createDoctype(Request $request) {
        $doctype = new Doctype();
        $doctype->name = $request->name;
        $doctype->uuid = Str::uuid()->toString();
        $doctype->alias = $request->alias; 
        $doctype->fields = json_encode($request->fields);
        
        $doctype->save();

        return response()->json($doctype, 200);
    }

    public function showDoctype(Request $request) {
        $model = $this->doctypeRepository->read($request->id);
        return response()->json($model);
    }

    public function listDoctypes() {
        return $this->doctypeRepository->list();
    }

    public function loadDoctype(Request $request) {
        $doctype = Doctype::findOrFail($request->id);
        
        if ($doctype != null)
        return response()->json($doctype, 200);
    }

    public function updateDoctype($id, Request $request) {
        $doctype = Doctype::findOrFail($id);
        $doctype->update($request->all());

        return response()->json($doctype, 200);
    }

    public function deleteDoctype($id) {
        Doctype::findOrFail($id)->delete();
        return response()->json($id, 200);
    }

    //
}
