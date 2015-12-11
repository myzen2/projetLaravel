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
    
    /* Affichage formulaire création de tournoi */
    public function getTournament(Request $request)
    {
        $titleTournament = session('nom');
        $data = array(
                'nom' => $titleTournament,
                'lieu' => "",
                'adresse' => "",
                'date' =>  date('Y-m-d'),
                'nbEquipe' => 2,
                'typeTournoi' => 0,
                'typeFinales' => 0,
                'nbGroupe' => 2,
                'nbTerrain' => 1,
                'tempsMatch' => 1,
                'tempsEntreMatch' => 1,
                'heureDebutTournoi' => "",
                'pauseDebut' => "",
                'pauseFin' => ""
            );
        if($titleTournament == "") return redirect('/');
        return view('Pages.formCreateTournament')->with($data);
    }

    /* Ajout ou update du tournoi */
    public function postTournament(Request $request)
    {
        $input = $request->all();

        if(isset($input['id']))
        {
            $tournoi = Tournament::find($input['id']);
            $tournoi->fill($input);
            $tournoi->save();
            return redirect('listAllTournaments');
        }

       $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'lieu' => 'required',
            'adresse' => 'required',
            'nbEquipe' => 'required',
            'nbTerrain' => 'required',
            'nbGroupe' => 'required',
            'heureDebutTournoi' => 'required|date_format:H:i',
            'tempsMatch' => 'required',
            'tempsEntreMatch' => 'required',
            'typeTournoi' => 'required',
            'date' => 'required|date',
            'pauseDebut' => 'required|date_format:H:i',
            'pauseFin' => 'required|date_format:H:i'
        ]);

        if ($validator->fails()) 
        {
            return view('Pages.formCreateTournament')->withErrors($validator)->withInput(Input::all());
        }

        $tournament = Tournament::create($input);
        $equipe = new Equipe;
        foreach ($input['equipe'] as $value) 
        {
            Equipe::updateEquipe($value, $tournament->id);
        }

        $page = 'manageTournament/'.$tournament->id;
        return redirect($page)->with('tournament', $tournament);
    }

    /* Affichage information tournoi pour la modification */
    public function updateTournament($id)
    {
        return view('Pages.formCreateTournament')->with(Tournament::find($id)->toArray());
    }

    /* Suppression tournoi */
    public function deleteTournament($id)
    {
        $tournament = Tournament::find($id);
        $tournament->delete();
        return redirect('/listAllTournaments');
    }
}
