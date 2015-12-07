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
			@yield('corps')
		</div>
	</body>
</html>