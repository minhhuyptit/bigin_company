<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->integer('candidate_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onUpdate('cascade');
            $table->foreign('contact_id')->references('id')->on('configurations')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_contacts');
    }
}
