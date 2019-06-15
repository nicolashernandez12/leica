<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maintenance_plan_name');
            $table->string('description');
            $table->unsignedBigInteger('id_frequency');
            $table->foreign('id_frequency')->references('id')->on('frequencies')->onDelete('cascade');
            $table->unsignedBigInteger('id_priority');
            $table->foreign('id_priority')->references('id')->on('priorities')->onDelete('cascade');
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
        Schema::dropIfExists('maintenance_plans');
    }
}
