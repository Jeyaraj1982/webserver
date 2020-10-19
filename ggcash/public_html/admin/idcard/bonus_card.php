<?php
$customer_name= strtoupper($_POST['customer_name']);
$card_value= $_POST['card_value'];
$date_from= $_POST['date_from'];
$date_to= $_POST['date_to'];
$scheme_name= $_POST['scheme_name'];
$coupon_number= $_POST['coupon_number'];
$barcode_number= $coupon_number;
$qr_value = $_POST['qr_value'];
$result_filename= $_POST['file_name'];

$font_size = 13;               // Font size is in pixels.
$font_file = 'img/fb.otf';         // path to your font file
$img = 'bonus_card.png';            // path to temporary image
$img2 = '../assets/bonus_cards/'.$result_filename; 

$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode'.DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode'.DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
include "phpqrcode/qrlib.php"; 
$filename = $PNG_TEMP_DIR.$qr_value.'.png';
$errorCorrectionLevel = 'L';
$matrixPointSize = 4;
$qr_filename = $qr_value."_".md5($qr_value.'|'.$errorCorrectionLevel.'|'.$matrixPointSize.'|'.time()).'.png';
$filename = $PNG_TEMP_DIR.$qr_filename;
QRcode::png($qr_value, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
$profileimage = "phpqrcode/temp/".$qr_filename;   // QT Code Image     
  
include_once("barcode/barcode.php");
$barcode_filename = $barcode_number."_".md5($barcode_number.'|'.time()).'.png';
$filepath = "barcode/temp/".$barcode_filename;
$text = $barcode_number;
$size = 300;
$orientation = (isset($_GET["orientation"]) ? $_GET["orientation"] : "horizontal");
$code_type = (isset($_GET["codetype"]) ? $_GET["codetype"] : "code128");
$print = (isset($_GET["print"]) && $_GET["print"] == 'true' ? true : false);
$sizefactor = (isset($_GET["sizefactor"]) ? $_GET["sizefactor"] : "1");
barcode($filepath, $text, $size, $orientation, $code_type, $print, $sizefactor);

$virtualprofile = imagecreatefrompng($profileimage);
list($profilewid, $profilehayt) = getimagesize($profileimage);
$newprofilewid = 145;
$newprofilehayt = 145;
$destination = imagecreatetruecolor($newprofilewid, $newprofilehayt);
imagecopyresampled($destination, $virtualprofile, 0, 0, 0, 0, $newprofilewid, $newprofilehayt, $profilewid, $profilehayt);
imagejpeg($destination, 'tmp.jpg', 100);
$backgroundimage = imagecreatefrompng('img/bonus_card.png');// Load the stamp and the photo to apply the watermark to
$profilestamp = imagecreatefromjpeg('tmp.jpg'); // First we create our stamp image manually from GD
$marge_right = 70;// 307;
$marge_bottom = 48; //44;
$sx = imagesx($profilestamp);
$sy = imagesy($profilestamp);
$xcoordest = imagesx($backgroundimage) - $sx - $marge_right;
$ycoordest = imagesy($backgroundimage) - $sy - $marge_bottom;
imagecopymerge($backgroundimage, $profilestamp, 780, 402, 0, 0, $sx, $sy, 100);
$virtualprofile = imagecreatefrompng($filepath);
imagecopymerge($backgroundimage, $virtualprofile, 150, 420, 0, 0, 280, 50, 100);
imagepng($backgroundimage, 'bonus_card.png');
imagedestroy($backgroundimage);
$im = imagecreatefrompng($img); // get the image in php
$textcolor = imagecolorallocate($im, 34, 33, 31); // text color //#7D045B
$image_width = imagesx($im);  
$image_height = imagesy($im);
imagettftext($im, 18, 0, 400, 190, $textcolor, $font_file, $customer_name); // Add Name to image:
imagettftext($im, 18, 0, 400, 235, $textcolor, $font_file, $coupon_number); // Add ID Number to image:

imagettftext($im, 18, 0, 400, 280, $textcolor, $font_file, $date_from); // Add ID Number to image:
imagettftext($im, 18, 0, 750, 280, $textcolor, $font_file, $date_to); // Add ID Number to image:

imagettftext($im, 18, 0, 400, 325, $textcolor, $font_file, $scheme_name); // Add ID Number to image:
imagettftext($im, 18, 0, 400, 372, $textcolor, $font_file, $card_value); // Add ID Number to image:
//imagettftext($im, 25, 0, 625, 360, $textcolor, $font_file, $coupon_number); // Add ID Number to image:
imagepng($im, $img2, 9); // save the image on server
imagedestroy($im); // Destroy image in memory to free-up resources:
//unlink('final.png');//Remove Temporary Background Image
//unlink('tmp.jpg');//Remove Temporary Profile Image
echo '<img src="'.$img2.'">';
?>