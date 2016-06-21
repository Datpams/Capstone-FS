<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowerTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('flower_ftag', function (Blueprint $table) {
            $table->integer('flower_id')->unsigned()->index();
            $table->foreign('flower_id')->references('id')->on('flowers')->onDelete('cascade');

            $table->integer('ftag_id')->unsigned()->index();
            $table->foreign('ftag_id')->references('id')->on('ftags')->onDelete('cascade');
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
        Schema::drop('ftags');
        Schema::drop('flower_ftag');
    }
}
