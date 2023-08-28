<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherDataTable extends Migration
{
    public function up()
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('temperature');
            $table->string('description');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather_data');
    }
}
