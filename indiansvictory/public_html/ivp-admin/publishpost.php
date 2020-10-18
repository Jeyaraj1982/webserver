<?php
  include_once("../php/classes/mysql.php");
  $mysql = new MySql();
 $mysql->execute("update _posts set ispublished=1 where id=".$_REQUEST['id']);     
?>