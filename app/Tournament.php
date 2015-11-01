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
            'pauseDebut',
            'pauseFin'
    ];

    public static function updateTournament($input)
    {
    	$tempsDebut = strtotime($input['date'].' '.$input['pauseDebut']);
    	$tempsFin = strtotime($input['date'].' '.$input['pauseFin']);

    	$input['pauseDebut'] = date('Y-m-d H:i', $tempsDebut);
    	$input['pauseFin'] = date('Y-m-d H:i', $tempsFin);

    	$tournament = new Tournament;

    	$tournament->nom = $input['nom'];
    	$tournament->lieu = $input['lieu'];
    	$tournament->adresse = $input['adresse'];
    	$tournament->nbEquipe = $input['nbEquipe'];
    	$tournament->nbTerrain = $input['nbTerrain'];
    	$tournament->nbGroupe = $input['nbGroupe'];
    	$tournament->tempsMatch = $input['tempsMatch'];
    	$tournament->tempsEntreMatch = $input['tempsEntreMatch'];
    	$tournament->typeTournoi = $input['typeTournoi'];
    	$tournament->date = $input['date'];
    	$tournament->pauseDebut = $input['pauseDebut'];
    	$tournament->pauseFin = $input['pauseFin'];

    	$tournament->save();

    	return $tournament->id;
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
}
