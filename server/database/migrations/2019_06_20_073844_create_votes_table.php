<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
