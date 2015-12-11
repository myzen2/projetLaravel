<!-- 
	Auteurs : Assunçao Jeshon, Burri Bastien, Di Stasio Leonardo

	Formulaire de création et modification d'équipe
-->

@extends('appWithoutMenu')

@if ($errors->any())
	{{--*/ $nom = Input::get('nom') /*--}}
	{{--*/ $capitaine  =  Input::get('capitaine') /*--}}
	{{--*/ $adresse = Input::get('adresse') /*--}}
	{{--*/ $ville = Input::get('ville') /*--}}
	{{--*/ $npa = Input::get('npa') /*--}}
	{{--*/ $email = Input::get('email') /*--}}
	{{--*/ $telephone = Input::get('nbGroupe') /*--}}
	{{--*/ $tournament_id = Input::get('tournament_id') /*--}}
@endif

@section('contentTitle')
	@if(isset($id))
		Modification de l'équipe : {{ $nom }}
	@else
		Création d'une équipe
	@endif
@stop

@section('content')
	@if ($errors->any())
		<ul class="alert-danger">
	        @foreach($errors->all() as $e)
		        <li>{{ $e }}</li>
	        @endforeach
		</ul>		
	@endif

	<!-- Formulaire de création / modification d'équipe -->
	
	{!! Form::open(['url' => '/createTeam']) !!}
		<div class="form-group">
			{!! Form::label('nom', 'Nom :') !!}
			{!! Form::text('nom', $nom, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('capitaine', 'Capitaine :') !!}
			{!! Form::text('capitaine', $capitaine, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('adresse', 'Adresse :') !!}
			{!! Form::text('adresse', $adresse, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ville', 'Ville :') !!}
			{!! Form::text('ville', $ville, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('npa', 'NPA :') !!}
			{!! Form::text('npa', $npa, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-Mail :') !!}
			{!! Form::text('email', $email, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('telephone', 'Téléphone :') !!}
			{!! Form::text('telephone', $telephone, ['class' => 'form-control']) !!}
		</div>

		<?php
			/**
			*	Modification ou création d'équipe
			**/

			if(isset($id)) $btnType = 'Modifier équipe';
			else $btnType = 'Créer équipe';
		?>

		<div class="form-group">
			{!! Form::submit($btnType, ['class' => 'btn-primary form-control']) !!}
		</div>
		
		{!! Form::input('hidden', 'tournament_id',  $tournament_id ) !!}

		@if(isset($id))
			{!! Form::input('hidden', 'id',  $id ) !!}
		@endif

	{!! Form::close() !!}
@stop