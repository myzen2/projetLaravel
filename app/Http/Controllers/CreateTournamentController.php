<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreateTournamentController extends Controller
{
    
    public function createTournament()
    {
    	$tournoi = ''; //$_POST[''];
    	return view('Pages.formCreateTournament')->with('tournoi');
    }
    
}
