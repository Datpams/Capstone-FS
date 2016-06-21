<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('pieces');
            $table->decimal('price', 8,2);
            $table->date('expiration');
            $table->string('fimage')->default("default-image.jpg");
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
        Schema::drop('inventories');
    }
}
