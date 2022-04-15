<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\DocumentNode;

class BackendContentTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pb_nodes')->delete();

    
        DB::table('pb_nodes')->insert([		    
            'name' => 'Root Node',
            'uuid' => '',
            'alias' => 'root',
            'doctype' => 1000,
	        'created_at' => null,
            'parent_id' => 0,
            'updated_at' => null,
            'hidden' => 0,
            'softdeleted' => 0,
            'sorting' => 0
	  ]);

        // Loop through each user above and create the record for them in the database
       
    }
}
