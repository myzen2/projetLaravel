@extends('appWithoutMenu')

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
				include(app_path() . '\..\public\functionPHP.php');
				$groupes = createGroups($teams, $tournament);
				$table = generateMatchs($groupes, $tournament);
			?>

			@foreach($table as $row)
			<tr>	
				@foreach ($row as $cell)
			   		<td><?php echo $cell; ?></td>
				@endforeach
			</tr>
			@endforeach
		</table>
	</div>
@stop
