<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('surname')->nullable();
            $table->string('othername')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('slug')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('app_country');
            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('app_state');
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('app_city');
            $table->unsignedInteger('church_id')->nullable();
            $table->foreign('church_id')->references('id')->on('churches');
            $table->unsignedInteger('permission_id')->nullable();
            $table->foreign('permission_id')->references('id')->on('users_permissions');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
