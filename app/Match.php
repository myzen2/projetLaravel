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
            'heureMatch',
            'tournament_id'
    ];

    public $timestamps = false;

    public function getMatch($data)
    {
        $match = Match::where($data)
                        ->first(); //Match::where($data)->get();
        echo $match;
        return $match;
    }
}
