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
            $table->string('education');
            $table->string('jee_rank')->nullable();
            $table->string('XII_board')->nullable();
            $table->string('XII_institute')->nullable();
            $table->string('XII_year')->nullable();
            $table->string('XII_obtained_marks')->nullable();
            $table->string('XII_max_marks')->nullable();
            $table->string('XII_percentage')->nullable();
            $table->string('XII_previous_edu_certificate')->nullable();
            $table->string('diploma_board')->nullable();
            $table->string('diploma_institute')->nullable();
            $table->string('diploma_year')->nullable();
            $table->string('diploma_obtained_marks')->nullable();
            $table->string('diploma_max_marks')->nullable();
            $table->string('diploma_percentage')->nullable();         
            $table->string('diploma_previous_edu_certificate')->nullable();
            $table->string('year_gap')->nullable();   
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
