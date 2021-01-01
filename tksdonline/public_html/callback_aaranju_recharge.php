<?php
include_once("admin/config.php"); 
function writeTxt($text) {
    $file = "arranjulapu". date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}
$_GET['yourref']=$_GET['uid'];
$application->reverseRecharge($_GET);
?>