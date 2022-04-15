<?php

namespace App\Http\Controllers;

use App\Models\Doctype;
use App\Models\BackendNavtree;
use App\Repositories\BackendNavigationRepository;
use App\Providers\AppServiceProvider;

class BackendNavtreeController extends Controller
{
    /**
     * The admin navtree controller.
     * This will be static in the first versions,
     * But will eventually allow you to attach your own nodes ^SJ
     *
     * All class methods in here should json_encode output
     */

    protected $navtree; 
    

    public function __construct(BackendNavigationRepository $navtree)
    {
        $this->navtree = $navtree;
    }

    public function content() {

        // this will obviously be fetched from the database;
        // once doctypes and pages have been set up and connected
        $res = $this->navtree->get('content', true);
        return json_encode($res);
    }

    public function media() {
        $res = $this->navtree->get('media', true);
        return json_encode($res);
        
    }

    public function settings() {
        $res = $this->navtree->get('settings', true);
        return json_encode($res);
    }
}
