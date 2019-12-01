<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {

            $table->increments('id');
            $table->integer("sol")->default(0)->nullable();
            $table->enum("season", ["winter", "spring", "summer", "fall"])->default("winter");

            // AT - Air temperature
            $table->float("temperature_average")->nullable();
            $table->float("temperature_min")->nullable();
            $table->float("temperature_max")->nullable();
            // PRE - Air Pressure
            $table->float("pressure_average")->nullable();
            $table->float("pressure_min")->nullable();
            $table->float("pressure_max")->nullable();

            // HWS - Wind Speed
            $table->float("wind_speed_average")->nullable();
            $table->float("wind_speed_min")->nullable();
            $table->float("wind_speed_max")->nullable();

            $table->dateTime("measurement_first")->nullable();
            $table->dateTime("measurement_last")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
