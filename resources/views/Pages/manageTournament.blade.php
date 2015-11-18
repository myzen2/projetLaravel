@extends('app')

<script type="text/javascript" src="../functionJS.js"></script>

@section('menu')
	<nav class="col-sm-2">          
		<ul class="nav nav-pills nav-stacked">
	        <li> <a href="/"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
	        <li class="active"> <a href="/listAllTournaments" title="Manager tournoi"> <span class="glyphicon glyphicon-pencil"></span> Gestion des tournois </a> </li>
	  	</ul>
	</nav>
@stop

@section('contentTitle')
	{{ $tournament->nom }}
@stop

@section('content')
	<ul class="nav nav-pills nav-justified">
		<li><a href="/createGroup/{{ $tournament->id }}" title="Création groupes" ><span class="glyphicon glyphicon-plus"></span> Création des groupes</a></li>
		<li><a href="/listAllTeams/{{ $tournament->id }}" title="Gestion des équipes" ><span class="glyphicon glyphicon-list-alt"></span> Gestion des équipes</a></li>
		<li><a href="" title="Imprimer tournoi" ><span class="glyphicon glyphicon-print"></span> Imprimer tournoi</a></li>
		<li><a href="" title="Générer planning" ><span class="glyphicon glyphicon-list-alt"></span> Générer planning</a></li>
		<li><a href="/updateTournament/{{ $tournament->id }}" title="Modifier tournoi" ><span class="glyphicon glyphicon-pencil"></span> Modifier</a></li>
		<li><a href="#" title="Supprimer" onclick="deleteTournament({{ $tournament->id }})"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></li>
	</ul>
@stop
