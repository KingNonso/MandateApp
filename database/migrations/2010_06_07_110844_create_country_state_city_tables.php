<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryStateCityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sortname');
            $table->string('name');
            $table->integer('phonecode');
            $table->timestamps();
        });

        Schema::create('app_state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('app_country');
            $table->timestamps();
        });

        Schema::create('app_city', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('app_state');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('app_country');
        Schema::dropIfExists('app_state');
        Schema::dropIfExists('app_city');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
