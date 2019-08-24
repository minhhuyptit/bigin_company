<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('del_flag')->default(false);
            $table->integer('interview_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->float('evaluation')->unsigned()->nullable()->default(0);
            $table->foreign('interview_id')->references('id')->on('interviews')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade');
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
        Schema::dropIfExists('interviewers');
    }
}
