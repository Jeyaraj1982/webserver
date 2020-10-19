<?php
     include_once("config.php");
     
     function GetMemberCodeUpLineCode() {
         global $mysqldb;
         $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_GET['data']."'");    
         $temp = explode(",",GetLeft($epin[0]['OwnToCode'],"L"));
         $uplineID = $temp[0];
         $MemberCode = getMemberCode($_GET['MemberName']);
         return $MemberCode.",".$uplineID;
     }
            
     echo $_GET['action']();
 ?> 