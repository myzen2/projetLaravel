<!-- 
	Auteurs : Assunçao Jeshon, Burri Bastien, Di Stasio Leonardo

	Page de listage de tous les tournois créés 
-->

@extends('appWithMenu')

@section('menu')
	<nav class="col-sm-2">          
		<ul class="nav nav-pills nav-stacked">
	        <li> <a href="/"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
	        <li class="active"> <a href="" title="Manager tournoi"> <span class="glyphicon glyphicon-pencil"></span> Gestion des tournois </a> </li>
	  	</ul>
	</nav>
@stop

@section('contentTitle')
	Liste des tournois
@stop

@section('content')
	<div class="table-responsive"> 
		<table class="table">
			<tr>
				<th>Nom du tournoi</th>
				<th>Gestion</th>
				<th>Modification</th>
				<th>Supprimer</th>
			</tr>
			
			@foreach ($tournaments as $t)
			<tr>
				<td>{{ $t->nom }}</td>
				<td><a href="manageTournament/{{ $t->id }}" title="Gestion"><span class="glyphicon glyphicon-list-alt"></span> Gérer tournoi</a></td>
				<td><a href="updateTournament/{{ $t->id }}" title="Modification"><span class="glyphicon glyphicon-pencil"></span> Modifier tournoi</a></td>
				<td><a href="/deleteTournament/{{ $t->id }}" title="Supprimer" onclick="return confirm('Etes-vous sûr de vouloir supprimer le tournoi ?');"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
			</tr>
			@endforeach
		</table>
	</div>
@stop