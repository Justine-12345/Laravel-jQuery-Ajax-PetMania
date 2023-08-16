<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRescuersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('rescuers', function (Blueprint $table) {
        $table->increments('id');
        $table->string('rescuer_fname', 64);
        $table->string('rescuer_lname', 64);
        $table->string('rescuer_age', 64);
        $table->string('rescuer_contact', 64);
        $table->string('rescuer_address', 64);
        $table->string('rescuer_picture', 64);
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
        Schema::dropIfExists('rescuers');
    }
}
