<?php
     include_once("../config.php");
     
     function GetMemberCodeUpLineCode() {
         global $mysqldb,$memberTree;
         $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_GET['data']."'");    
         //$temp = explode(",",GetLeft($epin[0]['OwnToCode'],"L"));
         $data = $memberTree->GetLeft($epin[0]['OwnToCode'],"L");
         if ($memberTree->error==0) {
             $temp = explode(",",$data);
             $uplineID = $temp[0];
             $MemberCode = getMemberCode($_GET['MemberName']);
             return $MemberCode.",".$uplineID;
         } else {
            return "Error";
         }   
     }
     echo $_GET['action']();
 ?> 