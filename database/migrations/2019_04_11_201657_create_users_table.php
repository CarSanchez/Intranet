<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();

            $table->string('name');
            $table->string('lastName');
            $table->date('date')->nullable();
            $table->string('route_img')->nullable();
            $table->string('email', 100)->unique();
            $table->integer('ext')->unique();
            $table->string('user', 20)->unique();
            $table->string('password');
            $table->boolean('active')->default(true);
            //$table->string('role')->default('user');
            $table->string('notes')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->integer('count_login')->default(0);
            $table->string('ip_register');

            $table->rememberToken();
            $table->timestamps();
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
}
