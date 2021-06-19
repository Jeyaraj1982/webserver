<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
ini_set('memory_limit', '-1');

if (isset($_GET['action']) && $_GET['action']=="logout") {
    session_destroy();
    echo "<script>location.href='index.php';</script>";
    exit;
}

define("SITE_TITLE","LawOfficeManagement");
define("SITE_URL","https://admin.sbkamalanathan.com");
define("SERVER_PHYSICAL_PATH",__DIR__);     
define("SQL_LOG_PATH",__DIR__."/app/logs/");     

define("DHBOST","localhost");
define("DHUSER","aaranju_user");
define("DHPASS","mysqlPwd");
define("DHNAME","aaranju_lawoffice");

include_once(__DIR__."/app/controllers/class.DatabaseController.php");
$mysql = new MySqldatabase(DHBOST,DHUSER,DHPASS,DHNAME);

include_once(__DIR__."/app/controllers/class.Calendar.php");

$settings_data = $mysql->select("select * from _tbl_settings_application");
$_SETTINGS=array();
foreach($settings_data as $d) {
   $_SETTINGS[$d['Param']] = $d['ParamValue'];
}

function folderSize($dir){
$count_size = 0;
$count = 0;
$dir_array = scandir($dir);
  foreach($dir_array as $key=>$filename){
    if($filename!=".." && $filename!="."){
       if(is_dir($dir."/".$filename)){
          $new_foldersize = foldersize($dir."/".$filename);
          $count_size = $count_size+ $new_foldersize;
        }else if(is_file($dir."/".$filename)){
          $count_size = $count_size + filesize($dir."/".$filename);
          $count++;
        }
   }
 }
return $count_size;
}

function sizeFormat($bytes){ 
$kb = 1024;
$mb = $kb * 1024;
$gb = $mb * 1024;
$tb = $gb * 1024;

if (($bytes >= 0) && ($bytes < $kb)) {
return $bytes . ' B';

} elseif (($bytes >= $kb) && ($bytes < $mb)) {
return ceil($bytes / $kb) . ' KB';

} elseif (($bytes >= $mb) && ($bytes < $gb)) {
return ceil($bytes / $mb) . ' MB';

} elseif (($bytes >= $gb) && ($bytes < $tb)) {
return ceil($bytes / $gb) . ' GB';

} elseif ($bytes >= $tb) {
return ceil($bytes / $tb) . ' TB';
} else {
return $bytes . ' B';
}
}
?> 