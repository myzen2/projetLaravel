@extends('app')

<style type="text/css">
	.nav_tournament a
	{
		border : 1px solid black;
		display: inline-block;
		min-width: 33%;
		padding: 5px;
		margin-bottom: 5px;
		text-align: center;
	}
</style>

<script type="text/javascript" src="../functionJS.js"></script>

@section('menu')
	<nav class="col-sm-2">          
		<ul class="nav nav-pills nav-stacked">
	        <li class="active"> <a href="/"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
	        <li> <a href="/listAllTournaments" title="Manager tournoi"> <span class="glyphicon glyphicon-pencil"></span> Gestion des tournois </a> </li>
	  	</ul>
	</nav>
@stop

@section('contentTitle')
	{{ $tournament->nom }}
@stop

@section('content')
	<div class="nav_tournament">
		<a href="/createGroup/{{ $tournament->id }}" title="Création groupes" >Création des groupes</a>
		<a href="/listAllTeams/{{ $tournament->id }}" title="Gestion des équipes" >Gestion des équipes</a>
		<a href="/createGroup/{{ $tournament->id }}" title="Création groupes" >Création des groupes</a>
		<a href="" title="Générer planning" >Générer planning</a>
		<a href="/updateTournament/{{ $tournament->id }}" title="Modifier tournoi" >Modifier</a>
		<a href="#" title="Supprimer" onclick="deleteTournament({{ $tournament->id }});">Supprimer</a>
	</div>
@stop
