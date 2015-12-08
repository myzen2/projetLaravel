<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'match';

    protected $fillable = [
            'equipe1',
            'equipe2',
            'score1',
            'score2',
            'heureMatchDebut',
            'heureMatchFin',
            'tournament_id',
            'groupe'
    ];

    public $timestamps = false;
}
