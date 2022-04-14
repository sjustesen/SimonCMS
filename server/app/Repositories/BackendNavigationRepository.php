<?php 

namespace App\Repositories;

use App\Models\BackendNavtree;

class BackendNavigationRepository {
    public function __construct() {

    }


    private function resolve_nav_id(string $section) : int {
        switch($section) {
            case 'root':
                return 1;
            break;
            case 'content':
                return 2;
            break;
            case 'media':
                return 3;
            break;
            case 'settings':
                return 4;
            break;
            case 'developer':
                return 5;
            break;
            default:
                break;
        }
    }

    public function get(string $section) {
        $id = $this->resolve_nav_id($section);
        $root_nav = BackendNavtree::where('id', $id)
               ->orderBy('name')
               ->get();

        return $root_nav;
    }
}