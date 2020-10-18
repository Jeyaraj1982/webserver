<?php
    include_once("class.mysql.php");
    
    $mysql     = new MySql("localhost","abcaduac_bigrock","bigrock","abcaduac_smsservice");
    $data = $mysql->select("select * from _user where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."'");
  
    if (sizeof($data)>0){
        
        $c = $mysql->select("select sum(credits)-sum(debits) as bal from _smscredits where userid=".$data[0]['id']);
        $d = $mysql->select("select sum(smscount) as used from _mobilesms where userid=".$data[0]['id']);
     
            echo "SUCCESS,".($c[0]['bal']-$d[0]['used']).",".date("Y-m-d H:i:s");
        } else {
          echo "SUCCESS,Invalid User,".date("Y-m-d H:i:s");
           
        }
?>