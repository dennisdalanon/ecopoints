<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     * @table merchants
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('merchant_name', 45);
            $table->string('logo', 45)->nullable();
            $table->string('physical_address_1', 45)->nullable();
            $table->string('physical_address_2', 45)->nullable();
            $table->string('physical_address_3', 45)->nullable();
            $table->string('physical_city', 45)->nullable();
            $table->string('physical_country', 45)->nullable();
            $table->string('physical_postcode', 45)->nullable();
            $table->string('postal_address_1', 45)->nullable();
            $table->string('postal_address_2', 45)->nullable();
            $table->string('postal_address_3', 45)->nullable();
            $table->string('postal_postcode', 45)->nullable();
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
       Schema::dropIfExists('merchants');
     }
}
