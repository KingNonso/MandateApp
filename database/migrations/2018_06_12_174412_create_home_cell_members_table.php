<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeCellMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_cell_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cell_id');
            $table->foreign('cell_id')->references('id')->on('homecells')->onDelete('cascade');
            $table->unsignedInteger('member_id');
            $table->foreign('member_id')->references('id')->on('users');
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
        Schema::dropIfExists('home_cell_members');
    }
}
