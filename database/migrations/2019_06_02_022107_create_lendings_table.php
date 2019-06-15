<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lendings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_liable');
            $table->foreign('id_liable')->references('id')->on('liables')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('loan_date');
            $table->datetime('supposed_return_date');
            $table->datetime('real_return_date')->nullable();
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
        Schema::dropIfExists('lendings');
    }
}
