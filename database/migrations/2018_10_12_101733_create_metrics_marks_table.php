<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics_education', function (Blueprint $table) {
            $table->increments('id');
            $table->string('univ_roll_no')->unique();
            $table->string('board')->nullable();
            $table->string('institute')->nullable();
            $table->string('month')->nullable();
            $table->integer('year')->nullable();
            $table->integer('obtained_marks')->nullable();
            $table->integer('max_marks')->nullable();
            $table->enum('marks_type',['CGPA','PERCENTAGE'])->nullable();
            $table->integer('percentage')->nullable();
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
        Schema::dropIfExists('metrics_education');
    }
}
