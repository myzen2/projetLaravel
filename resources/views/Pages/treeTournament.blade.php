
@extends('app')

@section('content')
<div id="save" style="color:#0000FF">
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