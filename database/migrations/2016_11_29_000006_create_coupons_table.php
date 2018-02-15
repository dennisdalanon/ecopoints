<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     * @table coupons
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('denomination', 12);
            $table->string('serial_number', 64);
            $table->unsignedInteger('merchant_id');
            $table->unsignedInteger('coupon_design_id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('member_id')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->dateTime('donated_on')->nullable();
            $table->timestamps();


            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('coupon_design_id')
                ->references('id')->on('coupon_designs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('transaction_id')
                ->references('id')->on('transactions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('member_id')
                ->references('id')->on('members')
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
       Schema::dropIfExists('coupons');
     }
}
