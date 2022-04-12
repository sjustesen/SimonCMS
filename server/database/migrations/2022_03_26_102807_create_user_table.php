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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('usertype');
            $table->string('name');
            $table->string('password_hash');
            $table->string('email');
            $table->timestamp('added_at');
            $table->time('last_login');
            $table->integer('password_attempts');
            $table->ipAddress('ipaddress');
            $table->boolean('account_locked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
