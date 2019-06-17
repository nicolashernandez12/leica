<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_name');
            $table->string('uf_value');
            $table->string('characteristic')->nullable();
            $table->string('observation')->nullable();
            $table->string('description')->nullable();
            $table->string('serial_number');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('id_model');
            $table->foreign('id_model')->references('id')->on('modelos')->onDelete('cascade');
            $table->unsignedBigInteger('id_maintenance_plan');
            $table->foreign('id_maintenance_plan')->references('id')->on('maintenance_plans')->onDelete('cascade');
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
        Schema::dropIfExists('active_inputs');
    }
}
