<?php

namespace App\Http\Controllers;

use App\Model\Doctype;

class ApiController extends Controller
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

    // Create methods

    public function createContent() {

    }

    // doctype endpoints 
    public function showAllDoctypes() {
        return response()->json('Hello World');
    }

    public function createDoctype(Request $request) {
        $doctype = Doctype::create($request->all());
        return response()->json($doctype, 201);
    }

    public function showDoctype($id) {
        return response()->json(Doctype::find($id));
    }

    public function updateDoctype($id, Request $request) {
        $doctype = Doctype::findOrFail($id);
        $doctype->update($request->all());

        return response()->json($doctype, 200);
    }

    public function deleteDoctype($id) {
        Doctype::findOrFail($id)->delete();
        return response()->json($doctype, 200);
    }

    //
}
