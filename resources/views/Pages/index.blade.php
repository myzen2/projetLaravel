<!-- 
	Auteurs : Assunçao Jeshon, Burri Bastien, Di Stasio Leonardo

	Page d'accueil, création d'un tournoi
-->

@extends('appWithMenu')

@section('menu')
	<nav class="col-sm-2">          
		<ul class="nav nav-pills nav-stacked">
	        <li class="active"> <a href=""> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
	        <li> <a href="listAllTournaments" title="Manager tournoi"> <span class="glyphicon glyphicon-pencil"></span> Gestion des tournois </a> </li>
	  	</ul>
	</nav>
@stop

@section('contentTitle')
	Bonjour !
@stop

@section('content')
	<p>Bienvenue sur notre site. Avec nous, créez et gérez rapidement et facilement votre manifestation sportive.</p>

	{!! Form::open(['url' => '']) !!}
		<div class="form-group">
			{!! Form::label('nom', 'Nom du tournoi') !!}
			{!! Form::text('nom', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Créer tournoi', ['class' => 'btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@stop
