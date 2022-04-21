<?php
namespace App\Repositories;

use App\Models\Template;
use App\Interfaces\IRepository;
use App\Logic\Filesystem\DirectoryTraversal;
use Illuminate\Http\Client\Request;
use \App\Logic\FileSystem;

class TemplateRepository implements IRepository
{
    protected $template_dir;

    public function __construct()
    {
        $this->template_dir = base_path('uploads/templates');
    }

    public function list($withfiles = false) {
        $dir = DirectoryTraversal::getRecursiveIterator($this->template_dir);
        return $dir;
    }

    public function create(Request $request)
    {
        // make a db entry 
        // make the corresponding file in the filesystem.
        // figure out a way to sync.
        
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
