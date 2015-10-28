<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;

class CreateTournamentController extends Controller
{
    
    public function getTournament()
    {
    	$tournoi = ''; //$_POST[''];
    	return view('Pages.formCreateTournament')->with('tournoi');
    }

    public function postTournament(TournamentRequest $request)
    {
    	$tournament = new Tournament;	

    	$tournament->nbEquipe = $_POST['nbEquipe'];
    	return $tournament->nbEquipe;
    }
    
}
