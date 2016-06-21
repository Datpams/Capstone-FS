<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('markups', function (Blueprint $table) {
          $table->increments('id');
          $table->string('markup_name');
          $table->string('markup_desc');
          $table->string('markup_value');
          $table->string('markup_range');
          $table->timestamps();
      });

      DB:: table('markups')->insert(
        array(
          array(
            'markup_name' => "Valentine's Day Mark-up",
            'markup_desc' => 'Time of the year Where we buy a flower for a price of a jewel.',
            'markup_value' => '200',
            'markup_range' =>' 02/10/2016 - 02/15/2016'
          ),
          array(
            'markup_name' => 'Graduation Day Mark-up',
            'markup_desc' => 'March-April',
            'markup_value' => '100',
            'markup_range' =>' 03/22/2016 - 04/15/2016'
          ),
        )
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('markups');
    }
}
