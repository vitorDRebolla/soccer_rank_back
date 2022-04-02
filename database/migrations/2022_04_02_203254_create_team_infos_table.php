<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_info', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team_id');
            $table->unsignedInteger('points');
            $table->unsignedInteger('games');
            $table->unsignedInteger('wins');
            $table->unsignedInteger('draws');
            $table->unsignedInteger('loses');
            $table->unsignedInteger('goals');
            $table->unsignedInteger('goals_against');
            $table->integer('goal_difference');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_infos');
    }
}
