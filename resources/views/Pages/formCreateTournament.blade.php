@extends('app')

@section('content')

	<h1>Création du tournoi : {{ $titleTournament }}</h1>

	<!--<table>
	{!! Form::open(['url' => 'createTournament']) !!}
	<tr>
		<td>{!! Form::label('lieu', 'Lieu :') !!}</td>
		<td>{!! Form::input('text', 'lieu') !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('adresse', 'Adresse :') !!}</td>
		<td>{!! Form::input('text', 'adresse') !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('date', 'Date du tournoi :') !!}</td>
		<td>{!! Form::input('date', 'date') !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('nbEquipe', 'Nombre d\'équipes :') !!}</td>
		<td>{!! Form::input('number', 'nbEquipe', '2', array('min' => '2', 'max' => '24', 'onchange' => 'changeNbEquipe()')) !!}</td>
	</tr>
	<tr id="equipeBox">
	</tr>
	<tr>
		<td>{!! Form::label('typeTournoi', 'Type de tournoi :') !!}</td>
		<td>{!! Form::select('typeTournoi', array('0' => "Tournoi avec groupe", '1' => 'Elimination direct'), array('onchange' => 'changeGroupe()')) !!}</td>
	</tr>
	<tr id="inputGroupe">
		<td>{!! Form::label('nbGroupe', 'Nombre de groupe :') !!}</td>
		<td>{!! Form::input('number', 'nbGroupe', '2', array('min' => '2', 'max' => '24')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('nbTerrain', 'Nombre de terrains :') !!}</td>
		<td>{!! Form::input('number', 'nbTerrain', '1', array('min' => '1', 'max' => '10')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('tempsMatch', 'Temps de match :') !!}</td>
		<td>{!! Form::input('number', 'tempsMatch', '1', array('min' => '1', 'max' => '45')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('tempsEntreMatch', 'Temps de battement :') !!}</td>
		<td>{!! Form::input('number', 'tempsEntreMatch', '1', array('min' => '1', 'max' => '5')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('pauseDebut', 'Pause :') !!}</td>
		<td>{!! Form::input('time', 'pauseDebut') !!}</td>
		<td> à </td>
		<td>{!! Form::input('time', 'pauseFin') !!}</td>
	</tr>
	<tr>
		<td>{!! Form::input('hidden', 'nom', 'nom') !!}</td>
	</tr>
	<tr>
		<td>{!! Form::submit('Créer tournoi') !!}</td>
	</tr>
	{!! Form::close() !!}
</table>-->

	{!! Form::open(['url' => 'createTournament']) !!}
	<div class="form-group">
		{!! Form::label('lieu', 'Lieu :') !!}
		{!! Form::input('text', 'lieu') !!}
	</div>

	<div class="form-group">
		{!! Form::label('adresse', 'Adresse :') !!}
		{!! Form::input('text', 'adresse') !!}
	</div>

	<div class="form-group">
		{!! Form::label('date', 'Date du tournoi :') !!}
		{!! Form::input('date', 'date') !!}
	</div>

	<div class="form-group" id="equipeBox">
		{!! Form::label('nbEquipe', 'Nombre d\'équipes :') !!}
		{!! Form::input('number', 'nbEquipe', '2', array('min' => '2', 'max' => '24', 'onchange' => 'changeNbEquipe()')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('typeTournoi', 'Type de tournoi :') !!}
		{!! Form::select('typeTournoi', array('0' => "Tournoi avec groupe", '1' => 'Elimination direct'), array('onchange' => 'changeGroupe()')) !!}
	</div>

	<div class="form-group" id="inputGroupe">
		{!! Form::label('nbGroupe', 'Nombre de groupe :') !!}
		{!! Form::input('number', 'nbGroupe', '2', array('min' => '2', 'max' => '24')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('nbTerrain', 'Nombre de terrains :') !!}
		{!! Form::input('number', 'nbTerrain', '1', array('min' => '1', 'max' => '10')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tempsMatch', 'Temps de match :') !!}
		{!! Form::input('number', 'tempsMatch', '1', array('min' => '1', 'max' => '45')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tempsEntreMatch', 'Temps de battement :') !!}
		{!! Form::input('number', 'tempsEntreMatch', '1', array('min' => '1', 'max' => '5')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('pauseDebut', 'Pause :') !!}
		{!! Form::input('time', 'pauseDebut') !!}
		à
		<td>{!! Form::input('time', 'pauseFin') !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Créer tournoi') !!}
	</div>

		{!! Form::input('hidden', 'nom', 'nom') !!}
	{!! Form::close() !!}


@if ($errors->any())
	<ul class="alert-danger">
        @foreach($errors->all() as $e)
	        <li>{{ $e }}</li>
        @endforeach
	</ul>
@endif

@stop