<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_execution');
            $table->unsignedBigInteger('id_type_inventory');
            $table->foreign('id_type_inventory')->references('id')->on('type_inventories')->onDelete('cascade');
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
        Schema::dropIfExists('inventory_processes');
    }
}
