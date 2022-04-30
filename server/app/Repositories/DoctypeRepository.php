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

    public function list() {
        $doctypes = Doctype::all();
        $doctypes_shim = $doctypes->makeHidden(['created_at', 'updated_at', 'fields', 'alias']);
        return $doctypes_shim;
    }

    public function create(Request $request)
    {
    }

    public function read($id)
    {
        
    }

    public function update()
    {
        
    }
    
    public function delete()
    {
    }
    
}
