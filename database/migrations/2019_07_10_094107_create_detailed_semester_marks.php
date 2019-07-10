<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailedSemesterMarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailed_semester_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('univ_roll_no')->unique();

            $table->string('obtained_marks_1')->nullable();
            $table->string('credits_1')->nullable();
            $table->string('active_backlog_1')->nullable();
            $table->string('passive_backlog_1')->nullable();

            $table->string('obtained_marks_2')->nullable();
            $table->string('credits_2')->nullable();
            $table->string('active_backlog_2')->nullable();
            $table->string('passive_backlog_2')->nullable();

            $table->string('obtained_marks_3')->nullable();
            $table->string('credits_3')->nullable();
            $table->string('active_backlog_3')->nullable();
            $table->string('passive_backlog_3')->nullable();

            $table->string('obtained_marks_4')->nullable();
            $table->string('credits_4')->nullable();
            $table->string('active_backlog_4')->nullable();
            $table->string('passive_backlog_4')->nullable();

            $table->string('obtained_marks_5')->nullable();
            $table->string('credits_5')->nullable();
            $table->string('active_backlog_5')->nullable();
            $table->string('passive_backlog_5')->nullable();

            $table->string('obtained_marks_6')->nullable();
            $table->string('credits_6')->nullable();
            $table->string('active_backlog_6')->nullable();
            $table->string('passive_backlog_6')->nullable();

            $table->string('obtained_marks_7')->nullable();
            $table->string('credits_7')->nullable();
            $table->string('active_backlog_7')->nullable();
            $table->string('passive_backlog_7')->nullable();

            $table->string('obtained_marks_8')->nullable();
            $table->string('credits_8')->nullable();
            $table->string('active_backlog_8')->nullable();
            $table->string('passive_backlog_8')->nullable();

            $table->string('obtained_marks_aggregate')->nullable();
            $table->string('sgpa_aggregate')->nullable();
            $table->string('percentage_aggregate')->nullable();

            $table->string('credits_aggregate')->nullable();
            $table->string('active_backlog_aggregate')->nullable();
            $table->string('passive_backlog_aggregate')->nullable();
            
            $table->string('semester_status')->nullable();
            $table->string('verify_status')->nullable();
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
        //
    }
}
