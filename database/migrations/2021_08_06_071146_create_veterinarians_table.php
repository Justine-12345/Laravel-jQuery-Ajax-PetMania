<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinarians', function (Blueprint $table) {
        $table->increments('id');
        $table->string('veterinarian_fname');
        $table->string('veterinarian_lname');
        $table->string('veterinarian_age');
        $table->string('veterinarian_contact');
        $table->string('veterinarian_address');
        $table->string('veterinarian_gender');
        $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('veterinarians');
    }
}
