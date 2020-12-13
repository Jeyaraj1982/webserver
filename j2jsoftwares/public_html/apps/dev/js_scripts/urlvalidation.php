<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Makes "field" required and a url.</title>
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
 
</head>
<body>
<form id="myform">
<label for="field">Required, URL: </label>
<input class="left" id="field" name="field">
<br/>
<input type="submit" value="Validate!">
</form>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#myform" ).validate({
  rules: {
    field: {
      required: true,
      url: true
    }
  }
});
</script>
</body>
</html>
