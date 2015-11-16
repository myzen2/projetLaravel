@extends('app')

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
				<th>Modification</th>
				<th>Supprimer</th>
			</tr>
			
			@foreach ($tournaments as $t)
			<tr>
				<td>{{ $t->nom }}</td>
				<td><a href="manageTournament/{{ $t->id }}" title="Modification">Modification</a></td>
				<td><a href="" title="Supprimer" onclick="deleteTournament({{ $t->id }});">Supprimer</a></td>
			</tr>
			@endforeach
		</table>
	</div>
@stop