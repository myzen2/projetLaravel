<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nom', 100);
            $table->string('capitaine', 100);
            $table->string('ville', 100);
            $table->string('npa', 100);
            $table->string('adresse', 100);
            $table->string('email', 150);
            $table->string('telephone', 12);
            $table->integer('numGroupe');
            $table->integer('nbPoint');
            $table->integer('butFait');
            $table->integer('butSubi');
            $table->integer('tournament_id')->unsigned();

            $table->foreign('tournament_id')
                  ->references('id')
                  ->on('tournament')
                  ->onDelete('cascade');
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
        Schema::drop('team');
    }
}
