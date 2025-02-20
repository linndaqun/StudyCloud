<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_contents', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['text', 'link']); //if you change this enum, make sure you also change options for it in the ResourceContent factory and validation for it in the relevant controllers
            $table->longText('content');
            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('resources');
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
        Schema::dropIfExists('resource_contents');
    }
}
