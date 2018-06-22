<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('app_country');
            
            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('app_state');
            
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('app_city');
            
            $table->string('province')->nullable();
            $table->string('area')->nullable();
            $table->string('district')->nullable();
            $table->string('church_name');
            $table->text('address');
            $table->text('geolocation')->nullable();
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
        Schema::dropIfExists('churches');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
