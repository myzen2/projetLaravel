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
	$matchs = array();
	$table = array();

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

	$games = createCombinaison($groupes);
	$hours = generateHours($tournament, $nbOfRound);

	print_r($games);

	/* Generate the matchs round by round*/
	/*$indexGroupe=0;

	for($i=0; $i < $nbOfRound; $i++)
	{
		$hourEndNextGame = strtotime($hours[$i]) + (60 * $tournament->tempsMatch);
		$table[$i][0] = $hours[$i] . " - " . date("H:i", $hourEndNextGame);

		for($j=0; $j < $tournament->nbTerrain; $j++)
		{
			/*$matchs[$i][$j]['Home'] = ...;
			$matchs[$i][$j]['Away'] = ...;

			$table[$i][$j+$j+1] = "Round :" . $i . " Terrain :" . $j . " Match du groupe :" . $indexGroupe ;
			
			$table[$i][$j+$j+2] = "<input type='number' name='matchIDHome' min='0' max='100'>";
			$table[$i][$j+$j+2] .= "-";
			$table[$i][$j+$j+2] .= "<input type='number' name='matchIDAway' min='0' max='100'>";;
		}

		$indexGroupe++;
		if($indexGroupe >= $nbOfGroupes)
		{
			$indexGroupe = 0;
		}
	}*/

	$indiceMatch = 0;

	for($i=0; $i < $nbOfRound; $i++)
	{
		$hourEndNextGame = strtotime($hours[$i]) + (60 * $tournament->tempsMatch);
		$table[$i][0] = $hours[$i] . " - " . date("H:i", $hourEndNextGame);

		for($j = 0 ; $j < $tournament->nbTerrain; $j++)
		{
			if(in_array("forfait", $games[$indiceMatch]))
				$indiceMatch++;
			
			$game = $games[$indiceMatch]; 

			$table[$i][$j+$j+1] = $game[0] . ' - ' . $game[1];
			
			$table[$i][$j+$j+2] = "<input type='number' name='matchIDHome' min='0' max='100'>";
			$table[$i][$j+$j+2] .= "-";
			$table[$i][$j+$j+2] .= "<input type='number' name='matchIDAway' min='0' max='100'>";

			$indiceMatch++;
		}
	}

	return $table;
}

function generateHours($tournament, $nbOfRound)
{
	$hours = array();

	$hours[0] = $tournament->heureDebutTournoi;

	for($i=1; $i < $nbOfRound; $i++)
	{	
		$totalMinutes = 60 * ($tournament->tempsMatch + $tournament->tempsEntreMatch);
		$hourNextGame = strtotime($hours[$i-1]) + $totalMinutes;

		if($hourNextGame >= $tournament->pauseDebut && $hourNextGame < $tournament->pauseFin)
		{
			$hourNextGame = strtotime($tournament->pauseFin);
		}

		$hours[$i] = date("H:i", $hourNextGame);		
	}

	return $hours;
}

function createCombinaison($groups)
{
	if(count($groups) == 0)
		return;

	$sizeGroup = count($groups[0]);

	$arrayCombin = array();

	for($i = 0; $i < $sizeGroup; $i++)
	{
		for($j = 0; $j < $sizeGroup; $j++)
		{
			if($i != $j)
			{
				if(!in_array($j . ';' . $i, $arrayCombin))
					array_push($arrayCombin, $i . ';' . $j);
			}
		}
	}

	return generateMatchsCalendar($groups, $arrayCombin);
}

function generateMatchsCalendar($groups, $arrayCombin)
{
	$matchs = array();

	$newArrayCombin = sortOrderGame($arrayCombin);

	foreach($newArrayCombin as $combin)
	{
		$c = explode(";", $combin);

		foreach ($groups as $group) 
		{
			array_push($matchs, array($group[$c[0]], $group[$c[1]]));
		}
	}

	return $matchs;
}

function sortOrderGame($arrayCombin)
{
	$newArrayCombin = array();
	for($i = 0; $i < count($arrayCombin) / 2; $i++)
	{
		$lastIndice = count($arrayCombin) - $i - 1;

		array_push($newArrayCombin, $arrayCombin[$i]);

		if(isset($arrayCombin[$lastIndice]))
			array_push($newArrayCombin, $arrayCombin[$lastIndice]);
	}

	return $newArrayCombin;
}
?>