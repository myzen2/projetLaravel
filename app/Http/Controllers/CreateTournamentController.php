<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Equipe;
use App\Http\Requests\TournamentRequest;

class CreateTournamentController extends Controller
{
    
    public function getTournament(Request $request)
    {
    	$titleTournament = session('titleTournament');

    	if($titleTournament == "") return redirect('/');

    	return view('Pages.formCreateTournament')->with('titleTournament', $titleTournament);
    }

    public function postTournament(TournamentRequest $request)
    {
    	$input = $request->all();

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
