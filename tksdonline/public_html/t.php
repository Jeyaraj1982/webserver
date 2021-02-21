<?php     
    
 function writeTxt($text) {
    $file = "track".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}

writeTxt(json_encode($_GET));
writeTxt(json_encode($_POST));
writeTxt(json_encode($_SERVER));
writeTxt(json_encode($_REQUEST));
writeTxt(json_encode($_ENV));
writeTxt(json_encode($_COOKIE));
 
  
?>