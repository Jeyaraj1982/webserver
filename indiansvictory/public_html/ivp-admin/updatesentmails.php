<?php
  include_once("../php/classes/mysql.php");
  $mysql = new MySql();
// $mysql->execute("update _posts set sendmails=".$_REQUEST['view']." where id=".$_REQUEST['id']);     
 $mysql->execute("update _posts set ispublished=1, sendmails=(sendmails+10) where id=".$_REQUEST['id']);     
// $mysql->execute("update _posts set ispublished=1, sendmails=(sendmails+1) where id=234"); 


?>