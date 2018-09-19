<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escorts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->integer('state_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('passport');
            $table->date('birthday');
            $table->string('gender');
            $table->string('country');
            $table->string('state');
            $table->string('nationality');
            $table->integer('height');
            $table->string('eye_color');
            $table->string('hair_color');
            $table->integer('weight');
            $table->string('breast');
            $table->string('waist');
            $table->string('hip');
            $table->text('service');
            $table->string('phone');
            $table->text('description');
            $table->integer('status');
            $table->longText('photo_1')->nullable();

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
        Schema::dropIfExists('escorts');
    }
}
