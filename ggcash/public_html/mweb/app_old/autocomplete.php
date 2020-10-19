 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="busticket.js"></script>
  <script>
    var resData = sourceCities;    
    var DresData = "";
    
    $( document ).ready(function() {
        
        $("#bookingfrom").autocomplete({
            source: function( request, response ) {
                        response($.map(resData, function(item) {
                            if (item.name.indexOf($('#bookingfrom').val()) == 0  ) {
                                return {label: item.name,id: item.id}; }
                            }));
                    },
            minLength : 1,
            select: function(event, ui) {
                $('#bookingfromid').val(ui.item.id);
                $('#bookingto').attr("placeholder","Loading Cities ....");
                $.ajax({url: "webservice.php?action=_getdestinationList&sourceList="+ui.item.id,
                    dataType: "json",
                    success: function(data) {
                        DresData = data;
                        $('#bookingto').attr("placeholder","To");
                        $("#bookingto").autocomplete({
                            source: function( request, response ) {
                                        $('#bookingtoid').val("");
                                        response($.map(DresData, function(item) {
                                            if (item.name.indexOf($('#bookingto').val()) == 0) {
                                                return {label: item.name,id: item.id}; 
                                            }
                                        }));
                            },
                            minLength: 1,
                            select: function(event, ui) {
                                $('#bookingtoid').val(ui.item.id);
                            }
                        });
                    }});
            }
        });   
    });
  </script>
</head>
<body>
      <input type="text" id="bookingfrom">
      <input type="text" id="bookingfromid">
      <input type="text" id="bookingto">
      <input type="text" id="bookingtoid">
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 
 
</body>
</html>