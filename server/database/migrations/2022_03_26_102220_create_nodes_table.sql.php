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
        Schema::create('pb_nodes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->uuid('uuid');
            $table->integer('parent_id');
            $table->string('name');
            $table->string('alias');
            $table->integer('doctype');
            $table->timestamps();
            $table->boolean('hidden');
            $table->integer('sorting');
            $table->boolean('softdeleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pb_nodes');
    }
};
