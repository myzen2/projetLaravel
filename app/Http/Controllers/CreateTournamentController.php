<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Equipe;
use App\Http\Requests\TournamentRequest;
use Validator;
use Input;

class CreateTournamentController extends Controller
{
    
    public function getTournament(Request $request)
    {
    	$titleTournament = session('titleTournament');

        $data = array(
                'titleTournament' => $titleTournament,
                'lieu' => "",
                'adresse' => "",
                'date' =>  date('Y-m-d'),
                'nbEquipe' => 2,
                'typeTournoi' => 0,
                'nbGroupe' => 2,
                'nbTerrain' => 1,
                'tempsMatch' => 1,
                'tempsEntreMatch' => 1,
                'pauseDebut' => "",
                'pauseFin' => ""
            );

    	if($titleTournament == "") return redirect('/');

    	return view('Pages.formCreateTournament')->with($data);
    }

    public function postTournament(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'lieu' => 'required',
            'adresse' => 'required',
            'nbEquipe' => 'required',
            'nbTerrain' => 'required',
            'nbGroupe' => 'required',
            'tempsMatch' => 'required',
            'tempsEntreMatch' => 'required',
            'typeTournoi' => 'required',
            'date' => 'required|date',
            'pauseDebut' => 'required|date_format:H:i',
            'pauseFin' => 'required|date_format:H:i'
        ]);

    	$tournament = Tournament::create($input);

    	$equipe = new Equipe;

		foreach ($input['equipe'] as $value) 
		{
			Equipe::updateEquipe($value, $tournament->id);
		}

        $page = 'manageTournament/'.$tournament->id;
        return redirect($page)->with('tournament', $tournament);
    }
}
