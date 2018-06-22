<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewConvertActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_convert_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('new_convert_id');
            $table->foreign('new_convert_id')->references('id')->on('new_converts');
            $table->unsignedInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('users');
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('action');
            $table->text('feedback')->nullable();
            $table->datetime('schedule')->nullable();
            $table->integer('done')->default(0);
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
        Schema::dropIfExists('new_convert_actions');
    }
}
