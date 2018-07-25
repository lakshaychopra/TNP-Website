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
            $table->integer('semester')->nullable();
            $table->integer('marks_obtained')->nullable();
            $table->integer('sgpa')->nullable();
            $table->integer('credits')->nullable();
            $table->integer('active_backlog')->nullable();
            $table->integer('passive_backlog')->nullable();
            $table->string('stream')->comment('Stream/Course type')->nullable();
            $table->enum('marks_type',['SGPA','MARKS'])->default('SGPA');
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
