<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('study_plan_name');
            $table->unsignedBigInteger('id_career');
            $table->foreign('id_career')->references('id')->on('careers')->onDelete('cascade');
            $table->date('date_start');
            $table->date('date_end');
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
        Schema::dropIfExists('study_plans');
    }
}
