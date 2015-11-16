@extends('app')

@section('content')

<table class="form-group">
	<tr>
		<th>Nom du tournoi</th>
		<th>Modification</th>
		<th>Supprimer</th>
	</tr>
@foreach ($tournaments as $t)
    <tr>
    	<td>{{ $t->nom }}</td>
    	<td><a href="manageTournament/{{ $t->id }}" title="Modification">Modification</a></td>
    	<td><a href="" title="Supprimer">Supprimer</a></td>
    </tr>
@endforeach
</table>

@stop