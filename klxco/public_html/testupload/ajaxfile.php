<?php 

// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "/home/klxco/public_html/testupload/uploads/";
$upload_location = "uploads/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

	// File name
	$filename = $_FILES['files']['name'][$index];

	// Get extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Valid image extension
    $valid_ext = array("png","jpeg","jpg");

    // Check extension
    if(in_array($ext, $valid_ext)){

    	// File path
    	$path = $upload_location.$filename;

        // Upload file
		if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
			$files_arr[] = $path;
		}
    }
			   	
}

echo json_encode($files_arr);
die;