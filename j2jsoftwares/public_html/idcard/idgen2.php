<?php
$f = "idnumber.php";
if(!file_exists($f)){
    touch($f);
    $handle =  fopen($f, "w" ) ;
    fwrite($handle,date("y")."00000") ;
    fclose ($handle);
}
$handle = fopen($f, "r");
$idnumber = ( int ) fread ($handle,20) ;
fclose ($handle) ;
$idnumber++ ;
$handle =  fopen($f, "w" );
fwrite($handle,$idnumber);
fclose ($handle);

$iddir = 'cards';

$customer_name= strtoupper("S ANTONEY IRUDHAYA JEYA"); //24 character
$idnumber = "GGC9944872965";
$card_value="2000";
$coupon_number="ABCDEFGHIJABCDEAB";//17 charactors
$barcode_number="1234567890";//17 charactors
$qr_value = "abcdefghijkl";

$profileimage = 'img/blend.jpg';   // QT Code Image
$font_size = 13;               // Font size is in pixels.
$font_file = 'img/fb.otf';         // path to your font file
$img = 'final.png';            // path to temporary image

// path & name of the image to save on server
$img2 = $iddir.'/'.strtolower(preg_replace('#[^0-9a-zA-z]#','',$coupon_number)).'.png'; 

//creates 'cards' folder if not exists
if(!file_exists($iddir)){
    mkdir($iddir, 0777, true);
}

 /* QR Code Generate */
                       
  $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode'.DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
  $PNG_WEB_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode'.DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
  
  // $PNG_TEMP_DIR = 'phpqrcode/temp/';
  // $PNG_WEB_DIR = 'phpqrcode/temp/';
   include "phpqrcode/qrlib.php"; 
   
   $filename = $PNG_TEMP_DIR.$qr_value.'.png';
   $errorCorrectionLevel = 'L';
   $matrixPointSize = 4;
   $qr_filename = $qr_value."_".md5($qr_value.'|'.$errorCorrectionLevel.'|'.$matrixPointSize.'|'.time()).'.png';
   $filename = $PNG_TEMP_DIR.$qr_filename;
   QRcode::png($qr_value, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
   //echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
  $profileimage = "phpqrcode/temp/".$qr_filename;   // QT Code Image     
 
 /* End of QR Code Generate */



/* bar code */

// For demonstration purposes, get pararameters that are passed in through $_GET or set to the default value
include_once("barcode/barcode2.php");
$barcode_filename = $barcode_number."_".md5($barcode_number.'|'.time()).'.png';
$filepath = "barcode/temp/".$barcode_filename;
$text = $barcode_number;
$size = 300;
$orientation = (isset($_GET["orientation"]) ? $_GET["orientation"] : "horizontal");
$code_type = (isset($_GET["codetype"]) ? $_GET["codetype"] : "code128");
$print = (isset($_GET["print"]) && $_GET["print"] == 'true' ? true : false);
$sizefactor = (isset($_GET["sizefactor"]) ? $_GET["sizefactor"] : "1");

// This function call can be copied into your project and can be made from anywhere in your code
barcode($filepath, $text, $size, $orientation, $code_type, $print, $sizefactor);
/* */



















$virtualprofile = imagecreatefrompng($profileimage);
list($profilewid, $profilehayt) = getimagesize($profileimage);
$newprofilewid = 150;
$newprofilehayt = 150;
$destination = imagecreatetruecolor($newprofilewid, $newprofilehayt);
imagecopyresampled($destination, $virtualprofile, 0, 0, 0, 0, $newprofilewid, $newprofilehayt, $profilewid, $profilehayt);
imagejpeg($destination, 'tmp.jpg', 100);
$backgroundimage = imagecreatefrompng('img/idcard_background.png');// Load the stamp and the photo to apply the watermark to
$profilestamp = imagecreatefromjpeg('tmp.jpg'); // First we create our stamp image manually from GD
$marge_right = 70;// 307;
$marge_bottom = 48; //44;
$sx = imagesx($profilestamp);
$sy = imagesy($profilestamp);
$xcoordest = imagesx($backgroundimage) - $sx - $marge_right;
$ycoordest = imagesy($backgroundimage) - $sy - $marge_bottom;
imagecopymerge($backgroundimage, $profilestamp, $xcoordest, $ycoordest, 0, 0, $sx, $sy, 100);


$virtualprofile = imagecreatefrompng($filepath);
imagecopymerge($backgroundimage, $virtualprofile, 70, 450, 0, 0, 300, 65, 100);
 
imagepng($backgroundimage, 'final.png');
imagedestroy($backgroundimage);

$im = imagecreatefrompng($img); // get the image in php
$textcolor = imagecolorallocate($im, 125, 4, 91); // text color //#7D045B
                              
// Get image Width and Height of Temporary Image
$image_width = imagesx($im);  
$image_height = imagesy($im);

imagettftext($im, 20, 0, 280, 116, $textcolor, $font_file, $customer_name); // Add Name to image:
imagettftext($im, 20, 0, 280, 178, $textcolor, $font_file, $idnumber); // Add ID Number to image:
imagettftext($im, 35, 0, 205, 370, $textcolor, $font_file, $card_value); // Add ID Number to image:
imagettftext($im, 25, 0, 625, 360, $textcolor, $font_file, $coupon_number); // Add ID Number to image:

imagepng($im, $img2, 9); // save the image on server
imagedestroy($im); // Destroy image in memory to free-up resources:

//unlink('final.png');//Remove Temporary Background Image
//unlink('tmp.jpg');//Remove Temporary Profile Image
?>