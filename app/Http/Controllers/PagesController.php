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
    /**
    *   Affichage de la page d'accueil
    **/
    public function index()
    {
    	return view('Pages.index');
    }

    /**
    *   Affichage formulaire de création de tournoi
    *
    *   return : nom du tournoi
    **/
    public function showForm()
    {
    	$nom = Request::get('nom');

        return redirect('createTournament')->with('nom', $nom);
    }

    /**
    *   Affichage de tous les tournois
    *
    *   return : tous les tournois
    **/
    public function showListAllTournament()
    {
        $tournaments = Tournament::all();
        return view('Pages.listAllTournament')->with('tournaments', $tournaments);
    }


    /**
    *   Affichage du tournoi à modifier
    *
    *   paramètre : id tu tournoi
    *   return : tournoi
    **/
    public function showActualTournament($id)
    {
        $tournament = Tournament::find($id);
        return view('Pages.manageTournament')->with('tournament', $tournament);
    }

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


    /**
    *   Affichage des équipes du tournoi
    *
    *   paramètre : id du tournoi
    *   return : toutes les équipes du tournoi et l'id du tournoi
    **/
    public function showListAllTeams($id)
    {
        $tournament = Tournament::with('equipes')->find($id);
        return view('Pages.listAllTeams')->with('equipes', $tournament->equipes)->with('tournamentId', $id);
    }


    /**
    *   Affichage de l'arbre du tournoi
    *
    *   paramètre : id du tournoi
    *   return : les équipes et id tournoi
    **/
    public function showTreeTournament($id)
    {
        $tournament = Tournament::with('equipes')->find($id);
        return view('Pages.treeTournament')->with('equipes', $tournament->equipes)->with('tournamentId', $id);
    }
}
