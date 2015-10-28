<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
    	return view('Pages.index');
    }

    public function showForm()
    {
    	$titleTournament = Request::get('title');
    	
    	return view('Pages.create')->with('titleTournament', $titleTournament);
    }
}
