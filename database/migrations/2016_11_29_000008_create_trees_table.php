<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     * @table trees
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tree_type', 45)->nullable();
            $table->string('location', 45)->nullable();
            $table->unsignedInteger('project_id');
            $table->dateTime('date_planted')->nullable();
            $table->integer('planted_by')->nullable();
            $table->string('supplier', 45)->nullable();
            $table->string('points_value', 45)->nullable();
            $table->timestamps();


            $table->foreign('project_id')
                ->references('id')->on('projects')
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
       Schema::dropIfExists('trees');
     }
}
