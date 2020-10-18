<?php
    include_once("config.php");

     
     $data = $mysql->select("select * from _emailids where accesskey='".$_POST['key']."'");

     if (sizeof($data)>0) {
         
         include_once("class.Gmail.php");
         $gmail = new Gmail(); 
        
    $gmail->mailTo("verfiyretailers@gmail.com","selvaa@1982","verfiyretailers@gmail.com","Requesting Validation - ".$_SESSION['USER']['clientid'],"jeyaraj_123@yahoo.com","jeyaraj_123@yahoo.com","Retailer Email Id Verification - ".$_SESSION['USER']['clientid'],$body,$useraccountid);  
     }
      
 ?> 
