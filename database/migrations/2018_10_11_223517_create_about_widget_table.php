<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_widget', function (Blueprint $table) {
            $table->increments('id');
            $table->string('about_address')->nullable();
            $table->string('about_location')->nullable();
            $table->string('about_phone')->nullable();
            $table->string('about_website')->nullable();
            $table->string('about_email')->nullable();
            $table->string('about_fax')->nullable();
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
        Schema::dropIfExists('about_widget');
    }
}