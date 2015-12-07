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
			// create an array of teams
			$members = array();
			$i = 0;
			foreach ($teams as $team) {
				$members[$i] =  $team['nom'];
				$i++;
			}

			// Split our array of team on a array of groupes of teams
			$groupes = array_chunk($members, ceil($tournament->nbEquipe / $tournament->nbGroupe));

			// Generate the matchs
			/*for($i=1; $i <= sizeof($groupes); $i++)
			{
				// do the rounds
				$rounds = createRounds($groupes[$i - 1]);
				$table="";

				print_r($rounds);

				foreach($rounds as $round => $games){
				    $table .= "<tr><th colspan='3'>Round ".($round+1).", Groupe ".$i."</th></tr>\n";
				    foreach($games as $play){
				       $table .= "<tr><td>Heure</td><td>".$play["Home"]." VS ".$play["Away"]."</td><td>Score</td></tr>\n";
				    }
				}

				echo $table;
			}*/

			$matchTours = array();
			for($i=0; $i < sizeof($groupes); $i++)
			{
				// do the rounds
				$rounds = createRounds($groupes[$i]);

				for($j = 0; $j < sizeof($rounds); $j++)
				{
					if(empty($matchTours[$j]))
						$matchTours[$j] = array();
					array_push($matchTours[$j], $rounds[$j]);
				}
			}

			foreach($matchTours as $groupes)
			{
				foreach ($groupes as $matchs) 
				{
					echo '<tr>';
					foreach($matchs as $match)
					{
						echo "<td>Heure</td><td>".$match["Home"]." VS ".$match["Away"]."</td><td>Score</td>\n";
					}
					echo '</tr>';
				}
			}
			?>
		</table>
	</div>
@stop



<?php
function createRounds( array $teams ){

    if (count($teams)%2 != 0){
        array_push($teams,"forfait");
    }
    $away = array_splice($teams,(count($teams)/2));
    $home = $teams;
    for ($i=0; $i < count($home)+count($away)-1; $i++)
    {
        for ($j=0; $j<count($home); $j++)
        {
            $round[$i][$j]["Home"]=$home[$j];
            $round[$i][$j]["Away"]=$away[$j];
        }
        if(count($home)+count($away)-1 > 2)
        {
            $s = array_splice( $home, 1, 1 );
            $slice = array_shift( $s  );
            array_unshift($away,$slice );
            array_push( $home, array_pop($away ) );
        }
    }
    return $round;
}
?>
