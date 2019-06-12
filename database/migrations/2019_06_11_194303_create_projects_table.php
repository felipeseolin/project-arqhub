<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('area');
            $table->integer('num_bedrooms');
            $table->integer('num_bathrooms');
            $table->integer('num_floors');
            $table->integer('num_parking');
            $table->integer('num_suites');
            $table->decimal('width');
            $table->decimal('length');
	        $table->unsignedBigInteger('user_id');
            $table->timestamps();
	
            $table->foreign('user_id')->references('id')->on('users');
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
