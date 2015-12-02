@extends('app')

@section('contentTitle')
	Planning du tournoi
@stop

@section('content')
	<div class="table-responsive"> 
		<table class="table">
			<tr>
				<th>Heures</th>
				@for ($i = 1; $i <= $tournament->nbTerrain; $i++)
				    <th>Match terrain {{$i}}</th>
				    <th>Score terrain {{$i}}</th>
				@endfor
			</tr>
			
			<tr>
				
			</tr>
		</table>
	</div>
@stop