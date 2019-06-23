<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('del_flag')->default(false);
            $table->string('name', 100);
            $table->integer('repeat_type')->unsigned();
            $table->string('repeat_on_day', 10);
            $table->boolean('status')->default(true);
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->foreign('repeat_type')->references('id')->on('configurations')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
