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

class CreateTeamController extends Controller
{
    
    public function getTeam($id)
    {
        return view('Pages.formUpdateTeam')->with(Equipe::find($id)->toArray());
    }

    public function postTeam(Request $request)
    {
        $input = $request->all();

        $team = Equipe::find($input['id']);
        $team->fill($input);
        $team->save();
        return redirect('/listAllTeams/'.$team->tournament_id);
    }

    public function deleteTeam($id)
    {
        $team = Equipe::find($id);
        $idTournament = $team->tournament_id;
        $team->delete();
        return redirect('/listAllTeams/'.$idTournament);
    }
}
