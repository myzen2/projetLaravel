<?php

namespace App\Http\Controllers;

use Request;
use App\Tournament;
use App\Equipe;
use App\Match;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Input;

class PlanningController extends Controller
{

    /**
    *   Affichage du planning
    *
    *   paramètre : id du tournoi
    *   return : tournoi
    **/
    public function showPlanning($id)
    {
        $tournament = Tournament::with('equipes')->find($id);
        
        return view('Pages.showPlanning')->with('tournament', $tournament)->with('teams', $tournament->equipes);
    }

    public function saveGameData(Request $request)
    {
        if(Request::ajax())
        {
            $data = Input::all();
            unset($data['_token']);
            unset($data['score1']);
            unset($data['score2']);

            $match = Match::firstOrNew($data);
            $match->fill(Input::all());
            $match->save();
        }
        return 'Score enregistré';
    }
}
