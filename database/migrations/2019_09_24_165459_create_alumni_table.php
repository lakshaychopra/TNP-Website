<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('whatsapp_cont');
            $table->string('pass_year');
            $table->string('current_position'); 
            $table->string('current_organisation');
            $table->string('branches')->nullable();
            $table->string('job_des')->nullable();
            $table->string('job_location')->nullable();
            $table->string('salary')->nullable();
            $table->string('vacancy')->nullable();
            $table->string('category')->nullable();
            $table->string('post_link')->nullable();
            $table->string('tech_req')->nullable();
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
        Schema::dropIfExists('alumni');
    }
}
