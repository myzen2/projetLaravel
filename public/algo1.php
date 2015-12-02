<?php
function algo1( array $teams ){

    if (count($teams)%2 != 0){
        array_push($teams,"forfeit");
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

<?php

// create an array of teams
$members = array('team1','team2','team3','team4', 'team5', 'team6', 'team7', 'team8', 'team9');

// do the rounds
$rounds = algo1($members);

$table = "<table>\n";
foreach($rounds as $round => $games){
    $table .= "<tr><th>Round: ".($round+1)."</th><th></th></tr>\n";
    foreach($games as $play){
       $table .= "<tr><td>".$play["Home"]."</td><td align=\"left\">-v-</td><td>".$play["Away"]."</td></tr>\n";
    }
}
$table .= "</table>\n";

echo $table;
?>