<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivesByStudyPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives_by_study_plans', function (Blueprint $table) {
            $table->bigInteger('active_input_id')->unsigned()->nullable();
            $table->bigInteger('study_plan_id')->unsigned()->nullable();
            $table->foreign('active_input_id')->references('id')->on('active_inputs')
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
        Schema::dropIfExists('actives_by_study_plans');
    }
}
