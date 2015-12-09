@extends('appWithoutMenu')

<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('contentTitle')
	Planning du tournoi : {{ $tournament->nom }}
@stop

@section('content')
	<div class="table-responsive" id="print_button_div">
		<ul class="nav nav-pills nav-justified">
			<li><a href="#" onclick="window.print(); return false;" title="Imprimer tournoi" ><span class="glyphicon glyphicon-print"></span> Imprimer tournoi</a></li>
			<li><a href="/treeTournament/{{ $tournament->id }}" title="Génération de l'arbre" ><span class="glyphicon glyphicon-tree-conifer"></span> Générer arbre</a></li>
		</ul>
	</div>

	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Heures</th>
				@for ($i = 1; $i <= $tournament->nbTerrain; $i++)
				    <th>Match terrain {{$i}}</th>
				    <th>Score terrain {{$i}}</th>
				@endfor
			</tr>

			{{--*/ $nbOfRound = ceil(count($games) / $tournament->nbTerrain) /*--}}
			{{--*/ $indiceMatch = 0 /*--}}
			{{--*/ $noMoreMatch = false /*--}}
			
			@for ($i=0; $i < $nbOfRound; $i++)

				{{--*/ $heureDebut = $games[$i * $tournament->nbTerrain]['heureMatchDebut'] /*--}}
				{{--*/ $heureFin = $games[$i * $tournament->nbTerrain]['heureMatchFin'] /*--}}

				<tr>
					<td>{{ $heureDebut }} - {{ $heureFin }}</td>

				@for ($j = 0 ; $j < $tournament->nbTerrain; $j++)

					@if($noMoreMatch == true)
						<td></td>
						<td></td>
					@else
						<td>{{ $games[$indiceMatch]['equipe1'] }} - {{ $games[$indiceMatch]['equipe2'] }}</td>

						{{--*/ $score1 = $games[$indiceMatch]['score1'] /*--}}
						{{--*/ $score2 = $games[$indiceMatch]['score2'] /*--}}
						
						<td>
							<input type='number' id='matchIDHome{{ $indiceMatch }}' name='matchIDHome{{ $indiceMatch }}' value='{{ $score1 }}' min='0' max='100'>
							-
							<input type='number' id='matchIDAway{{ $indiceMatch }}' name='matchIDAway{{ $indiceMatch }}' value='{{ $score2 }}' min='0' max='100'>

							<input type='button' name='saveScore' value='Sauvegarder' onclick='saveGame({{ $tournament->id }}, "{{ $games[$indiceMatch]['equipe1'] }}", "{{ $games[$indiceMatch]['equipe2'] }}", {{ $indiceMatch }}, "{{ $heureDebut }}", "{{ $heureFin }}")' />
						</td>
					@endif

					{{--*/ $indiceMatch++ /*--}}

					@if($indiceMatch >= count($games))
						{{--*/ $noMoreMatch = true /*--}}
					@endif

				@endfor
				</tr>

			@endfor
		</table>
	</div>
@stop
