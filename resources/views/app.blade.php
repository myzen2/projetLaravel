<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Générateur de tournoi</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('style_print.css') }}" media="print">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('functionJS.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tree/site/jquery-1.6.2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tree/site/jquery-ui-1.8.16/jquery-ui-1.8.16.custom.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tree/site/jquery.json-2.2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tree/site/syntaxhighlighter_3.0.83/scripts/shCore.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tree/site/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tree/site/syntaxhighlighter_3.0.83/scripts/shBrushXml.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('tree/site/syntaxhighlighter_3.0.83/styles/shCoreDefault.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('tree/site/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('tree/site/jquery.bracket-site.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('tree/jquery-bracket/dist/jquery.bracket.min.css') }}" />
	<script type="text/javascript" src="{{ asset('tree/jquery-bracket/dist/jquery.bracket.min.js') }}"></script>

	<script type="text/javascript">
	$(function() {
	    var demos = ['save']
	    $.each(demos, function(i, d){
	      var demo = $('div#'+d)
	      $('<div class="direct"></div>').appendTo(demo)
	    })
	  })
	</script>
</head>
	<body>
		<div class="container">

			<header class="row col-sm-12">
	        	<div class="page-header">
	          		<h1>Générateur de tournoi  <img src="{{ asset('sportsIcon.png') }}" class="pull-right" height="50px"></h1>
	        	</div>
	      	</header>

	      	<!-- Contenu central de la page (menu et contenu) -->
	      	<div class="row col-sm-12">
				@yield('menu') <!-- Template menu -->

				<!-- Contenu avec titre -->
				<section class="col-sm-10">
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

		</div>
	</body>
</html>