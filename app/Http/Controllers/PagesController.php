<?php

namespace App\Http\Controllers;

use Request;
use App\Tournament;
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
    	$titleTournament = Request::get('title');

        return redirect('createTournament')->with('titleTournament', $titleTournament);
    }

    public function showManagmentTournament($id)
    {
        $tournament = Tournament::find($id);

        return view('Pages.managementTournament')->with('tournament', $tournament);
    }

    public function showListAllTournament()
    {
        $tournaments = Tournament::all();
        return view('Pages.listAllTournament')->with('tournaments', $tournaments);
    }
}