@extends('app')
@section('corps')
<header class="row col-sm-12">
	<div class="page-header">
		<h1>Générateur de tournoi  <img src="{{ asset('sportsIcon.png') }}" class="pull-right" height="50px"></h1>
	</div>
</header>

<!-- Contenu central de la page (menu et contenu) -->
<div class="row col-sm-12">
	<!-- Contenu avec titre -->
	<section class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">@yield('contentTitle')</h3>
		    </div>
			<div class="panel-body">
				@yield('content')
		    </div>
		</div>
	</section>
</div>

<!-- Pied de page -->
<footer class="row col-sm-12">
	<div class="panel panel-body">
		<p>Tous droits réservés par Dista, Jesh et Burri</p>
	</div>
</footer>
@stop