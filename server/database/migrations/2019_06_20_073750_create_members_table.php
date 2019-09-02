<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('del_flag')->default(false);
            $table->tinyInteger('status')->default(0);
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('fullname');
            $table->boolean('is_male')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('picture')->nullable()->default('avatar_default.jpg');
            $table->integer('role')->unsigned();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();
            $table->foreign('role')->references('id')->on('roles')->onUpdate('cascade');
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
        Schema::dropIfExists('members');
    }
}
