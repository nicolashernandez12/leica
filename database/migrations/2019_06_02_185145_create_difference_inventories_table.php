<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifferenceInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difference_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('difference');
            $table->unsignedBigInteger('id_inventory');
            $table->foreign('id_inventory')->references('id')->on('inventories')->onDelete('cascade');
            $table->unsignedBigInteger('id_inventory_process');
            $table->foreign('id_inventory_process')->references('id')->on('inventory_processes')->onDelete('cascade');
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
        Schema::dropIfExists('difference_inventories');
    }
}
