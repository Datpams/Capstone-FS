<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('suppliers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('supplier_compname')->unique();
          $table->string('supplier_add');
          $table->string('supplier_contact')->defualt("No contact number");
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
        //
    }
}
