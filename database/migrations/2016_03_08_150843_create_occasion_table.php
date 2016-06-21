<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccasionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('occasions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('occasionname');
          $table->string('occasiondesc');
          $table->string('oimage')->default("default-image.jpg");
          $table->timestamps();
      });

      DB::table('occasions')->insert(
        array(
          array(
            'occasionname' => 'Wedding',
            'occasiondesc' => 'Enjoy your Reception with full of flowers around you. Spread the Love',
            'oimage' => 'rec9.jpg'
          ),
          array(
            'occasionname' => 'Funeral',
            'occasiondesc' => 'A peaceful farewell for your love ones with an enviroment full of love.',
            'oimage' => 'sym5.jpg'
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
        //
    }
}
