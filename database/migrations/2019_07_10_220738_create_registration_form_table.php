<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('univ_roll_no')->nullable();
            
            $table->string('class_roll_no')->nullable();
            
            $table->string('name')->nullable();
            
            $table->string('branch')->nullable();
            
            $table->string('company_name')->nullable();
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
        Schema::dropIfExists('registration_details');
    }
}

