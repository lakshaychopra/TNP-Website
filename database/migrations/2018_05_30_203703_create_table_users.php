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
            $table->enum('type', ['STUDENT', 'COMPANY', 'EXECUTIVE_MEMBER', 'MASTER_ADMIN'])->default('STUDENT');
            $table->string('provider_unique_id')->nullable();
            $table->string('activation_token',64)->nullable();
            $table->string('status',25)->nullable();
            $table->enum('form_status',['N.A.','NONE','PENDING','RECIEVED','SUBMITTED','REJECTED'])->default('NONE');
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
