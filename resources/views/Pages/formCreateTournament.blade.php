<!-- 
	Auteurs : Assunçao Jeshon, Burri Bastien, Di Stasio Leonardo

	Page du formulaire pour la création ou modification de tournoi
-->

@extends('appWithoutMenu')

@if ($errors->any())
	{{--*/ $nom = Input::get('nom') /*--}}
	{{--*/ $lieu = Input::get('lieu') /*--}}
	{{--*/ $adresse = Input::get('adresse') /*--}}
	{{--*/ $date  =  Input::get('date') /*--}}
	{{--*/ $nbEquipe = Input::get('nbEquipe') /*--}}
	{{--*/ $typeTournoi = Input::get('typeTournoi') /*--}}
	{{--*/ $typeFinales = Input::get('typeFinales') /*--}}
	{{--*/ $nbGroupe = Input::get('nbGroupe') /*--}}
	{{--*/ $nbTerrain = Input::get('nbTerrain') /*--}}
	{{--*/ $heureDebutTournoi = Input::get('heureDebutTournoi') /*--}}
	{{--*/ $tempsMatch = Input::get('tempsMatch') /*--}}
	{{--*/ $tempsEntreMatch = Input::get('tempsEntreMatch') /*--}}
	{{--*/ $pauseDebut = Input::get('pauseDebut') /*--}}
	{{--*/ $pauseFin = Input::get('pauseFin') /*--}}
@endif

@section('contentTitle')
	Création du tournoi : {{ $nom }}
@stop

@section('content')
	@if ($errors->any())
		<ul class="alert-danger">
	        @foreach($errors->all() as $e)
		        <li>{{ $e }}</li>
	        @endforeach
		</ul>		
	@endif

	<!-- Formulaire de création / modification de tournoi -->

	{!! Form::open(['url' => 'createTournament']) !!}
		<div class="form-group">
			{!! Form::label('lieu', 'Lieu :') !!}
			{!! Form::text('lieu', $lieu, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('adresse', 'Adresse :') !!}
			{!! Form::text('adresse', $adresse, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('date', 'Date du tournoi :') !!}
			{!! Form::input('date', 'date', $date, array('class' => 'form-control')) !!}
		</div>

		@if(!isset($id))
			<div class="form-group" id="equipeBox">
				{!! Form::label('nbEquipe', 'Nombre d\'équipes :') !!}
				{!! Form::input('number', 'nbEquipe', $nbEquipe, array('min' => '2', 'max' => '32', 'onchange' => 'changeNbEquipe()', 'class' => 'form-control')) !!}
			</div>

			<div class="form-group">
				{!! Form::label('typeTournoi', 'Type de tournoi :') !!}
				{!! Form::select('typeTournoi', array('0' => "Tournoi avec groupe", '1' => 'Elimination direct'), $typeTournoi, array('onchange' => 'changeGroupe()', 'class' => 'form-control')) !!}
			</div>
		@endif

		<div class="form-group" id="inputGroupe">
			{!! Form::label('nbGroupe', 'Nombre de groupe :') !!}
			{!! Form::input('number', 'nbGroupe', $nbGroupe, array('min' => '2', 'max' => '24', 'class' => 'form-control')) !!}
		</div>

		<div class="form-group" id="inputTypeFinale">
			{!! Form::label('typeFinales', 'Type de finales :') !!}
			{!! Form::select('typeFinales', array('0' => "1/16", '1' => "1/8", '2' => "1/4", '3' => "1/2", '4' => "Finale"), $typeFinales, array('class' => 'form-control')) !!}
		</div>

		<div class="form-group" id="inputNbTerrains">
			{!! Form::label('nbTerrain', 'Nombre de terrains :') !!}
			{!! Form::input('number', 'nbTerrain', $nbTerrain, array('min' => '1', 'max' => '10', 'class' => 'form-control')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('heureDebutTournoi', 'Heure de début du tournoi :') !!}
			{!! Form::input('time', 'heureDebutTournoi',  $heureDebutTournoi, array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('tempsMatch', 'Temps de match :') !!}
			{!! Form::input('number', 'tempsMatch', $tempsMatch, array('min' => '1', 'max' => '45', 'class' => 'form-control')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('tempsEntreMatch', 'Temps de battement :') !!}
			{!! Form::input('number', 'tempsEntreMatch', $tempsEntreMatch, array('min' => '1', 'max' => '5', 'class' => 'form-control')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('pauseDebut', 'Pause :') !!}
			{!! Form::input('time', 'pauseDebut',  $pauseDebut, array('class' => 'form-control')) !!}
			à
			{!! Form::input('time', 'pauseFin', $pauseFin, array('class' => 'form-control')) !!}
		</div>

		<?php
			if(isset($id)) $btnType = 'Modifier tournoi';
			else $btnType = 'Créer tournoi';
		?>

		<div class="form-group">
			{!! Form::submit($btnType, ['class' => 'btn-primary form-control']) !!}
		</div>

		{!! Form::input('hidden', 'nom',  $nom ) !!}

		@if(isset($id))
			{!! Form::input('hidden', 'id',  $id ) !!}
		@endif

	{!! Form::close() !!}
@stop