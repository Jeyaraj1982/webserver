<?php
include_once("admin/config.php"); 
function writeTxt($text) {
    $file = date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}
if (sizeof($_GET)>0) {
writeTxt(json_encode($_GET));
writeTxt("updated: ". ($application->reverseRecharge($_GET)>0) ? "updated" : "notupdate");
echo "Updated";
} else {
writeTxt("Paramers may be empty");    
echo "Parameter Missing";
}
?>