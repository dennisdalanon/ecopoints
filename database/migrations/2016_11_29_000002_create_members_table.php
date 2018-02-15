<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     * @table members
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name', 128);
            $table->string('last_name', 128)->nullable();
            $table->string('nickname', 64)->nullable();
            $table->string('email_address', 128)->unique();
            $table->string('facebook', 64)->nullable();
            $table->string('twitter', 64)->nullable();
            $table->string('linkedin', 64)->nullable();
            $table->unsignedInteger('merchant_id')->nullable();
            $table->timestamps();
        });

        Schema::table('members', function ($table) {

            $table->foreign('merchant_id')
                ->references('id')->on('merchants')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('members');
     }
}
