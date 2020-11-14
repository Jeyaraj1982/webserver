<?php
$allowedExts = array("jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);           
if ((($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo json_encode(array("success"=>"0","msg"=>"file error"));
    } else {
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);                
        if (move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$filename)) {
            echo json_encode(array("success"=>"1","filename"=>$filename));
        } else {
            echo json_encode(array("success"=>"0","msg"=>"file upload failed"));
        }
    }
} else {
    echo json_encode(array("success"=>"0","msg"=>"please upload less than 2mb"));
}
?>