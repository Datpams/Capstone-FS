<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtheritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_desc');
            $table->string('item_image')->default("default-image.jpg");
            $table->decimal('price', 8,2);
            $table->integer('itype_id')->unsigned();
            $table->foreign('itype_id')->references('id')->on('itypes')->onDelete('cascade');;
            $table->timestamps();
        });

        DB::table('other_items')->insert(
            array(
                array(
                    'item_name' => 'Bear',
                    'item_desc' => 'Life-sized Blue bear',
                    'item_image' => 'bea24.jpg',
                    'price' => '130',
                    'itype_id' => '3'
                ),
                array(
                    'item_name' => 'Toblerone Bundles',
                    'item_desc' => '6 pcs of Toblerone stick.',
                    'item_image' => 'cho44.jpg',
                    'price' => '500',
                    'itype_id' => '3'
                ),
                array(
                    'item_name' => 'Perfume',
                    'item_desc' => 'Rose Scented Perfume',
                    'item_image' => 'per8.jpg',
                    'price' => '120',
                    'itype_id' => '3'
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
        Schema::drop('other_items');
    }
}
