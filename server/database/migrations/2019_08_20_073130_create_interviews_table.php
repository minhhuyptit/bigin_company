<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('del_flag')->default(false);
            $table->boolean('status')->default(true);
            $table->float('evaluation')->unsigned()->nullable()->default(0);
            $table->integer('candidate_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->dateTime('date');
            $table->string('note')->nullable()->default('');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onUpdate('cascade');
            $table->foreign('position_id')->references('id')->on('configurations')->onUpdate('cascade');
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
        Schema::dropIfExists('interviews');
    }
}
