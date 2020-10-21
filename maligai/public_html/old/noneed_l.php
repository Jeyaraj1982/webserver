<?php
     include_once("config.php");
     $testmode="ztest";
     $testmode="";
     //echo "<br>LEVEL-1";
     if ($testmode=="ztest") {
         $mysql->execute("Truncate ztest_tbl_wallet_earnings;Truncate ztest_tbl_daily;");
     }                         
 
 
          $members = $mysql->select("select * from _tbl_Members where IsActive='1'");
          echo "<table border='1'>";
          foreach($members as $m) {
 
      for($i=1;$i<=20;$i++) {
          $data  = getLevelMembers($m['MemberCode'],$i);
          if ($data['Active']>0) {
              $paidmember = $mysql->select("select sum(PaidActiveMembers) as pm from _tbl_payoutsummary where MemberCode='".$m['MemberCode']."' and Level='".$i."'");
            //  print_r($paidmember);
              $payablemember = $data['Active'] - ( isset($paidmember[0]['pm']) ? $paidmember[0]['pm'] : "0");
              $levelIncome = $mysql->select("select * from _level_income where Level='".$i."'");
              $paidAmount = $payablemember * $levelIncome[0]['Income'];
              
                 
              $mysql->insert("_tbl_payoutsummary",array("PayoutProcessDate"=>date("Y-m-d"),
                                                        "MemberID"=>$m['MemberID'],
                                                        "MemberCode"=>$m['MemberCode'],
                                                        "MemberCode"=>$m['MemberCode'],
                                                        "TotalActiveMembers"=>$data['Active'],
                                                        "TotalInactiveMembers"=> $data['Inactive']==0 ? "0" : $data['Inactive'],
                                                        "PaidActiveMembers"=>$payablemember,
                                                        "PayableMembers"=>$payablemember,
                                                        "PaidAmount"=>$paidAmount,
                                                        "Level"=>$i,
                                                        "LevelIncome"=>$levelIncome[0]['Income'],
                                                        "Addedon"=>date("Y-m-d H:i:s")));
                                                        if ($paidAmount>0)  {
              $balance = getEarningWalletBalance($m['MemberID'])+$paidAmount;
           $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $m['MemberID'],
                                                                      "MemberCode"       => $m['ParentCode'],
                                                                      "Particulars"      => "Level-".$i." Members:".$payablemember.", Incomes:".$levelIncome[0]['Income'],
                                                                      "TxnDate"          => date("Y-m-d H:i:s"),
                                                                      "Credits"          => $paidAmount,
                                                                      "Debits"           => "0",
                                                                      "AvailableBalance" => $balance,
                                                                      "details"          => ""));
                                                        }
          
          ?>
                                <tr>
                                    <td><?php echo $m['MemberCode'];?></td>
                                    <td>Level <?php echo $i;?></td>
                                    <td style="text-align: right"><?php echo $data['TotalMembers'];?></td>
                                    <td style="text-align: right"><?php echo $data['Active'];?></td>
                                    <td style="text-align: right"><?php echo $data['Inactive'];?></td>
                                    <td style="text-align: right"><?php echo $payablemember;?></td>
                                    <td style="text-align: right"><?php echo $payablemember;?></td>
                                    <td style="text-align: right"><?php echo $paidAmount;?></td>
                                </tr>
                                <?php   } else {
                                                                             
                                    $i=25;
                                    }
                                    
                                    } 
                                    
      
          }
      echo "</table>";
 
 
 exit;
$level_1 = array();

$levelIncome = array("",800*2,600*4,450*8,337*16,253*32,189*64,142*128);
     
      if ($testmode=="") {
          $data = $mysql->select("SELECT 
                                    tbl1.ParentCode,tbl2.MemberID,tbl2.MobileNumber 
                                  FROM (SELECT ParentCode FROM (SELECT ParentCode,COUNT(*) AS Child FROM _tblPlacements WHERE Paid=0 GROUP BY ParentCode) AS t1 WHERE t1.Child=2 ORDER BY t1.ParentCode) AS tbl1
                                  LEFT JOIN _tbl_Members AS tbl2 
                                  ON tbl1.ParentCode=tbl2.MemberCode");
      } else {
          $data = $mysql->select("SELECT 
                                tbl1.ParentCode,tbl2.MemberID,tbl2.MobileNumber 
                             FROM (SELECT ParentCode FROM (SELECT ParentCode,COUNT(*) AS Child FROM _tblPlacements GROUP BY ParentCode) AS t1 WHERE t1.Child=2 ORDER BY t1.ParentCode) AS tbl1
                             LEFT JOIN _tbl_Members AS tbl2 
                             ON tbl1.ParentCode=tbl2.MemberCode");
      }
      
      foreach($data as $d) {
          $balance = getEarningWalletBalance($d['MemberID'])+$levelIncome[1];
          $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                      "MemberCode"       => $d['ParentCode'],
                                                                      "Particulars"      => "Pair-match-L1",
                                                                      "TxnDate"          => date("Y-m-d H:i:s"),
                                                                      "Credits"          => $levelIncome[1],
                                                                      "Debits"           => "0",
                                                                      "AvailableBalance" => $balance,
                                                                      "details"          => ""));
          if ($testmode=="") {
              $mysql->execute("update _tblPlacements set Paid='1' where ParentCode='".$d['ParentCode']."'");
              $sms_txt = "Dear ".$d['ParentCode'].", Your binary income has been added Rs. ".$levelIncome[1].". Your availbale balance Rs. ".$balance." - Thanks GGCash";
              //MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
          }
          //$level_1[]=$d['ParentCode'];
          $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['ParentCode'],
                                                      "MemberLevel"  => '1',
                                                      "MemberIncome" => $levelIncome[1],
                                                      "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
     }

     $maximum_levels = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MaximumLevels')"); 

for($i=2;$i<=$maximum_levels[0]['ParamValue'];$i++) {
    
    //echo "<br>LEVEL-".$i;    
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
                $balance = getEarningWalletBalance($d['MemberID'])+$levelIncome[$i];
                $id = $mysql->insert($testmode."_tbl_wallet_earnings",array("MemberID"         => $d['MemberID'],
                                                                            "MemberCode"       => $d['MemberCode'],
                                                                            "Particulars"      => "Pair-match-L".$i,
                                                                            "TxnDate"          => date("Y-m-d H:i:s"),
                                                                            "Credits"          => $levelIncome[$i],
                                                                            "Debits"           => "0",
                                                                            "AvailableBalance" => $balance,
                                                                            "details"          => ""));
                $mysql->insert($testmode."_tbl_daily",array("MemberCode"   => $d['MemberCode'],
                                                            "MemberLevel"  => $i,
                                                            "MemberIncome" => $levelIncome[$i],
                                                            "CompletedOn"  => date("Y-m-d H:i:s"))) ; 
                if (strlen($testmode)=="") {
                    $sms_txt = "Dear ".$d['ParentCode'].", Your binary level:".$i." income has been added Rs. ".$levelIncome[$i].". Your availbale balance Rs. ".$balance." - Thanks GGCash";
                    //MobileSMS::sendSMS($d['MobileNumber'],$sms_txt,$d['MemberID']);
                }
            }
        }
    }
    
}
echo "done";
?> 