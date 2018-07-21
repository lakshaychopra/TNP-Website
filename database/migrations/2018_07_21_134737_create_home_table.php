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
            $table->string('office_name')->nullable();
            $table->string('office_position')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_picture')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('about_address')->nullable();
            $table->string('about_location')->nullable();
            $table->string('about_phone')->nullable();
            $table->string('about_website')->nullable();
            $table->string('about_email')->nullable();
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
