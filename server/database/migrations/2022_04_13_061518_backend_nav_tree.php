<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('pb_backend_navtree', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
	    $table->string('alias');
	    $table->integer('parent');
	    $table->boolean('hidden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::Drop('pb_backend_navtree');
    }
};
