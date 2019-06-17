<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantity');
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('id_active_input');
            $table->foreign('id_active_input')->references('id')->on('active_inputs')->onDelete('cascade');
            $table->unsignedBigInteger('id_state');
            $table->foreign('id_state')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('id_place');
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
        Schema::dropIfExists('inventories');
    }
}
