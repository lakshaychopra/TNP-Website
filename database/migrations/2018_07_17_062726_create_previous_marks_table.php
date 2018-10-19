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
            $table->string('univ_roll_no')->unique();
            $table->string('board')->nullable();
            $table->string('institute')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('obtained_marks')->nullable();
            $table->string('max_marks')->nullable();
            $table->string('percentage')->nullable();
            $table->string('year_gap')->nullable();            
            $table->string('jee_rank')->nullable();
            $table->enum('education',['XII','DIPLOMA'])->nullable();
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
