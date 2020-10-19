<?php
     include_once("config.php");
     $testmode="ztest";
     echo "<br>LEVEL-1";
     if ($testmode=="ztest") {
         $mysql->execute("Truncate ztest_tbl_wallet_earnings;Truncate ztest_tbl_daily;");
     }
/* ******* LEVEL 1 Pair Match ******* */
$level_1 = array();
$level_1_income = 500;
     
      if ($testmode=="") {
          $data = $mysql->select("SELECT 
                                    tbl1.ParentCode,tbl2.MemberID,tbl2.MobileNumber 
                                  FROM (SELECT ParentCode FROM (SELECT ParentCode,COUNT(*) AS Child FROM _tblPlacements WHERE Paid=0 GROUP BY ParentID) AS t1 WHERE t1.Child=2 ORDER BY t1.ParentCode) AS tbl1
                                  LEFT JOIN _tbl_Members AS tbl2 
                                  ON tbl1.ParentCode=tbl2.MemberCode");
      } else {
          $data = $mysql->select("SELECT 
                                tbl1.ParentCode,tbl2.MemberID,tbl2.MobileNumber 
                             FROM (SELECT ParentCode FROM (SELECT ParentCode,COUNT(*) AS Child FROM _tblPlacements GROUP BY ParentID) AS t1 WHERE t1.Child=2 ORDER BY t1.ParentCode) AS tbl1
                             LEFT JOIN _tbl_Members AS tbl2 
                             ON tbl1.ParentCode=tbl2.MemberCode");
      }
      foreach($data as $d) {
          $balance = getGGCashWalletBalance($d['MemberID'])+$level_1_income;
          $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                      "MemberCode"       => $d['ParentCode'],
                                                                      "Particulars"      => "ParmatchL1",
                                                                      "TxnDate"          => date("Y-m-d H:i:s"),
                                                                      "Credits"          => $level_1_income,
                                                                      "Debits"           => "0",
                                                                      "AvailableBalance" => $balance,
                                                                      "details"          => ""));
          if ($testmode=="") {
              $mysql->execute("update _tblPlacements set Paid='1' where ParentCode='".$d['ParentCode']."'");
              $sms_txt = "Dear ".$d['ParentCode'].", Your binary income has been added Rs. 500. Your availbale balance Rs. ".$balance." - Thanks GGCash";
              MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
          }
          $level_1[]=$d['ParentCode'];
          $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['ParentCode'],
                                                      "MemberLevel"  => '1',
                                                      "MemberIncome" => $level_1_income,
                                                      "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
     }
     print_r($level_1);
/* ******* End of LEVEL 1 Pair Match ******* */


/* ******* LEVEL 2  Pair Match ******* */
echo "<br>LEVEL-2";
$level_2 = array();
$level_2_income = 1000;

     $data = $mysql->select("Select  tbl1.MemberCode,tbl2.MemberID,tbl2.MobileNumber 
                             from  (select MemberCode, count(*) as cur_level from ".$testmode."_tbl_daily group by MemberCode) as tbl1 
                             LEFT JOIN _tbl_Members AS tbl2 
                             ON tbl1.MemberCode=tbl2.MemberCode WHERE tbl1.cur_level='1' ");  

     foreach($data as $d) {
         
         $t = $mysql->select("select * from _tblPlacements where ParentCode='".$d['MemberCode']."'");
         
         $L = $mysql->select("select * from _tblPlacements where ParentCode='".$t[0]['ChildCode']."'");
         $R = $mysql->select("select * from _tblPlacements where ParentCode='".$t[1]['ChildCode']."'");

         $startProcess = true;
         if (sizeof($L)!=2) {  $startProcess = false; }
         if (sizeof($R)!=2) {  $startProcess = false; }

         if ($startProcess) {
             
             $ispaid = $mysql->select("select * from ".$testmode."_tbl_daily where MemberCode='".$d['MemberCode']."' and MemberLevel='2'");
             if (sizeof($ispaid)==0) {
                 $level_2[]=$d['MemberCode'];
                 $balance = getGGCashWalletBalance($d['MemberID'])+$level_2_income;
                 $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                             "MemberCode"       => $d['MemberCode'],
                                                                             "Particulars"      => "ParmatchL2",
                                                                             "TxnDate"          => date("Y-m-d H:i:s"),
                                                                             "Credits"          => $level_2_income,
                                                                             "Debits"           => "0",
                                                                             "AvailableBalance" => $balance,
                                                                             "details"          => ""));
                 $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['MemberCode'],
                                                             "MemberLevel"  => '2',
                                                             "MemberIncome" => $level_2_income,
                                                             "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
                 if (strlen($testmode)=="") {
                    $sms_txt = "Dear ".$d['ParentCode'].", Your binary second level income has been added Rs. 500. Your availbale balance Rs. ".$balance." - Thanks GGCash";
                    MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
                 }
            }
        }
    }
    print_r($level_2);
