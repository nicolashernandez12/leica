<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwarePlanStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_plan_studies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_software');
            $table->foreign('id_software')->references('id')->on('software')->onDelete('cascade');
            $table->unsignedBigInteger('id_study_plan');
            $table->foreign('id_study_plan')->references('id')->on('study_plans')->onDelete('cascade');
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
        Schema::dropIfExists('software_plan_studies');
    }
}
