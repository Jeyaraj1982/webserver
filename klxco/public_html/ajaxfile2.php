<?php 
   include_once("config.php");
  

// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "assets/videoads/";
$upload_location = "assets/videoads/";

// To store uploaded files path
$files_arr = array();
$result = array();

// Loop all files

for($index = 0;$index < $countfiles;$index++){
     $temp = array();
    // File name
    $filename = $_FILES['files']['name'][$index];

    // Get extension
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Valid image extension
    $valid_ext = array("mp4");
    // Check extension
    if(in_array($ext, $valid_ext)){

        // File path
        $filename = strtolower(time()."_".$filename);
        $path = $upload_location.$filename;

        // Upload file
        
        if($_FILES['file']['size'] <= 10097000) { //10 MB (size is also in bytes)
            if (move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
           
$nfilename =  $filename;  
               
                $temp = array("error"=>"0","filename"=>$nfilename);
            } else {
                $temp = array("error"=>"1","message"=>"Upload Error:".$_FILES['files']['name'][$index]);
            }
        } else {
            $temp = array("error"=>"1","message"=>"Upload Error: File size execeded. allow maximum 5mb per file".$_FILES['files']['name'][$index]);
        }
    } else {
         $temp = array("error"=>"1","message"=>"Upload Error: please choose a mp4 file".$_FILES['files']['name'][$index]);
    }
   $result[]=$temp;                
}

echo json_encode($result);
die;