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
            'tempsMatch',
            'tempsEntreMatch',
            'typeTournoi',
            'date',
            'heureDebutTournoi'
            'pauseDebut',
            'pauseFin'
    ];

    public function setDebutTournoi($date)
    {
        $this->attributes['heureDebutTournoi'] = Carbon::createFromFormat('H:i', $date);
    }

    public function setPauseDebut($date)
    {
    	$this->attributes['pauseDebut'] = Carbon::createFromFormat('H:i', $date);
    }

    public function setPauseFin($date)
    {
    	$this->attributes['pauseFin'] = Carbon::createFromFormat('H:i', $date);
    }

    public function equipes()
    {
    	return $this->hasMany('App\Equipe');
    }

    public function showAllTournament()
    {
        return Tournament::all();
    }
}
