<?php
namespace App\Repositories;

use App\Models\Doctype;
use App\Interfaces\IRepository;
use Illuminate\Http\Client\Request;

class DoctypeRepository implements IRepository
{
    public function __construct()
    {
    }

    public function loadTabs() {

    }

    public function loadContentTabs() {
        
    }

    public function create(Request $request)
    {
        $model = new Doctype();
        $model->save(); 
    }

    // -------------- DOCTYPES ----- //

    public function list() {
        $doctypes = Doctype::all();
        $doctypes_shim = $doctypes->makeHidden(['created_at', 'updated_at', 'fields', 'alias']);
        return $doctypes_shim;
    }

    public function save(Request $request)
    {
        $doctype = new Doctype();
        $doctype->save($request->doctype);
    }

    public function read($id)
    {
        $doctype = Doctype::where('uuid', $id)->first();
        return $doctype;
    }

    public function update()
    {
        
    }
    
    public function delete()
    {
    }
    
}
