@extends('app')

@section('content')

<h1>Bonjour</h1>
<p>
Bienvenue sur notre site. Avec nous, créez et gérez rapidement et facilement votre manifestation sportive.
</p>

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
