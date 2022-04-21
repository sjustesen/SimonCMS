<?php
namespace App\Repositories;

use App\Models\Template;
use App\Interfaces\IRepository;
use Illuminate\Http\Client\Request;
use TheSeer\DirectoryScanner\DirectoryScanner;

class TemplateRepository implements IRepository
{
    protected $template_dir = 'uploads/templates/';

    public function __construct()
    {
        
    }

    public function list($withfiles = false) {
        $path = base_path($this->template_dir);
        $iterator = new \RecursiveDirectoryIterator($path);

        $dirs = array();
        foreach ($iterator as $fileinfo) {
            if ($iterator->isDot()) continue;
            $dirs[] = $fileinfo->getFilename();
        
        return $dirs;
        }
    }

    public function showDirectoryContents() {
        $scanner = new \TheSeer\DirectoryScanner\DirectoryScanner;
        $scanner->addInclude('*.php');
        
        $filenames = [];
        foreach($scanner('.') as $content) {
            array_push($filenames, $content->getFileName());
        }
        return $filenames;
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
