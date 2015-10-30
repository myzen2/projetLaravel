<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournament';

    protected $fillable = [
    		'nom',
            'lieu',
            'adresse',
            'nbEquipe',
            'nbTerrain',
            'nbGroupe',
            'timeMatch',
            'timeEntre',
            'typeTournoi',
            'date',
            'pauseDebut',
            'pauseFin'
    ];

    public function setPauseDebut($date)
    {
    	$this->attributes['pauseDebut'] = Carbon::createFromFormat('H:i', $date);
    }

    public function setPauseFin($date)
    {
    	$this->attributes['pauseFin'] = Carbon::createFromFormat('H:i', $date);
    }
}
