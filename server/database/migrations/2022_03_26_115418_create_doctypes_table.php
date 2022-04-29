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
        Schema::create('sc_doctypes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('parent_id')->default(0);
            $table->string('uuid');
            $table->string('name');
            $table->string('alias');
            $table->mediumtext('fields');
            $table->integer('template_id')->default(0);
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctypes');
    }
};
