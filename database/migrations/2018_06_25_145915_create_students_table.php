<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('univ_roll_no')->unique();
            $table->string('class_roll_no')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('batch')->comment('Year of Addmission and Year of Passout')->nullable();
            $table->enum('branch_type',['B.Tech.', 'M.B.A.', 'M.C.A.', 'M.Tech.'])->nullable();
            $table->string('stream')->comment('Stream/Course type')->nullable();
            $table->enum('training_sem',['7','8'])->nullable();
            $table->enum('shift',['MORNING', 'EVENING'])->nullable();
            $table->string('section')->comment('Class Section')->nullable();
            $table->enum('gender',['MALE', 'FEMALE'])->nullable();
            $table->enum('category',['OBC', 'SC', 'ST', 'GEN'])->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('height')->comment('in cm')->nullable();
            $table->integer('weight')->comment('in kg')->nullable();
            $table->string('father_name')->nullable();
            $table->integer('father_phone_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->integer('mother_phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->integer('pincode')->nullable();
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
        Schema::dropIfExists('students');
    }
}
