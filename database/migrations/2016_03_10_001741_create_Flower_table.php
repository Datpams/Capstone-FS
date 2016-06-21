<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc');
            $table->decimal('price', 8,2);
            $table->string('fimage')->default("default-image.jpg");
            $table->timestamps();
        });

        DB::table('flowers')->insert(
            array(
                array(
                    'name' => 'Mums',
                    'desc' => 'Malaysian',
                    'price' => '50',
                    'fimage' => 'mum.jpg'
                ),
                array(
                    'name' => 'Pink Carnation',
                    'desc' => 'Pink',
                    'price' => '20',
                    'fimage' => 'carnation.jpg'
                ),
                array(
                    'name' => 'Red Rose',
                    'desc' => 'Red',
                    'price' => '30',
                    'fimage' => 'rose.jpg'
                ),
                array(
                    'name' => 'Chrysanthemum',
                    'desc' => 'Orange',
                    'price' => '40',
                    'fimage' => 'chrysanthemum.jpg'
                ),
                array(
                    'name' => 'Red Carnation',
                    'desc' => 'Red',
                    'price' => '50',
                    'fimage' => 'carnationn.jpg'
                ),
                array(
                    'name' => 'Sun flower',
                    'desc' => 'Sunny',
                    'price' => '100',
                    'fimage' => 'Sunflower.jpg'
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
        Schema::drop('flowers');
    }
}
