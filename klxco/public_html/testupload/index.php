<!DOCTYPE html>
<html>
<head>
	<title>How to upload Multiple Image files with jQuery AJAX and PHP</title>

	<script type="text/javascript" src='jquery-3.4.1.min.js'></script>

	<style type="text/css">
	#preview img{
		margin: 5px;
	}
	</style>
</head>
<body>


	<form method='post' action='' enctype="multipart/form-data">
		<input type="file" id='files' name="files[]" multiple><br>
		<input type="button" id="submit" value='Upload'>
	</form>

	<!-- Preview -->
    <div id="previews">
    
    </div>
	<div id='preview'></div>

	<!-- Script -->
	<script type="text/javascript">
    var img_count=0;
	$(document).ready(function(){

		$('#submit').click(function(){

			var form_data = new FormData();
            var p="";
			// Read selected files
            var totalfiles = document.getElementById('files').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
                img_count++;
                p += "<div id='img"+index+"' style='border:1px solid #ccc;height:100px;width:100px;float:left;margin-right:5px;margin-bottom:5px;'></div>";
            }
           $('#previews').html(p);
            // AJAX request
            $.ajax({
                url: 'https://klx.co.in/testupload/ajaxfile.php',
               	type: 'post',
               	data: form_data,
               	dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                   	
                   	for(var index = 0; index < response.length; index++) {
					    var src = response[index];

					    // Add img element in <div id='preview'>
					    //$('#preview').append('<img src="https://klx.co.in/testupload/'+src+'" width="200px;" height="200px">');
                        $('#img'+index).html('<img src="https://klx.co.in/testupload/'+src+'" width="100px;" height="100px">')
					}
                   	
                }
            });
		});
	});
	</script>
</body>
</html>