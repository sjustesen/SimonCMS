<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackendContentTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nodes')->delete();

        $nodes = array(
            [
             'name' => 'Root Node', 
             'alias' => 'root', 
             'doctype' => 1000, 
             'created_at' => datetime::now(),
             'parent_id' => 0,
             'updated_at' => null,
             'hidden' => 0,
             'softdeleted => 0'
            ]
        );

        // Loop through each user above and create the record for them in the database
        foreach ($nodes as $node) {
            DocumentNode::create($node);
        }
    }
}
