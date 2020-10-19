<?php
     include_once("config.php");
     $testmode="ztest";
     $testmode="";
     echo "<br>LEVEL-1";
     if ($testmode=="ztest") {
         $mysql->execute("Truncate ztest_tbl_wallet_earnings;Truncate ztest_tbl_daily;");
     }                         
 
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
                                                                      "Particulars"      => "Pair-match-L1",
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

     $maximum_levels = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MaximumLevels')"); 

for($i=2;$i<=$maximum_levels[0]['ParamValue'];$i++) {
    
    echo "<br>LEVEL-".$i;    
    $level = array();
    $level_income = 1000;
    $data = $mysql->select("select  tbl1.MemberCode,tbl2.MemberID,tbl2.MobileNumber 
                            from  (select MemberCode, count(*) as cur_level from ".$testmode."_tbl_daily group by MemberCode) as tbl1 
                            LEFT JOIN _tbl_Members AS tbl2 
                            ON tbl1.MemberCode=tbl2.MemberCode WHERE tbl1.cur_level='".($i-1)."'");  
    foreach($data as $d) {
        
        $t = $mysql->select("select * from _tblPlacements where ParentCode='".$d['MemberCode']."'");
        
        $l = $mysql->select("select MemberCode from ".$testmode."_tbl_daily where MemberCode='".$t[0]['ChildCode']."'");
        $r = $mysql->select("select MemberCode from ".$testmode."_tbl_daily where MemberCode='".$t[1]['ChildCode']."'");
        
        $ispaid = $mysql->select("select * from ".$testmode."_tbl_daily where MemberCode='".$d['MemberCode']."' and MemberLevel='".$i."'");
        if (sizeof($l)>=($i-1) && sizeof($r)>=($i-1) && sizeof($ispaid)==0) {
            
            if (sizeof($ispaid)==0) {
                $level[]=$d['MemberCode']; //."-L-".sizeof($l)."--R-".sizeof($r)
                $balance = getGGCashWalletBalance($d['MemberID'])+$level_income;
                $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                            "MemberCode"       => $d['MemberCode'],
                                                                            "Particulars"      => "Pair-match-L".$i,
                                                                            "TxnDate"          => date("Y-m-d H:i:s"),
                                                                            "Credits"          => $level_income,
                                                                            "Debits"           => "0",
                                                                            "AvailableBalance" => $balance,
                                                                            "details"          => ""));
                $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['MemberCode'],
                                                            "MemberLevel"  => $i,
                                                            "MemberIncome" => $level_income,
                                                            "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
                if (strlen($testmode)=="") {
                    $sms_txt = "Dear ".$d['ParentCode'].", Your binary level:".$i." income has been added Rs. ".$level_income.". Your availbale balance Rs. ".$balance." - Thanks GGCash";
                    MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
                }
            }
        }
    }
    
}
?> 