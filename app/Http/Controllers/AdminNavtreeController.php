<?php

namespace App\Http\Controllers;

class AdminNavtreeController extends Controller
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
}
