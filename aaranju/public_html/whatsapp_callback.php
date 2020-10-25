 <?php
function writeTxt($text) {
    $file = "wp".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}
writeTxt("get: ".json_encode($_GET));
writeTxt("post: ".json_encode($_POST));
?>