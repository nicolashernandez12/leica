<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_software', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_software');
            $table->foreign('id_software')->references('id')->on('software')->onDelete('cascade');
            $table->unsignedBigInteger('id_place')->unique();
            $table->foreign('id_place')->references('id')->on('places')->onDelete('cascade');
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
        Schema::dropIfExists('place_software');
    }
}
