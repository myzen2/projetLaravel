<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('equipe1', 100);
            $table->string('equipe2', 100);
            $table->integer('score1');
            $table->integer('score2');
            $table->string('heureMatchDebut');
            $table->string('heureMatchFin');
            $table->integer('groupe');
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
        Schema::drop('match');
    }
}
