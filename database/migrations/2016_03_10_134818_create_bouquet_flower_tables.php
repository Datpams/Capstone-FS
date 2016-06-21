<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBouquetFlowerTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouquets_flowers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flower_id')->unsigned();
            $table->foreign('flower_id')->references('id')->on('flowers')->onDelete('cascade');;
            $table->integer('bouquet_id')->unsigned();
            $table->foreign('bouquet_id')->references('id')->on('bouquets')->onDelete('cascade');;
            $table->integer('quantity')->unsigned();
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
        Schema::drop('bouquets_flowers');
    }
}
