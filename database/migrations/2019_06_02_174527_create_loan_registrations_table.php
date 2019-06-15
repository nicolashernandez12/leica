<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_inventory');
            $table->foreign('id_inventory')->references('id')->on('inventories')->onDelete('cascade');
            $table->unsignedBigInteger('id_lending');
            $table->foreign('id_lending')->references('id')->on('lendings')->onDelete('cascade');
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
        Schema::dropIfExists('loan_registrations');
    }
}
