<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('candidate_id')->unsigned();
            $table->integer('skill_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onUpdate('cascade');
            $table->foreign('skill_id')->references('id')->on('configurations')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_skills');
    }
}
