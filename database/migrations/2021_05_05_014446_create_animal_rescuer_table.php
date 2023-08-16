<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalRescuerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('animal_rescuer', function (Blueprint $table) {
        $table->integer('animal_id')->unsigned();
        $table->foreign('animal_id')->references('id')->on('animals');
        $table->integer('rescuer_id')->unsigned();
        $table->foreign('rescuer_id')->references('id')->on('rescuers');
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
        Schema::dropIfExists('animal_rescuer');
    }
}
