<?php
namespace App\Repositories;

use App\Models\Template;
use App\Interfaces\IRepository;
use Illuminate\Http\Client\Request;
use App\Logic\Filesystem\FilesAndDirectories;
use App\Logic\Filesystem\ListFilter;

class TemplateRepository implements IRepository
{
    protected $template_dir;

    public function __construct()
    {
        $this->template_dir = base_path('uploads/templates');
    }

    
    public function list(ListFilter $filter = ListFilter::FilesAndDirectories) {
        //$dir = Directory::getContentsRecursive($this->template_dir, 4, $filter=$filter);
        $dir = FilesAndDirectories::getFilesRecursive($this->template_dir);
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

    public function read($file)
    {
        $template = file_get_contents(base_path($file));
        return $template;
    }

    public function update()
    {
        
    }
    
    public function delete()
    {
    }
    
}
