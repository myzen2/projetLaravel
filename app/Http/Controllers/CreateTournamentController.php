<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\Http\Requests\TournamentRequest;

class CreateTournamentController extends Controller
{
    
    public function getTournament(Request $request)
    {
    	$titleTournament = $request->input('titleTournament');
    	return view('Pages.formCreateTournament')->with('titleTournament');
    }

    public function postTournament(TournamentRequest $request)
    {
    	$input = $request->all();

    	$tempsDebut = strtotime($input['date'].' '.$input['pauseDebut']);
    	$tempsFin = strtotime($input['date'].' '.$input['pauseFin']);

    	$input['pauseDebut'] = date('Y-m-d H:i', $tempsDebut);
    	$input['pauseFin'] = date('Y-m-d H:i', $tempsFin);

		Tournament::create($input);
    	
    	return redirect('createTournament');
    }
    
}
