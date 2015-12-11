<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = 'team';

    protected $fillable = [
            'nom',
            'capitaine',
            'ville',
            'npa',
            'adresse',
            'email',
            'telephone',
            'tournament_id'
    ];

    public $timestamps = false;

    public function tournament()
    {
    	return $this->belongsTo('App\Tournament');
    }

    /* Création équipe */
    public static function updateEquipe($nom, $tournamentId)
    {
    	$equipe = new Equipe;

		$equipe['nom'] = $nom;
		$equipe['tournament_id'] = $tournamentId;

		$equipe->save();
    }
}
