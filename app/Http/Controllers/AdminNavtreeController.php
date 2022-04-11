<?php

namespace App\Http\Controllers;

class AdminNavtreeController extends Controller
{
    /**
     * The admin navtree controller.
     * This will be static in the first versions,
     * But will eventually allow you to attach your own nodes ^SJ
     *
     * All class methods in here should json_encode output
     */
    public function __construct()
    {
        //
    }

    public function content() {
        // this will obviously be fetched from the database;
        // once doctypes and pages have been set up and connected

        $menu_array = [];
        $item_one = new \StdClass();
        $item_one->title = 'Go to frontpage';
        $item_one->icon = '';
        $item_one->href='/admin';

        $item_two = new \StdClass();
        $item_two->title = 'Visit media';
        $item_two->icon = '';
        $item_two->href='/admin/media';

        $item_three = new \StdClass();
        $item_three->title = 'Settings';
        $item_three->icon = '';
        $item_three->href = '/admin/settings';

        array_push($menu_array, $item_one, $item_two, $item_three);
        
        return json_encode($menu_array);
    }

    public function media() {
        $menu_array = [];
        $item_one = new \StdClass();
        $item_one->title = 'This tree should';
        $item_one->icon = '';
        $item_one->href='/admin';

        $item_two = new \StdClass();
        $item_two->title = 'Display';
        $item_two->icon = '';
        $item_two->href='/admin/media';

        $item_three = new \StdClass();
        $item_three->title = 'Medianodes';
        $item_three->icon = '';
        $item_three->href = '/admin/settings';

        array_push($menu_array, $item_one, $item_two, $item_three);
        
        return json_encode($menu_array);
    }

    public function settings() {
        $menu_array = [];
        $item_one = new \StdClass();
        $item_one->title = 'Document Types';
        $item_one->icon = '';
        $item_one->href='/admin/settings/doctypes';

        $item_two = new \StdClass();
        $item_two->title = 'Display';
        $item_two->icon = '';
        $item_two->href='/admin/media';

        $item_three = new \StdClass();
        $item_three->title = 'Medianodes';
        $item_three->icon = '';
        $item_three->href = '/admin/settings';

        array_push($menu_array, $item_one, $item_two, $item_three);
        
        return json_encode($menu_array);
    }
}
