<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewer_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('interviewer_id')->unsigned();
            $table->text("comment");
            $table->tinyInteger("rating")->nullable()->default(1);
            $table->foreign('interviewer_id')->references('id')->on('interviewers')->onUpdate('cascade');
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
        Schema::dropIfExists('interviewer_comments');
    }
}
