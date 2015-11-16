<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nom', 100);
            $table->string('lieu', 100);
            $table->string('adresse', 100);
            $table->integer('nbEquipe');
            $table->integer('nbTerrain');
            $table->integer('nbGroupe');
            $table->integer('tempsMatch');
            $table->integer('tempsEntreMatch');
            $table->integer('typeTournoi');
            $table->date('date');
            $table->string('pauseDebut');
            $table->string('pauseFin');
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
        Schema::drop('tournament');
    }
}
