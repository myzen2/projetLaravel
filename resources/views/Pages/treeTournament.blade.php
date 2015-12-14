<!--
    Auteurs : Assunçao Jeshon, Burri Bastien, Di Stasio Leonardo
    
    Page d'affichage de l'arbre pour la suite du tournoi
-->

@extends('appWithMenu')

@section('contentTitle')
  Arbre du tournoi
@stop

@section('menu')
  <nav class="col-sm-2">          
    <ul class="nav nav-pills nav-stacked">
          <li> <a href="/"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
          <li class="active"> <a href="" title="Manager tournoi"> <span class="glyphicon glyphicon-pencil"></span> Gestion des tournois </a> </li>
      </ul>
  </nav>
@stop


@section('content')
<div id="save" style="color:#0000FF">

  <?php $ar = $qualifiedTeam; ?>

  <script type="text/javascript">
      var ar = <?php echo json_encode(ArrayToTreeArray($ar)); ?>;
      var saveData = { teams : ar}

      function saveFn(data, userData) {
        var json = jQuery.toJSON(data)
        $('#saveOutput').text('POST '+userData+' '+json)
      }

      $(function() {
          var container = $('div#save .direct')
          container.bracket({
            init: saveData,
            save: saveFn,
            userData: "http://myapi"})

          /* You can also inquiry the current data */
          var data = container.bracket('data')
          $('#dataOutput').text(jQuery.toJSON(data))
        })
  </script>

<?php
  function ArrayToTreeArray($array)
  {
    $x=0;
    $SizeArray = sizeof($array);

    while(pow(2, $x) < sizeof($array))
    {
        $x++;
        $sol = pow(2, $x) - sizeof($array); //nombre de forfait à insérer
    }
      
    if($sol % 2 != 0)
    {
      $sol--;
      $nbforfeitgauche= $sol / 2;
      $sol++;
    }
    else
    {
      $nbforfeitgauche = $sol / 2;  
    }

    $nbforfeitdroit = $sol - $nbforfeitgauche;
    $inserted = array('BYE');
    
    for($i=0;$i<$nbforfeitgauche;$i++)
    {
       array_splice($array,2*$i,0,$inserted);
    }
    
    for($i=0;$i<$nbforfeitdroit;$i++)
    {
      array_splice($array,sizeof($array)-2*$i,0,$inserted);
    }

    for($i=0;$i<sizeof($array)/2;$i++)
    {
      for($j=0;$j<2;$j++)
      {
        $return[$i][$j]=$array[2*$i+$j];
      }
    }
    return $return;
  }
?>

</div>
@stop