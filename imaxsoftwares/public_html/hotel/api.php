<?php
     include_once("apiconfig.php");
     
     if ($_REQUEST['action']=="getUserInfo") {
         
        $userdata = $mysql->select("SELECT * FROM _tbluser WHERE contactno='".$_REQUEST['mobileno']."'");
     
        if (sizeof($userdata)>0) {
     
            $points = $mysql->select("SELECT SUM(billamount) AS billamount, SUM(poinstoadd) AS credit,SUM(pointstodebit) AS debit FROM api WHERE mobilenumber='".$_REQUEST['mobileno']."'");
            
            $array = array("status"           =>"success",
                           "username"         => $userdata[0]['username'],
                           "emailid"          => $userdata[0]['emailid'],
                           "mobilenumber"     => $userdata[0]['contactno'],
                           "password"         => $userdata[0]['password'],
                           "createdon"        => $userdata[0]['createdon'], 
                           "billamount"       => (isset($points[0]['billamount']) ? number_format($points[0]['billamount'],2) : "0.00"), 
                           "creditedpoints"   => (isset($points[0]['credit']) ? $points[0]['credit'] : "0"), 
                           "debitedpoints"    => (isset($points[0]['debit']) ? $points[0]['debit'] : "0"),  
                           "availablepoints"  => ($points[0]['credit']-$points[0]['debit'])  
     
                        );
                        echo json_encode($array);
      } else {
          echo json_encode(array("status"=>"failed","error"=>"user not found"));
      }
     }
 ?> 