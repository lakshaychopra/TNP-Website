<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_education', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aadhaar_no')->nullable();
            $table->string('board')->nullable();
            $table->string('month')->nullable();
            $table->integer('year')->nullable();
            $table->integer('obtained_marks')->nullable();
            $table->integer('max_marks')->nullable();
            $table->string('institute')->nullable();
            $table->string('year_gap')->nullable();            
            $table->string('jee_rank')->nullable();
            $table->enum('education',['X','XII','DIPLOMA']);
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
        Schema::dropIfExists('previous_education');
    }
}
