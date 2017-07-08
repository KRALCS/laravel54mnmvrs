<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVechiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vechiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate', '10')->unique();
            $table->string('nickname', '100');
            $table->integer('brands_id')->unsigned();
            $table->integer('models_id')->unsigned();
            $table->integer('modelyear');
            $table->integer('vtypes_id')->unsigned();
            $table->integer('colors_id')->unsigned();
            $table->tinyInteger('status');
            $table->integer('users_id')->unsigned();
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
        Schema::dropIfExists('vechiles');
    }
}
