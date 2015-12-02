<?php

namespace App\Http\Controllers;

use Request;
use App\Tournament;
use App\Equipe;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PagesController extends Controller
{
    public function index()
    {
    	return view('Pages.index');
    }

    public function showForm()
    {
    	$nom = Request::get('nom');

        return redirect('createTournament')->with('nom', $nom);
    }

    public function showListAllTournament()
    {
        $tournaments = Tournament::all();
        return view('Pages.listAllTournament')->with('tournaments', $tournaments);
    }

    public function showActualTournament($id)
    {
        $tournament = Tournament::find($id);
        return view('Pages.manageTournament')->with('tournament', $tournament);
    }

    public function creationGroupsTournament($id)
    {
        /*$tournament = Tournament::with('equipes')->find($id);
        return view('Pages.createGroup', compact('tournament'));*/
    }

    public function showPlanning($id)
    {
        $tournament = Tournament::find($id);
        $teams = Equipe::where('tournament_id', '=', $id)->get();
        
        return view('Pages.showPlanning')->with('tournament', $tournament)->with('teams', $teams);
    }

    public function showListAllTeams($id)
    {
        $equipes = Equipe::where('tournament_id', '=', $id)->get();
        return view('Pages.listAllTeams')->with('equipes', $equipes)->with('tournamentId', $id);
    }

    public function showTreeTournament($id)
    {
        $createtree = Equipe::where('tournament_id', '=', $id)->get();
        return view('Pages.treeTournament')->with('equipes', $createtree)->with('tournamentId', $id);

    }
}
