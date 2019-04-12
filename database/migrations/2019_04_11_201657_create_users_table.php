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
            $table->increments('id')->unique()->autoIncrement();

            $table->string('name');
            $table->string('lastName');
            $table->date('date');
            $table->string('route_img');
            $table->string('email', 100)->unique();
            $table->string('user', 20)->unique();
            $table->string('password');
            $table->integer('role');
            $table->integer('active');
            $table->string('notes');

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
