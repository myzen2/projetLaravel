@extends('app')

@section('content')

	<h1>Création du tournoi : {{ $tournoi }}</h1>

	<table>
	{!! Form::open(['url' => 'createTournament']) !!}
	<tr>
		<td>{!! Form::label('nbEquipe', 'Nombre d\'équipes :') !!}</td>
		<td>{!! Form::input('number', 'nbEquipe', '2', array('min' => '2', 'max' => '24', 'onload' => 'changeNbEquipe()' , 'onchange' => 'changeNbEquipe()')) !!}</td>
	</tr>
	<tr id="equipeBox">
	</tr>
	<tr>
		<td>{!! Form::label('typeTournoi', 'Type de tournoi :') !!}</td>
		<td></td>
	</tr>
	<tr>
		<td>{!! Form::label('nbTerrains', 'Nombre de terrains :') !!}</td>
		<td>{!! Form::input('number', 'nbTerrains', '1', array('min' => '2', 'max' => '20')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('tempsMatch', 'Temps de match :') !!}</td>
		<td>{!! Form::input('number', 'tempsMatch', '1', array('min' => '1', 'max' => '45')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('tempsBattement', 'Temps de battement :') !!}</td>
		<td>{!! Form::input('number', 'tempsBattement', '1', array('min' => '1', 'max' => '5')) !!}</td>
	</tr>
	<tr>
		<td>{!! Form::label('pause', 'Pause :') !!}</td>
		<td>{!! Form::input('time', 'pause') !!}</td>
		<td> à </td>
		<td>{!! Form::input('time', 'pause') !!}</td>
	</tr>
	<tr>
		<td>{!! Form::submit('Créer tournoi') !!}</td>
	</tr>
	{!! Form::close() !!}
</table>

@stop