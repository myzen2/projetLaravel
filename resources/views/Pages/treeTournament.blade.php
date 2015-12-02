@extends('app')
@section('contentTitle')
		Arbre de tournoi
@stop
{{ HTML::script('site/jquery-1.6.2.min.js',array('type' => 'text/javascript')) }}
{{ HTML::script('site/jquery-1.6.2.min.js',array('type' => 'text/javascript')) }}
{{ HTML::script('site/jquery-ui-1.8.16/jquery-ui-1.8.16.custom.min.js',array('type' => 'text/javascript')) }}
{{ HTML::script('site/jquery.json-2.2.min.js',array('type' => 'text/javascript')) }}
{{ HTML::script('site/syntaxhighlighter_3.0.83/scripts/shCore.js',array('type' => 'text/javascript')) }}
{{ HTML::script('site/syntaxhighlighter_3.0.83/scripts/shBrushXml.j',array('type' => 'text/javascript')) }}
{{ HTML::script('site/syntaxhighlighter_3.0.83/styles/shCoreDefault.css',array('stylesheet' => 'text/css')) }}
{{ HTML::script('site/jquery-ui-1.8.16/css/ui-lightness/jquery-ui-1.8.16.custom.css',array('stylesheet' => 'text/css')) }}
{{ HTML::script('site/jquery.bracket-site.css',array('stylesheet' => 'text/css')) }}
{{ HTML::script('jquery-bracket/dist/jquery.bracket.min.css',array('stylesheet' => 'text/css')) }}
{{ HTML::script('jquery-bracket/dist/jquery.bracket.min.js',array('stylesheet' => 'text/css')) }}
 
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

<div id="save">
  <script type="text/javascript">
  console.log("test");
  var saveData = {
      teams : [
        ["Team 1", "Team 2"], /* first matchup */
        ["Team 3", "Team 4"]  /* second matchup */
      ],
      results : [[1,0], [2,7]]
    }

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

      var data = container.bracket('data')
      $('#dataOutput').text(jQuery.toJSON(data))
    })
  </script>
</div>
@stop
<script type="text/javascript">
$(function() {
    var big = $('#big div.demo')
    big.scrollLeft(big.width())

    $('pre.html').addClass('brush: html;')
    $('pre.js').addClass('brush: js;')
    SyntaxHighlighter.defaults['gutter'] = false
    SyntaxHighlighter.defaults['auto-links'] = false
    SyntaxHighlighter.all('code')
  })
</script>