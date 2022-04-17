<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingsMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  DB::table('sc_backend_navtree')->insert([		    
            'name' => 'Document Types',
            'alias' => 'doctypes',
	    'parent' => 4,
	    'hidden' => 0
	  ]);

	   DB::table('sc_backend_navtree')->insert([		    
            'name' => 'Media Types',
            'alias' => 'mediatypes',
	    'parent' => 4,
	    'hidden' => 0
	   ]);

 	   DB::table('sc_backend_navtree')->insert([
            'name' => 'Backend Datatypes',
            'alias' => 'datatypes',
	    'parent' => 4,
	    'hidden' => 0
	  ]);


	   DB::table('sc_backend_navtree')->insert([
            'name' => 'Templates',
            'alias' => 'templates',
	    'parent' => 4,
	    'hidden' => 0
	  ]);

	   DB::table('sc_backend_navtree')->insert([		    
            'name' => 'Macros',
            'alias' => 'macros',
	    'parent' => 4,
	    'hidden' => 0
	   ]);

  	  DB::table('sc_backend_navtree')->insert([
            'name' => 'Translations',
            'alias' => 'translations',
	    'parent' => 4,
	    'hidden' => 0
	  ]);

	   DB::table('sc_backend_navtree')->insert([		    
            'name' => 'Domains',
            'alias' => 'domains',
	    'parent' => 4,
	    'hidden' => 0
	   ]);
    }
}
