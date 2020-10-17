<?php
include_once("config.php");
   $tads = $mysql->select("select * from _jpostads_deleted");
foreach($tads as $t) {
   if (strlen(trim($t['filepath1']))>5) {
        echo $t['filepath1'];
       $file = '/home/klxco/public_html/assets/cms/demo/thumb/'.$t['filepath1'];
        if (file_exists($file)) {
        echo "D<br>";
        unlink($file);
       }
       
    }

}
?>