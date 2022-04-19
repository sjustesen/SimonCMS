<?php
namespace App\Repositories;

use App\Models\Template;
use App\Interfaces\IRepository;
use Illuminate\Http\Client\Request;

class TemplateRepository implements IRepository
{
    public function __construct()
    {
    }

    public function create(Request $request)
    {
        $incoming_data = $request->all();
        print_r($incoming_data);
        $template = new Template();
        $template->save();
    }

    public function read($templateId = null)
    {
        $template = Template::find($templateId);
        return $template;
    }

    public function update()
    {
        
    }
    
    public function delete()
    {
    }
    
}
