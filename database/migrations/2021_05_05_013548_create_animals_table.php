<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
        $table->increments('id');
        $table->string('animal_name', 64);
        $table->string('animal_gender', 64);
        $table->string('animal_age', 64);
        $table->string('animal_breed', 64);
        $table->string('animal_health', 255);
        $table->string('animal_picture', 255);
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('animal');
    }
}
