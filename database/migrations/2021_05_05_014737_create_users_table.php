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
        $table->id();
        //$table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');

        $table->string('user_fname');
        $table->string('user_lname');
        $table->string('user_age');
        $table->string('user_contact');
        $table->string('user_address');
        $table->string('user_picture');
        $table->string('user_gender');
        $table->integer('job_id')->unsigned();
        $table->foreign('job_id')->references('id')->on('jobs');
        $table->rememberToken();
        $table->timestamps();
        $table->softDeletes();
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
