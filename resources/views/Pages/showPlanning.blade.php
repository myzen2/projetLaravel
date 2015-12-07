@extends('app')

@section('contentTitle')
	Planning du tournoi : {{ $tournament->nom }}
@stop

@section('content')
	<div class="table-responsive" id="print_button_div">
		<ul class="nav nav-pills nav-justified">
			<li><a href="#" onclick="window.print(); return false;" title="Imprimer tournoi" ><span class="glyphicon glyphicon-print"></span> Imprimer tournoi</a></li>
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

			<?php
			$groupes = createGroups($teams,$tournament);
			
			echo generateMatchs($groupes, $tournament);
			?>
		</table>
	</div>
@stop

<?php
function createGroups($teams, $tournament)
{
	// create an array of teams
	$members = array();
	$i = 0;
	foreach ($teams as $team) {
		$members[$i] =  $team['nom'];
		$i++;
	}

	// Split our array of team on a array of groupes of teams
	$groupes = array_chunk($members, ceil($tournament->nbEquipe / $tournament->nbGroupe));

	return $groupes;
}

function generateMatchs($groupes, $tournament)
{
	$nbOfGroupes = count($groupes);
	$matchs;
	$table = "";

	/* Count the number of matchs */
	$nbOfMatchs = 0;

	for($i=0; $i < $nbOfGroupes; $i++)
	{
		$nbOfMatchs += (count($groupes[$i]) * (count($groupes[$i]) - 1)) / 2;

		/* Add a fictive team for having a pair number of team */
		if (count($groupes[$i])%2 != 0)
		{
	        array_push($groupes[$i],"forfait");
	    }
	}

	/* Count the number of rounds */
	$nbOfRound = ceil($nbOfMatchs / $tournament->nbTerrain);

	//print_r($groupes);

	/* Generate the matchs round by round*/
	$indexGroupe=0;

	for($i=0; $i < $nbOfRound; $i++)
	{
		$table .= "<tr>";
		$table .= "<td> Heure </td>";

		for($j=0; $j < $tournament->nbTerrain; $j++)
		{

			/*$matchs[$i][$j]['Home'] = ...;
			$matchs[$i][$j]['Away'] = ...;*/

			$table .= "<td>Round :" . $i . " Terrain :" . $j . " Match du groupe :" . $indexGroupe . "</td>";
			$table .= "<td> Score </td>";
		}

		$table .= "</tr>";

		$indexGroupe++;
		if($indexGroupe >= $nbOfGroupes)
		{
			$indexGroupe = 0;
		}
	}

	return $table;
}
?>