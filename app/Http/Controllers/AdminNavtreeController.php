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
        $idea = new \StdClass();
        $idea->title = 'First item';
        return json_encode($idea);
    }
}