/* ******* End of LEVEL 2 Pair Match ******* */


/* ******* LEVEL 3  Pair Match ******* */
echo "<br>LEVEL-3";
$level_3 = array();
$level_3_income = 1000;
    $data = $mysql->select("select  tbl1.MemberCode,tbl2.MemberID,tbl2.MobileNumber 
                            from  (select MemberCode, count(*) as cur_level from ".$testmode."_tbl_daily   group by MemberCode) as tbl1 
                            LEFT JOIN _tbl_Members AS tbl2 
                            ON tbl1.MemberCode=tbl2.MemberCode WHERE tbl1.cur_level='2'");  
    foreach($data as $d) {
        
        $t = $mysql->select("select * from _tblPlacements where ParentCode='".$d['MemberCode']."'");
        
       $L = $mysql->select("select * from _tblPlacements where ParentCode='".$t[0]['ChildCode']."'");
            $LL = $mysql->select("select * from _tblPlacements where ParentCode='".$L[0]['ChildCode']."'");
            $LR = $mysql->select("select * from _tblPlacements where ParentCode='".$L[1]['ChildCode']."'");
        $R = $mysql->select("select * from _tblPlacements where ParentCode='".$t[1]['ChildCode']."'");
            $RL = $mysql->select("select * from _tblPlacements where ParentCode='".$R[0]['ChildCode']."'");
            $RR = $mysql->select("select * from _tblPlacements where ParentCode='".$R[1]['ChildCode']."'");
    
        $startProcess = true;
        if (sizeof($LL)!=2) {  $startProcess = false; }
        if (sizeof($LR)!=2) {  $startProcess = false; }
        if (sizeof($RL)!=2) {  $startProcess = false; }
        if (sizeof($RR)!=2) {  $startProcess = false; }  
        
        if ($startProcess) {
            
            $ispaid = $mysql->select("select * from ".$testmode."_tbl_daily where MemberCode='".$d['MemberCode']."' and MemberLevel='3'");
            if (sizeof($ispaid)==0) {
                $level_3[]=$d['MemberCode'];
                $balance = getGGCashWalletBalance($d['MemberID'])+$level_3_income;
                $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                            "MemberCode"       => $d['MemberCode'],
                                                                            "Particulars"      => "ParmatchL3",
                                                                            "TxnDate"          => date("Y-m-d H:i:s"),
                                                                            "Credits"          => $level_3_income,
                                                                            "Debits"           => "0",
                                                                            "AvailableBalance" => $balance,
                                                                            "details"          => ""));
                $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['MemberCode'],
                                                            "MemberLevel"  => '3',
                                                            "MemberIncome" => $level_3_income,
                                                            "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
                if (strlen($testmode)=="") {
                    $sms_txt = "Dear ".$d['ParentCode'].", Your binary third level income has been added Rs. 500. Your availbale balance Rs. ".$balance." - Thanks GGCash";
                    MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
                }
            }
        }
    }
    print_r($level_3);
/* ******* End of LEVEL 3 Pair Match ******* */


