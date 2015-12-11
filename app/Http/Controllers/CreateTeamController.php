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
    /* Formulaire de création d'équipe */
    public function getTeam($id)
    {
        return view('Pages.formCreateTeam')->with(Equipe::find($id)->toArray());
    }

    /* Création ou update de l'équipe */
    public function postTeam(Request $request)
    {
        $input = $request->all();

        if(isset($input['id']))
        {
            $team = Equipe::find($input['id']);
            $team->fill($input);
            $team->save();

            return redirect('/listAllTeams/'. $team->tournament_id);
        }

        $validator = Validator::make($input, [
            'nom' => 'required'
        ]);

        if ($validator->fails()) 
        {
            return view('Pages.formCreateTeam')->withErrors($validator)->withInput($input);
        }

        $equipe = new Equipe();
        $equipe->fill($input);
        $equipe->save();

        return redirect('/listAllTeams/'.$input['tournament_id']);
    }

    /* Suppression de l'équipe */
    public function deleteTeam($id)
    {
        $team = Equipe::find($id);
        $idTournament = $team->tournament_id;
        $team->delete();
        return redirect('/listAllTeams/'.$idTournament);
    }

    public function createTeam($id)
    {
        $data = array(
                'nom' => "",
                'capitaine' => "",
                'ville' => "",
                'adresse' => "",
                'npa' => "",
                'email' => "",
                'telephone' => "",
                'tournament_id' => $id
            );

        return view('Pages.formCreateTeam')->with($data);
    }
}
