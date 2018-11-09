<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('token_2fa')->nullable();
            $table->enum('type', ['STUDENT', 'COMPANY', 'EXECUTIVE_MEMBER', 'ADMIN'])->default('STUDENT');
            $table->string('provider_unique_id')->nullable();
            $table->enum('status',['ENABLED','DISABLED'])->default('ENABLED');
            $table->enum('form_status',['N.A.','PENDING','SUBMITTED','VERIFIED'])->default('N.A.');
            $table->enum('student_form_step',['N.A.','TC','PROFILE', 'METRICS_EDUCATION', 'PREVIOUS_EDUCATION','DEGREE','AGGREGATE','SUBMITTED'])->default('N.A.');
            $table->boolean('is_mailed')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_first_login')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
