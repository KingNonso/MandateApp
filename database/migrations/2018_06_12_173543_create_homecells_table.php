<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomecellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homecells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedInteger('church_id');
            $table->foreign('church_id')->references('id')->on('churches');
            $table->unsignedInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->unsignedInteger('leader_id')->nullable();
            $table->foreign('leader_id')->references('id')->on('users');
            $table->unsignedInteger('secretary_id')->nullable();
            $table->foreign('secretary_id')->references('id')->on('users');
            $table->dateTime('approved')->nullable();
            $table->unsignedInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
            $table->softDeletes();

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
        Schema::dropIfExists('homecells');
    }
}
