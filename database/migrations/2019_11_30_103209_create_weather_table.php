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
            $table->bigIncrements('id');

            $table->integer('insight_id')->default(0);

            $table->string("terrestrial_date")->nullable();
            $table->integer("sol")->default(0);
            $table->integer("ls")->default(0);
            $table->string("season")->nullable();

            $table->float("min_temp")->default(0);
            $table->float("max_temp")->default(0);
            $table->float( "min_gts_temp")->default(0);
            $table->float("max_gts_temp")->default(0);
            $table->float("pressure")->default(0);

            $table->string("pressure_string")->nullable();
            $table->string("abs_humidity")->nullable();
            $table->string("wind_speed")->nullable();
            $table->string("wind_direction")->nullable();
            $table->string("atmo_opacity")->nullable();
            $table->string("sunrise")->nullable();
            $table->string("sunset")->nullable();
            $table->string("local_uv_irradiance_index")->nullable();

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
