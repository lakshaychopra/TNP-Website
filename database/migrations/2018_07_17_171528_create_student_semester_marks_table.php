<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSemesterMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('univ_roll_no')->unique();
            $table->string('semester')->nullable();
            $table->string('obtained_marks')->nullable();
            $table->string('max_marks')->nullable();
            $table->string('credits')->nullable();
            $table->string('active_backlog')->nullable();
            $table->string('passive_backlog')->nullable();
            $table->enum('marks_type',['CGPA','PERCENTAGE'])->default('CGPA');
            $table->string('percentage')->nullable();
            $table->string('semester_status')->nullable();
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
        Schema::dropIfExists('semester_marks');
    }
}
