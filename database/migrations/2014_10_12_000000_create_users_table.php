<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name',100);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->date('dob');
            $table->string('designation',191);
            $table->string('gender',50);
            $table->string('profile_picture',191);
            $table->string('country',191);
            $table->string('fav_color',191);
            $table->string('fav_actor',191);

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
