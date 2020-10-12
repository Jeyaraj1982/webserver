<?php
    include_once("/home/wintogether2/public_html/config.php");
    
    $backup_file = "/home/wintogether2/public_html/app/backup/sql/db_".date("Y_m_d_H_i_s"). '.sql';
    $command = "mysqldump -h".DbHost." -u".DbUser." -p".DbPassword." ".DbName."  > ".$backup_file;
    system($command);
    
    $minimumPayout = 0;
  
    $date = date("Y-m-d");                
                
    
    $memberTree->process_date=$date; 
    
    $filename="temp_payout_".date("Y_m_d_H_i_s").".txt";                            
    
    $pid = $mysql->insert("_tbl_payout_log",array("PayoutDate"         => $date,
                                                  "CreatedOn"          => date("Y-m-d H:i:s"),
                                                  "EndedOn"            => date("Y-m-d H:i:s"),
                                                  "FileName"           => $filename,
                                                  "CompanyCollectedPV" => "0",
                                                  "TotalPayoutAmount"  => "0"));
    function writelog($text) {
        global $filename;
        $myfile = fopen("/home/wintogether2/public_html/app/backup/logs/payoutlogs/".$filename, "a") or die("Unable to open file!");
        fwrite($myfile, "\n[".date("Y-m-d H:i:s")."]\t".$text);
        fclose($myfile);
    }

    writelog("=== Binary Eligible Starts ===");
    $IsBinaryEligible = $mysql->select("select * from `_tbl_Members` Where `IsBinaryEligible`=0 and Date(CreatedOn)<=Date('".$date."')");
    foreach($IsBinaryEligible as $m) {
        $binary_eligible = $memberTree->IsBinaryEligible($m['MemberCode'],$left,$right);
        if ($binary_eligible) {
            writelog($m['MemberCode']."\t... eligible\tL:".sizeof($left)."\tR:".sizeof($right));
            $mysql->execute("update `_tbl_Members` set `IsBinaryEligible`='1'  where `MemberCode`='".$m['MemberCode']."'");
        } else {
            writelog($m['MemberCode']."\tnot eligible\tL:".sizeof($left)."\tR:".sizeof($right));
        }
    }
    writelog("=== Binary Eligible End ===\n"); 
    
    writelog("=== Payout Eligible Starts ===");
    $IsPayoutEligible = $mysql->select("select * from `_tbl_Members` Where `IsPayoutEligible`='0' and Date(CreatedOn)<=Date('".$date."')");
    foreach($IsPayoutEligible as $m) {
        
        $payout_eligible = $memberTree->IsPayoutEligible($m['MemberCode'],$left,$right);
        if ($payout_eligible==true) {
            writelog($m['MemberCode']."\t... eligible\tL:".sizeof($left)."\tR:".sizeof($right));
            $mysql->execute("update `_tbl_Members` set `IsPayoutEligible`='1'  where `MemberCode`='".$m['MemberCode']."'");
        }  else {
            writelog($m['MemberCode']."\tnot eligible\tL:".sizeof($left)."\tR:".sizeof($right));
            $mysql->execute("update `_tbl_Members` set `IsPayoutEligible`='0'  where `MemberCode`='".$m['MemberCode']."'");
        }
    }
    writelog("=== Payout Eligible End ===\n"); 
    
    writelog("=== Payout Process Starts ===");
    $IsPayoutEligible = $mysql->select("select * from `_tbl_Members` 
                                            left Join  `_tbl_Settings_Packages`
                                            On 
                                            `_tbl_Members`.`CurrentPackageID`= `_tbl_Settings_Packages`.`PackageID`
                                            where date(`_tbl_Members`.`CreatedOn`)<=date('".$date."')");
    
    $firstPayout = array();  
    foreach($IsPayoutEligible as $Member) {
        
        $memberTree->GetNodeIDs($Member['MemberCode'],"L");
        $totalLeftPV = $memberTree->leftPV;
        $todayLeftPV = $memberTree->todayLeftPV;
        $memberTree->GetNodeIDs($Member['MemberCode'],"R");
        $totalRightPV = $memberTree->rightPV;
        $todayRightPV = $memberTree->todayRightPV;
        
        $records = $mysql->select("select * from `_tbl_payoutsummary` where `MemberCode`='".$Member['MemberCode']."' and (`DebitLeft` >0 or `DebitRight`>0 ) ");
       
        if ($Member['IsPayoutEligible']==1 && sizeof($records)==0 && $totalLeftPV>0 && $totalRightPV>0)  { //First Payout 1:2 or 2:1
        
            if ($totalLeftPV>=$Member['PV'] && $totalRightPV>=$Member['PV'] ) {
                
                writelog("First Payout");
                $firstPayout[$Member['MemberCode']]=1;
                //eligible to get Package.
                $mysql->insert("_tbl_Members_Package_Elegible",array("MemberID"    => $Member['MemberID'],
                                                                     "MemberCode"  => $Member['MemberCode'],
                                                                     "MemberName"  => $Member['MemberName'],
                                                                     "EligibledOn" => date("Y-m-d H:i:s")));
                  
                $debitLeft= $Member['PV'];
                $debitRight= $Member['PV'];
               
                $available_Left  = $totalLeftPV-$debitLeft;
                $available_Right = $totalRightPV-$debitRight;
               
                if ($available_Left<$available_Right) {
                    $minimum = $available_Left;
                }
                if ($available_Left>$available_Right) {
                    $minimum = $available_Right;
                }
                if ($available_Left==$available_Right) {
                    $minimum = $available_Left;
                }
                $payablePV = PayablePV($minimum,$Member['CutOffPV'],$minimumPayout);
               
                $debitLeft      = $debitLeft+$payablePV;
                $debitRight     = $debitRight+$payablePV;
               
                $AvailableLeft  = $totalLeftPV;
                $AvailableRight = $totalRightPV;
                $TodayPayoutPV  = $payablePV; 
                $payableAmt     = $TodayPayoutPV*$Member['PVAmount'];  //   *10
                $chargeAmt      = $payableAmt*(20/100);
                $payfinal       = $payableAmt-$chargeAmt;
               
                $RemainingLeft  = $totalLeftPV-$debitLeft;
                $RemainingRight = $totalRightPV-$debitRight;
            
            } else {
                $debitLeft      = 0;
                $debitRight     = 0;
                $AvailableLeft  = $totalLeftPV;
                $AvailableRight = $totalRightPV;
                $TodayPayoutPV  = 0;                       
                $CompanyLeft    = 0;                        
                $CompanyRight   = 0; 
                $payableAmt     = 0;
                $payablePV      = 0;  
                $chargeAmt      = 0;
                $payfinal       = 0;
                $RemainingLeft  = $totalLeftPV;
                $RemainingRight = $totalRightPV;
            }
            
       } else if ($Member['IsPayoutEligible']==1 &&  sizeof($records)>0  && $totalLeftPV>0 && $totalRightPV>0) { // Second Payout and more 1:1
       
                $available = $mysql->select("select sum(DebitLeft) as DebitLeft, sum(DebitRight) as DebitRight  from _tbl_payoutsummary where MemberCode='".$Member['MemberCode']."'");
                $availableLeft = $totalLeftPV - (isset($available[0]['DebitLeft']) ? $available[0]['DebitLeft'] : 0);
                $availableRight = $totalRightPV - (isset($available[0]['DebitRight']) ? $available[0]['DebitRight'] : 0);
                
                if ($availableLeft>0 && $availableRight>0) {
                    
                    if ($availableLeft<$availableRight) {
                        $minimum = $availableLeft;
                    }
                    if ($availableLeft>$availableRight) {
                        $minimum = $availableRight;
                    }
                    if ($availableLeft==$availableRight) {
                        $minimum = $availableLeft;
                    }
       
                    $payablePV = PayablePV($minimum,$Member['CutOffPV'],$minimumPayout);
                    
                    $debitLeft      = $payablePV;
                    $debitRight     = $payablePV;
                    
                    $AvailableLeft  = $availableLeft;
                    $AvailableRight = $availableRight;
                    $TodayPayoutPV  = $payablePV;
                   
                    $payableAmt     = $payablePV*$Member['PVAmount'];      //Rs 10
                    $chargeAmt      = $payableAmt*(20/100);
                    $payfinal       = $payableAmt-$chargeAmt;
                    $CompanyLeft    = 0;
                    $CompanyRight   = 0;
                    
                     $RemainingLeft  = $availableLeft-$debitLeft;
                     $RemainingRight = $availableRight-$debitRight;
                } else {
                    
                     $debitLeft      = 0;
                     $debitRight     = 0;
                     $AvailableLeft  = $totalLeftPV;
                     $AvailableRight = $totalRight;
                     $TodayPayoutPV  = 0;
                     $CompanyLeft    = 0;  
                     $CompanyRight   = 0; 
                     $payableAmt     = 0;
                     $payablePV      = 0;  
                     $chargeAmt      = 0;
                     $payfinal       = 0;
                     $RemainingLeft  = $totalLeftPV;
                     $RemainingRight = $totalRightPV;
                }
               
       } else { //payout not eligible
       
            $debitLeft      = 0;
            $debitRight     = 0;
            $AvailableLeft  = $totalLeftPV;
            $AvailableRight = $totalRightPV;
            $TodayPayoutPV  = 0;
            $CompanyLeft    = 0;  
            $CompanyRight   = 0; 
            $payableAmt     = 0;
            $payablePV      = 0;  
            $chargeAmt      = 0;
            $payfinal       = 0;
            $RemainingLeft  = $totalLeftPV;
            $RemainingRight = $totalRightPV;
       }
                          
       writelog("Member: ".$Member['MemberCode']
               ."\tLeft: ".sprintf('%04d',$totalLeftPV)
               ."\tToday Left:".sprintf('%04d',$todayLeftPV)
               ."\tRight: ".sprintf('%04d',$totalRightPV)
               
               ."\tToday Right: ".sprintf('%04d',$todayRightPV)
               ."\tTodayPayoutPV: ".sprintf('%04d',$minimum)
               
               ."\tAvailable Left: ".sprintf('%04d',$AvailableLeft)
               ."\tAvailable Right: ".sprintf('%04d',$AvailableRight)
               
               ."\tTxn Left: ".sprintf('%04d',$debitLeft)
               ."\tTxn Right: ".sprintf('%04d',$debitRight)
               
               ."\tAvailable Left: ".sprintf('%04d',$RemainingLeft)
               ."\tAvailable Right: ".sprintf('%04d',$RemainingRight)
               
               ."\tPackage: ".sprintf('%04d',$Member['PackageName'])
               ."\tEligible Minimum PayoutPV: ".sprintf('%04d',$minimumPayout)
               ."\tEligible Maximum PayoutPV: ".sprintf('%04d',$Member['CutOffPV'])
               ."\tPayable PayoutPV: ".sprintf('%04d',$payablePV)
               ."\tPayable Amount: ".($payableAmt) 
               ."\tCompanyLeft: ".sprintf('%04d',$CompanyLeft) 
               ."\tCompanyRight: ".sprintf('%04d',$CompanyRight)
               ."\tIsPayoutEligible: ".$Member['IsPayoutEligible']
               ."\tCharges: 20%"
               ."\tChargeAmount: ".sprintf('%04d',$chargeAmt)
               ."\tPayableAmountDebitCharge: ".sprintf('%04d',$payfinal)
               ."\tprocessedon: ".date("Y-m-d H:i:s")
               );
             
               $id = $mysql->insert("_tbl_payoutsummary",array("PayoutProcessDate"        => $date,
                                                                "MemberID"                 => $Member['MemberID'],
                                                                "MemberCode"               => $Member['MemberCode'],
                                                                "TotalLeft"                => $totalLeftPV == 0 ? '0' : $totalLeftPV,
                                                                "TodayLeft"                => $todayLeftPV == 0 ? '0' : $todayLeftPV,
                                                         
                                                                "TotalRight"               => $totalRightPV==0 ? '0' : $totalRightPV,
                                                                "TodayRight"               => $todayRightPV==0 ? '0' : $todayRightPV,
                                                         
                                                                "DebitLeft"                => $debitLeft ==0 ? '0' : $debitLeft,
                                                                "DebitRight"               => $debitRight == 0 ? '0' : $debitRight,
                                                         
                                                                "AvailableLeft"            => $AvailableLeft ==0 ? '0' : $AvailableLeft,
                                                                "AvailableRight"           => $AvailableRight ==0 ? '0' : $AvailableRight,
                                                         
                                                                "RemainingLeft"            => $RemainingLeft==0 ? '0' : $RemainingLeft,
                                                                "RemainingRight"           => $RemainingRight==0 ? '0' : $RemainingRight,
                                                                "TodayPayoutPV"            => $TodayPayoutPV==0 ? '0' : $TodayPayoutPV,
                                                                "PackageName"              => $Member['PackageName'],
                                                                "PackageID"                => $Member['CurrentPackageID'],
                                                                "EligibleMinimumPayoutPV"  => $minimumPayout,
                                                                "EligibleMaximumPayoutPV"  => $Member['CutOffPV'],
                                                                
                                                                "PayablePV"                => $payablePV==0 ? '0' : $payablePV,
                                                                "PayableAmount"            => $payableAmt==0 ? '0' : $payableAmt,
                                                                "CompanyLeft"              => $CompanyLeft  == 0 ? '0' : $CompanyLeft,
                                                                "CompanyRight"             => $CompanyRight == 0 ? '0' : $CompanyRight,
                                                                "IsPayoutEligible"         => $Member['IsPayoutEligible'],
                                                                "Charges"                  => "20%",
                                                                "ChargeAmount"             => $chargeAmt==0 ? '0' : $chargeAmt,
                                                                "PayableAmountDebitCharge" => $payfinal==0 ? '0' : $payfinal,
                                                                "processedon"              => date("Y-m-d H:i:s")));  
       if ($payableAmt>0)   {
           $balance = getEarningWalletBalance($Member['MemberID']);
           $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Member['MemberID'],
                                                                     "MemberCode"       => $Member['MemberCode'],
                                                                     "Particulars"      => "Payout process on ".$date.", Txn ID: ".$id,
                                                                     "TxnDate"          => date("Y-m-d H:i:s"),
                                                                     "Credits"          => $payableAmt==0 ? '0' : $payableAmt,
                                                                     "Debits"           => '0',
                                                                     "AvailableBalance" => $balance+$payableAmt,
                                                                     "Ledger"           => '3',
                                                                     "details"          => ""));
           //writelog("Credit Amount: TxnID: ".$id."\tOldBalance: ".$balance."\tNewBalance: ".($balance+$payableAmt)."\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
           writelog("Credit Amount:\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
           
           $balance = $balance+$payableAmt;                                            
           $charges = $payableAmt*(20/100);
           $balance = $balance-$charges;
           $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Member['MemberID'],
                                                                     "MemberCode"       => $Member['MemberCode'],
                                                                     "Particulars"      => "Charges 20% Payout process on ".$date.", Txn ID: ".$id,
                                                                     "TxnDate"          => date("Y-m-d H:i:s"),
                                                                     "Credits"          => '0',
                                                                     "Debits"           => $charges==0 ? '0' : $charges,
                                                                     "AvailableBalance" => $balance,
                                                                     "Ledger"           => '30001',
                                                                     "details"          => "")); 
           writelog("Charges Debit:\tDebited: ".$charges."\tWalletTxnID: ".$walletTxnID) ;
       }
        
   }
   
   function PayablePV($minimum_pv,$cut_off,$eligible_pv) {
     if ($minimum_pv<$eligible_pv) {
         return "0";
     }  
     if ($minimum_pv>=$cut_off) {
         return $cut_off;
     }
     return $minimum_pv;
   }
   $mysql->execute("update _tbl_payout_log set EndedOn='".date("Y-m-d H:i:s")."' where PayoutLogID='".$pid."'");
   
   // Direct Referal Payouts
   
   writelog("<br>========================================== Direct Referal Payout: ".$date." ========================================== ");
   
   $direct_referal = $mysql->select("SELECT PlacedByCode,COUNT(*) FROM _tblPlacements WHERE DATE(PlacedOn) = DATE('".$date."') GROUP BY PlacedByCode ");
   
   if (sizeof($direct_referal)==0) {
       writelog("<br>No Direct Referal Transaction");
   } else {
       
       foreach($direct_referal as $dr) {
           writelog("<br><br>".$dr['PlacedByCode']);
           $refered_member = $mysql->select("SELECT *  FROM _tblPlacements WHERE PlacedByCode='".$dr['PlacedByCode']."' and DATE(PlacedOn) = DATE('".$date."') ");
           $total_earning = 0;
           
           foreach($refered_member as $rm) {
               
               writelog("<br>---".$rm['ChildCode']);
               
               $plan = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$rm['PackageID']."'");     
               $refered_package = $plan[0]['PackageName'];
               $earning_amt     = $plan[0]['DirectReferalCommission'];
               
               $t = $mysql->insert("_tbl_direct_referal",array("TxnDate"       => $date,
                                                               "MemberCode"    => $dr['PlacedByCode'],
                                                               "ReferedMember" => $rm['ChildCode'],              
                                                               "PlanID"        => $rm['PackageID'],
                                                               "Earning"       => $earning_amt,
                                                               "AddedOn"       => date("Y-m-d H:i:s")));
               $total_earning += $earning_amt;
               
               writelog("--- ".$refered_package." ---".$earning_amt);
           }
           
           if (isset($firstPayout[$dr['PlacedByCode']]) && $firstPayout[$dr['PlacedByCode']]==1) {
                   $total_earning = $total_earning - (2*$plan[0]['DirectReferalCommission']);
           }
           
           if ($total_earning>0) {
               
               $Member = $mysql->select("select * from `_tbl_Members` Where MemberCode='".$dr['PlacedByCode']."'");
               $Member=$Member[0];
               
               $balance = getEarningWalletBalance($Member['MemberID']);
               $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Member['MemberID'],
                                                                         "MemberCode"       => $Member['MemberCode'],
                                                                         "Particulars"      => "Direct Referal Payout process on ".$date,
                                                                         "TxnDate"          => date("Y-m-d H:i:s"),
                                                                         "Credits"          => $total_earning==0 ? '0' : $total_earning,
                                                                         "Debits"           => '0',
                                                                         "AvailableBalance" => $balance+$total_earning,
                                                                         "Ledger"           => '2',
                                                                         "details"          => ""));

               $balance = $balance+$total_earning;
               $charges = ($total_earning*(20/100));
               $balance = $balance-$charges;
               $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Member['MemberID'],
                                                                         "MemberCode"       => $Member['MemberCode'],
                                                                         "Particulars"      => "Charges 20% Direct Referal Payout process on ".$date,
                                                                         "TxnDate"          => date("Y-m-d H:i:s"),
                                                                         "Credits"          => '0',
                                                                         "Debits"           => $charges==0 ? '0' : $charges,
                                                                         "AvailableBalance" => $balance,
                                                                         "Ledger"           => '20001',
                                                                         "details"          => "")); 
           }
           writelog("<br>---  ---  Total Referal Earnings --- --- --- Rs.".$total_earning." --- --- Charges --- Rs.". ($total_earning*20/100). " --- --- Payable Amount --- --- Rs.". ($total_earning-($total_earning*20/100))."<br>"); 
       }
   }
     
   echo "<pre>";
        echo (file_get_contents("/home/wintogether2/public_html/app/backup/logs/payoutlogs/".$filename));
   echo "</pre>";
 ?>