/* ******* LEVEL 3  Pair Match ******* */
echo "<br>LEVEL-4";    
$level_4 = array();
$level_4_income = 1000;
    $data = $mysql->select("select  tbl1.MemberCode,tbl2.MemberID,tbl2.MobileNumber 
                            from  (select MemberCode, count(*) as cur_level from ".$testmode."_tbl_daily group by MemberCode) as tbl1 
                            LEFT JOIN _tbl_Members AS tbl2 
                            ON tbl1.MemberCode=tbl2.MemberCode WHERE tbl1.cur_level='3'");  
    foreach($data as $d) {
        
        $t = $mysql->select("select * from _tblPlacements where ParentCode='".$d['MemberCode']."'");
    
        $L = $mysql->select("select * from _tblPlacements where ParentCode='".$t[0]['ChildCode']."'");
            $LL = $mysql->select("select * from _tblPlacements where ParentCode='".$L[0]['ChildCode']."'");
                $LLL = $mysql->select("select * from _tblPlacements where ParentCode='".$LL[0]['ChildCode']."'");
                $LLR = $mysql->select("select * from _tblPlacements where ParentCode='".$LL[1]['ChildCode']."'");
            $LR = $mysql->select("select * from _tblPlacements where ParentCode='".$L[1]['ChildCode']."'");
                $LRL = $mysql->select("select * from _tblPlacements where ParentCode='".$LR[0]['ChildCode']."'");
                $LRR = $mysql->select("select * from _tblPlacements where ParentCode='".$LR[1]['ChildCode']."'");
        $R = $mysql->select("select * from _tblPlacements where ParentCode='".$t[1]['ChildCode']."'");
            $RL = $mysql->select("select * from _tblPlacements where ParentCode='".$R[0]['ChildCode']."'");
                $RLL = $mysql->select("select * from _tblPlacements where ParentCode='".$RL[0]['ChildCode']."'");
                $RLR = $mysql->select("select * from _tblPlacements where ParentCode='".$RL[1]['ChildCode']."'");
            $RR = $mysql->select("select * from _tblPlacements where ParentCode='".$R[1]['ChildCode']."'");
                $RRL = $mysql->select("select * from _tblPlacements where ParentCode='".$RR[0]['ChildCode']."'");
                $RRR = $mysql->select("select * from _tblPlacements where ParentCode='".$RR[1]['ChildCode']."'");
    
        $startProcess = true;
        if (sizeof($LLL)!=2) {  $startProcess = false; }
        if (sizeof($LLR)!=2) {  $startProcess = false; }
        if (sizeof($LRL)!=2) {  $startProcess = false; }
        if (sizeof($LRR)!=2) {  $startProcess = false; }
        if (sizeof($RLL)!=2) {  $startProcess = false; }
        if (sizeof($RLR)!=2) {  $startProcess = false; }
        if (sizeof($RRL)!=2) {  $startProcess = false; }
        if (sizeof($RRR)!=2) {  $startProcess = false; }
        
        if ($startProcess) {
            
            $ispaid = $mysql->select("select * from ".$testmode."_tbl_daily where MemberCode='".$d['MemberCode']."' and MemberLevel='4'");
            if (sizeof($ispaid)==0) {
                $level_4[]=$d['MemberCode'];
                $balance = getGGCashWalletBalance($d['MemberID'])+$level_4_income;
                $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                            "MemberCode"       => $d['MemberCode'],
                                                                            "Particulars"      => "ParmatchL3",
                                                                            "TxnDate"          => date("Y-m-d H:i:s"),
                                                                            "Credits"          => $level_4_income,
                                                                            "Debits"           => "0",
                                                                            "AvailableBalance" => $balance,
                                                                            "details"          => ""));
                $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['MemberCode'],
                                                            "MemberLevel"  => '4',
                                                            "MemberIncome" => $level_4_income,
                                                            "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
                if (strlen($testmode)=="") {
                    $sms_txt = "Dear ".$d['ParentCode'].", Your binary forth level income has been added Rs. 500. Your availbale balance Rs. ".$balance." - Thanks GGCash";
                    MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
                }
            }
        }
    }
    print_r($level_4);
/* ******* End of LEVEL 3 Pair Match ******* */

function getDirectDown($Level) {
    
    
}
?> 