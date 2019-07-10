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
            $table->string('board_XII')->nullable();
            $table->string('institute_XII')->nullable();
            $table->string('month_XII')->nullable();
            $table->string('year_XII')->nullable();
            $table->string('obtained_marks_XII')->nullable();
            $table->string('max_marks_XII')->nullable();
            $table->string('percentage_XII')->nullable();
            $table->string('institute_Diploma')->nullable();
            $table->string('month_Diploma')->nullable();
            $table->string('year_Diploma')->nullable();
            $table->string('obtained_marks_Diploma')->nullable();
            $table->string('max_marks_Diploma')->nullable();
            $table->string('percentage_Diploma')->nullable();
            $table->string('year_gap')->nullable();            
            $table->string('jee_rank_XII')->nullable();
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
