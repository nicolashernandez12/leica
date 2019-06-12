<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentPlanStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_plan_studies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_study_plan');
            $table->foreign('id_study_plan')->references('id')->on('study_plans')->onDelete('cascade');
            $table->unsignedBigInteger('id_active_input');
            $table->foreign('id_active_input')->references('id')->on('active_inputs')->onDelete('cascade');
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
        Schema::dropIfExists('equipment_plan_studies');
    }
}
