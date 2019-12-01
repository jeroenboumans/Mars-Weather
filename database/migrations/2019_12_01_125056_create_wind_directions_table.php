<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWindDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('directions');
        Schema::create('directions', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('weather_id')->unsigned()->nullable();
            $table->foreign('weather_id')
                ->references('id')
                ->on('weathers');
            $table->enum("point", ["n","nne","ne","ene","e","ese","se","sse","s","ssw","sw","wsw","w","wnw","nw","nnw"])->nullable("n");
            $table->float("degrees")->nullable()->default(0);
            $table->float("right")->nullable()->default(0);
            $table->float("up")->nullable()->default(0);

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
        Schema::dropIfExists('directions');
    }
}
