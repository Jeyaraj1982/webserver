<?php
  include_once("../php/classes/mysql.php");
  $mysql = new MySql();
 $data = $mysql->select("Select * from _posts where id=".$_REQUEST['post']);

  
 
echo json_encode($data);
//echo $data[0]['mailcontent'];
?>