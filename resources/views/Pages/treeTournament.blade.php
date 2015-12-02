
@extends('app')
<!--[if ie]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery Bracket</title>
<meta name="description" content="jQuery plugin for visualizing and editing single and double elimination tournament brackets" />
<script type="text/javascript" src="../tree/site/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../tree/site/jquery-ui-1.8.16/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="../tree/site/jquery.json-2.2.min.js"></script>
<script type="text/javascript" src="../tree/site/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
<script type="text/javascript" src="../tree/site/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="../tree/site/syntaxhighlighter_3.0.83/scripts/shBrushXml.js"></script>
<link rel="stylesheet" type="text/css" href="../tree/site/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
<link rel="stylesheet" type="text/css" href="../tree/site/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css" />
<link rel="stylesheet" type="text/css" href="../tree/site/jquery.bracket-site.css" />
<link rel="stylesheet" type="text/css" href="../tree/jquery-bracket/dist/jquery.bracket.min.css" />
<script type="text/javascript" src="../tree/jquery-bracket/dist/jquery.bracket.min.js"></script> 

<script type="text/javascript">
$(function() {
    var demos = ['save']
    $.each(demos, function(i, d){
      var demo = $('div#'+d)
      $('<div class="direct"></div>').appendTo(demo)
    })
  })
</script>

@section('content')
<div id="save" style="color:#0000FF">
	salut
  <script type="text/javascript">
  var saveData = {
      teams : [
        ["Team 1", "Team 2"], /* first matchup */
        ["Team 3", "Team 4"]  /* second matchup */
      ],
      results : [[1,0], [2,7]]
    }


	  /* Called whenever bracket is modified
   *
   * data:     changed bracket object in format given to init
   * userData: optional data given when bracket is created.
   */
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
</div>
@stop
@stop