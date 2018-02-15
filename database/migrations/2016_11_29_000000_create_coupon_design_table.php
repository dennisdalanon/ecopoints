<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponDesignTable extends Migration
{
    /**
     * Run the migrations.
     * @table coupon_design
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_designs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('design_name', 45);
            $table->string('file_name', 45);
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
       Schema::dropIfExists('coupon_designs');
     }
}
