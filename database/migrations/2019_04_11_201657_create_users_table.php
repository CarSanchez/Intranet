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
            $table->string('user', 20)->unique();
            $table->string('password');
            $table->integer('active')->default('1');
            $table->string('role')->default('inv');
            $table->string('position')->default('inv');
            $table->string('notes')->nullable();

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
