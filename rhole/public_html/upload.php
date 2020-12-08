<?php
include_once("config.php");
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "error";
    } else {
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/".$config['thumb'].$filename)) {
            echo $filename;    
        } else {
            echo "error";
        }
    }
} else {
    echo "error";
}
?>