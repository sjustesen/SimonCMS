<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api;
use App\Models\Doctype;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Str;

class DoctypeApiController extends ApiController
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

    public function showDoctype($id) {
        return response()->json(Doctype::find($id));
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
