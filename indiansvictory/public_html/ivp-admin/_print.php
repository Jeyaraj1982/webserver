<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
    session_start();
    $_SESSION['user']['id']=1;
    include_once("../php/classes/functions.php");
    include_once("../php/classes/mysql.php");
    $mysql = new MySql();

$data = $mysql->select("select * from _posts where id=".$_REQUEST['id']);
echo base64_decode($data[0]['mailcontent']);

exit;
?>
   
 