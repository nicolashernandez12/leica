<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_person');
            $table->string('last_name_person');
            $table->string('rut');
            $table->unsignedBigInteger('id_position');
            $table->foreign('id_position')->references('id')->on('positions')->onDelete('cascade');
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
        Schema::dropIfExists('liables');
    }
}
