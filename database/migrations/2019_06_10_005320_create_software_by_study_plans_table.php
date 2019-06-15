<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareByStudyPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_by_study_plans', function (Blueprint $table) {
            $table->bigInteger('software_id')->unsigned()->nullable();
            $table->bigInteger('study_plan_id')->unsigned()->nullable();
            $table->foreign('software_id')->references('id')->on('software')
                ->onDelete('cascade');
            $table->foreign('study_plan_id')->references('id')->on('study_plans')
                ->onDelete('cascade');
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
        Schema::dropIfExists('software_by_study_plans');
    }
}
