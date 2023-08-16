<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalDiseaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('animal_disease', function (Blueprint $table) {
        $table->integer('animal_id')->unsigned();
        $table->foreign('animal_id')->references('id')->on('animals');
        $table->integer('disease_id')->unsigned();
        $table->foreign('disease_id')->references('id')->on('diseases');
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
        Schema::dropIfExists('animal_disease');
    }
}
