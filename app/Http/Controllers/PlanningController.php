<?php

namespace App\Http\Controllers;

use Request;
use App\Tournament;
use App\Equipe;
use App\Match;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Input;

class PlanningController extends Controller
{

    /**
    *   Affichage du planning
    *
    *   paramètre : id du tournoi
    *   return : tournoi
    **/
    public function showPlanning($id)
    {
        $tournament = Tournament::with('equipes')->find($id);

        // Si c'est un tournoi à élimination direct
        if($tournament->typeTournoi == 1) 
        {
            return view('Pages.treeTournament')->with('qualifiedTeam', $tournament->equipes->pluck('nom'));
        }

        $groupes = $this->createGroups($tournament->equipes, $tournament);
        $games = $this->generateMatchs($groupes, $tournament);
        $newGames = array();
        
        foreach($games as $game)
        {
            $match = Match::firstOrCreate($game);
            $game['score1'] = $match->score1;
            $game['score2'] = $match->score2;
            array_push($newGames, $game);
        }
        
        return view('Pages.showPlanning')->with('games', $newGames)->with('tournament', $tournament);
    }

    /* Sauvegarde du résultat du match */
    public function saveGameData(Request $request)
    {
        if(Request::ajax())
        {
            $data = Input::all();

            unset($data['_token']);
            unset($data['score1']);
            unset($data['score2']);
            unset($data['heureMatchDebut']);
            unset($data['heureMatchFin']);

            $match = Match::firstOrNew($data);

            $match->fill(Input::all());
            $match->save();
        }
        return 'Score enregistré';
    }

    /* Création des groupes */
    private function createGroups($teams, $tournament)
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

    /* Génération des matchs à jouer */
    private function generateMatchs($groupes, $tournament)
    {
        $nbOfGroupes = count($groupes);
        $matchs = array();
        $table = array();

        /* Add a fictive team for having a pair number of team */
        if($tournament->nbEquipe % 2 != 0)
        {
            for($i=0; $i < $nbOfGroupes; $i++)
            {
                if (count($groupes[$i])%2 == 0)
                {
                    array_push($groupes[$i],"forfait");
                    break;
                }
            }
        }

        /* Count the number of matchs */
        $nbOfMatchs = 0;

        for($i=0; $i < $nbOfGroupes; $i++)
        {
            $nbOfMatchs += (count($groupes[$i]) * (count($groupes[$i]) - 1)) / 2;
        }

        /* Count the number of rounds */
        $nbOfRound = ceil($nbOfMatchs / $tournament->nbTerrain);

        $games = $this->createCombinaison($groupes);
        $hours = $this->generateHours($tournament, $nbOfRound);

        $indiceMatch = 0;
        $assocMatch = array();

        for($i=0; $i < $nbOfRound; $i++)
        {
            $hourEndNextGame = strtotime($hours[$i]) + (60 * $tournament->tempsMatch);
            $table[$i][0] = $hours[$i] . " - " . date("H:i", $hourEndNextGame);

            for($j = 0 ; $j < $tournament->nbTerrain; $j++)
            {
                if(in_array("forfait", $games[$indiceMatch]))
                {
                    $indiceMatch++;
                    if($indiceMatch >= count($games))
                    {
                        break 2;
                    }
                }

                $game = $games[$indiceMatch]; 

                array_push($assocMatch, array('equipe1' => $game[0], 'equipe2' => $game[1], 'tournament_id' => $tournament->id, 
                                              'groupe' => $game[2],
                                              'heureMatchDebut' => $hours[$i],
                                              'heureMatchFin' => date("H:i", $hourEndNextGame)));

                $indiceMatch++;
                if($indiceMatch >= count($games))
                {
                    break 2;
                }

            }
        }
        return $assocMatch;
    }

    /* Génération des heures de matchs */
    private function generateHours($tournament, $nbOfRound)
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

    /* Trouver les combinaison possible pour les matchs de groupes */
    private function createCombinaison($groups)
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
        return $this->generateMatchsCalendar($groups, $arrayCombin);
    }

    /* Génération du calendrier des matchs */
    private function generateMatchsCalendar($groups, $arrayCombin)
    {
        $matchs = array();

        $newArrayCombin = $this->sortOrderGame($arrayCombin);
        
        foreach($newArrayCombin as $combin)
        {
            $c = explode(";", $combin);

            foreach ($groups as $group) 
            {
                $numGroupe = array_search($group, $groups) + 1;
                array_push($matchs, array($group[$c[0]], $group[$c[1]], $numGroupe));
            }
        }

        return $matchs;
    }

    /* Combinaison des matchs */
    private function sortOrderGame($arrayCombin)
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
}
