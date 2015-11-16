@extends('app')

@section('menu')
	<nav class="col-sm-2">          
		<ul class="nav nav-pills nav-stacked">
	        <li class="active"> <a href="/"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
	        <li> <a href="/listAllTournaments" title="Manager tournoi"> <span class="glyphicon glyphicon-pencil"></span> Gestion des tournois </a> </li>
	  	</ul>
	</nav>
@stop

@section('contentTitle')
	Bonjour !
@stop

@section('content')
	Coucou
@stop
