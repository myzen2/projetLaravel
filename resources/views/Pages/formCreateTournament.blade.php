@extends('app')

@section('content')

	<table>
	{!! Form::open(['url' => 'createTournament']) !!}
	<tr>
		<td>{!! Form::label('nbEquipe', 'Nombre d\'équipes :') !!}</td>
		<td>{!! Form::input('number', 'nbEquipe', '2') !!}</td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td>{!! Form::label('typeTournoi', 'Type de tournoi :') !!}</td>
		<td></td>
	</tr>
	<tr>
		<td>{!! Form::label('nbTerrains', 'Nombre de tournoi :') !!}</td>
		<td></td>
	</tr>
	<tr>
		<td>{!! Form::label('tempsMatch', 'Temps de match :') !!}</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>{!! Form::label('tempsBattement', 'Temps de battement :') !!}</td>
		<td></td>
	</tr>
	<tr>
		<td>{!! Form::submit('Créer tournoi') !!}</td>
	</tr>
	{!! Form::close() !!}
</table>

@stop