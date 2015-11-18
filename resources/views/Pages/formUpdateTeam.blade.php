@extends('app')

@if ($errors->any())
	{{--*/ $nom = Input::get('nom') /*--}}
	{{--*/ $capitaine  =  Input::get('capitaine') /*--}}
	{{--*/ $adresse = Input::get('adresse') /*--}}
	{{--*/ $ville = Input::get('ville') /*--}}
	{{--*/ $npa = Input::get('npa') /*--}}
	{{--*/ $email = Input::get('email') /*--}}
	{{--*/ $telephone = Input::get('nbGroupe') /*--}}
@endif

@section('contentTitle')
	Modification de l'équipe : {{ $nom }}
@stop

@section('content')
	@if ($errors->any())
		<ul class="alert-danger">
	        @foreach($errors->all() as $e)
		        <li>{{ $e }}</li>
	        @endforeach
		</ul>		
	@endif

	{!! Form::open(['url' => '/updateTeam/'.$id]) !!}
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

		<div class="form-group">
			{!! Form::submit('Modifier équipe', ['class' => 'btn-primary form-control']) !!}
		</div>
		
		{!! Form::input('hidden', 'id',  $id ) !!}

	{!! Form::close() !!}
@stop