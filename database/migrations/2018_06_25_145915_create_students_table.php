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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob');
            $table->string('batch')->comment('Year of Addmission and Year of Passout')->nullable();
            $table->string('branch_type')->nullable();
            $table->string('stream')->comment('Stream/Course type')->nullable();
            $table->string('section')->comment('Class Section')->nullable();
            $table->string('shift')->nullable();
            $table->string('training_semester')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('category')->nullable();
            $table->string('height')->comment('in cm')->nullable();
            $table->string('weight')->comment('in kg')->nullable();
            $table->string('living')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('farming_background')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('mail_id')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode')->nullable();
            $table->string('whatsapp_cont')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('graduation')->nullable();
            $table->string('spec_mba')->nullable();
            $table->string('spec_mtech')->nullable();
            $table->string('specialization')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('marks_type')->nullable();
            $table->string('CGPA')->nullable();
            $table->string('percentage')->nullable();
            $table->string('Graduation_certificate')->nullable();
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
