<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     * @table projects
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('project_name', 45);
            $table->string('project_skin', 45)->nullable();
            $table->binary('project_description')->nullable();
            $table->string('project_type', 45);
            $table->string('location', 45)->nullable();
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->string('image', 45)->nullable();
            $table->string('points_required', 45)->nullable();
            $table->dateTime('ideal_planting_date')->nullable();
            $table->dateTime('actual_planting_date')->nullable();
            $table->string('added_by', 45)->nullable();
            $table->unsignedInteger('recipient_id');
            $table->unsignedInteger('primary_contact')->nullable();
            $table->timestamps();


            $table->foreign('recipient_id')
                ->references('id')->on('recipients')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('primary_contact')
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
       Schema::dropIfExists('projects');
     }
}
