<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('office_type',['STUDENT', 'OFFICE', 'FACULTY'])->nullable();
            $table->string('office_widget')->nullable();
            $table->string('office_name')->nullable();
            $table->string('office_position')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_picture')->nullable();
            $table->string('office_phone')->nullable();
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
        Schema::dropIfExists('home_page');
    }
}
