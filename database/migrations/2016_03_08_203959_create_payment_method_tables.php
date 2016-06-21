<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('payment_methods', function (Blueprint $table) {
          $table->increments('id'); 
          $table->string('payment_name')->unique();
          $table->string('payment_desc');
          $table->timestamps();
      });

      DB::table('payment_methods')->insert(
        array(
          array(
            'payment_name' => 'COD',
            'payment_desc' => 'Cashon Delivery'
          ),
          array(
            'payment_name' => 'Online',
            'payment_desc' => 'Pay through PayPal, Credit card, and etc.'
          ),
          array(
            'payment_name' => 'Bank',
            'payment_desc' => 'Pay thorugh banks (e.g. BDO, CNB, PNB, LandBank)'
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
