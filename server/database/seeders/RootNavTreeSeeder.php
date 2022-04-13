<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BackendNavTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  DB::table('pb_backend_navtree')->insert([		    
            'name' => 'Root',
            'alias' => 'root',
	    'parent' => 0,
	    'hidden' => 0
	  ]);

	   DB::table('pb_backend_navtree')->insert([		    
            'name' => 'Content',
            'alias' => 'content',
	    'parent' => 0,
	    'hidden' => 0
	   ]);

	   DB::table('pb_backend_navtree')->insert([
            'name' => 'Media',
            'alias' => 'media',
	    'parent' => 0,
	    'hidden' => 0
	  ]);

	   DB::table('pb_backend_navtree')->insert([		    
            'name' => 'Settings',
            'alias' => 'settings',
	    'parent' => 0,
	    'hidden' => 0
	   ]);

  	  DB::table('pb_backend_navtree')->insert([
            'name' => 'Developer',
            'alias' => 'developer',
	    'parent' => 0,
	    'hidden' => 0
	  ]);

	   DB::table('pb_backend_navtree')->insert([		    
            'name' => 'Member',
            'alias' => 'member',
	    'parent' => 0,
	    'hidden' => 0
	   ]);

    }
}
