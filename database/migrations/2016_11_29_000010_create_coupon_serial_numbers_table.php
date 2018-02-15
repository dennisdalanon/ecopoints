<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponSerialNumbersTable extends Migration
{
    /**
     * Run the migrations.
     * @table coupon_serial_numbers
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_serial_numbers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('serial_number', 64);
            $table->unsignedBigInteger('allocated')->nullable();
            $table->timestamps();


            $table->foreign('allocated')
                ->references('id')->on('coupons')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('coupon_serial_numbers');
     }
}
