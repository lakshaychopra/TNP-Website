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
        Schema::create('users', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('username');
            $collection->string('password');
            $collection->enum('type', ['STUDENT', 'COMPANY', 'EXECUTIVE_MEMBER', 'MASTER_ADMIN'])->default('STUDENT');
            $collection->boolean('is_active')->default(false);
            $collection->boolean('is_verified')->default(false);
            $collection->rememberToken();
            $collection->timestamps();
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
