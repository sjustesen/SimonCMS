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
    	Schema::create('sc_backend_navtree', function (Blueprint $table) {
        $table->id()->autoIncrement();
        $table->string('name');
	    $table->string('alias');
        $table->string('path')->default('');
        $table->string('icon')->default('');
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
	    Schema::Drop('sc_backend_navtree');
    }
};
