<?php 
   include_once("config.php");
  

// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "assets/".$config['thumb']."/";
$upload_location = "assets/".$config['thumb']."/";

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
    $valid_ext = array("png","jpeg","jpg");

    // Check extension
    if(in_array($ext, $valid_ext)){

        // File path
        $filename = strtolower(time()."_".$filename);
        $path = $upload_location.$filename;

        // Upload file
        
        if($_FILES['file']['size'] <= 10097000) { //10 MB (size is also in bytes)
            if (move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
             
             $exten = explode(".",strtolower($path));
$stamp = imagecreatefrompng('script/logo.png');             
             
if ($exten[sizeof($exten)-1]=="png") {

$im = imagecreatefrompng($path);
}
if ($exten[sizeof($exten)-1]=="jpg" || $exten[sizeof($exten)-1]=="jpeg") {

$im = imagecreatefromjpeg($path);
}
  


$sx = imagesx($stamp);
$sy = imagesy($stamp);
 
$imgx = imagesx($im);
$imgy = imagesy($im);

$centerX=round($imgx/2)-round($sx/2);
$centerY=round($imgy/2)-round($sy/2);

$padding = 10;

$h="right";
$v="bottom";
if ($h=="left" && $v=="top")  {
imagecopy($im, $stamp, $padding, $padding, 0, 0, imagesx($stamp), imagesy($stamp));
}
if ($h=="left" && $v=="middle") {
imagecopy($im, $stamp, $padding, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));
}
if ($h=="left" && $v=="bottom")  {
imagecopy($im, $stamp, $padding, $imgy-$sy-$padding, 0, 0, imagesx($stamp), imagesy($stamp));
}


if ($h=="right" && $v=="top") {
imagecopy($im, $stamp, $imgx-$sx-$padding, $padding, 0, 0, imagesx($stamp), imagesy($stamp));
}
if ($h=="right" && $v=="middle") {
imagecopy($im, $stamp, $imgx-$sx-$padding, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));
}
if ($h=="right" && $v=="bottom") {
imagecopy($im, $stamp, $imgx-$sx-$padding, $imgy-$sy-$padding, 0, 0, imagesx($stamp), imagesy($stamp));
}


if ($h=="middle" && $v=="top") {
imagecopy($im, $stamp, $centerX, $padding, 0, 0, imagesx($stamp), imagesy($stamp));
}
if ($h=="middle" && $v=="bottom") {
imagecopy($im, $stamp, $centerX, $imgy-$sy-$padding, 0, 0, imagesx($stamp), imagesy($stamp));
}
if ($h=="middle" && $v=="middle") {
imagecopy($im, $stamp, $centerX, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));
}


//exec("convert -blur 0x07 j.png j1.png");

// Output and free memory
//imagepng($im,"j.png");
$nfilename = "_".time().$filename;

if ($exten[sizeof($exten)-1]=="png") {
imagepng($im,$upload_location.$nfilename);
}
if ($exten[sizeof($exten)-1]=="jpg" || $exten[sizeof($exten)-1]=="jpeg") {    
imagejpeg($im,$upload_location.$nfilename);
}
//header('Content-type: image/png');
//imagepng($im);
//imagedestroy($im);
//imagejpeg($im, $save_watermark_photo_address, 80)
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                                     
                
                
                
                
                
                
                
                
                
                
                
                //$files_arr[] = $filename;  
                $files_arr[] = $nfilename;  
                //$temp = array("error"=>"0","filename"=>$filename);
                $temp = array("error"=>"0","filename"=>$nfilename);
            } else {
                $temp = array("error"=>"1","message"=>"Upload Error:".$_FILES['files']['name'][$index]);
            }
        } else {
            $temp = array("error"=>"1","message"=>"Upload Error: File size execeded. allow maximum 5mb per file".$_FILES['files']['name'][$index]);
        }
    } else {
         $temp = array("error"=>"1","message"=>"Upload Error: File extension not support".$_FILES['files']['name'][$index]);
    }
   $result[]=$temp;                
}

echo json_encode($result);
die;