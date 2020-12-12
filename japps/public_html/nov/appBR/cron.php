<?php
    include_once("/home/astrafx/public_html/config.php");
    
    $backup_file = "/home/astrafx/public_html/app/backup/sql/db_".date("Y_m_d_H_i_s"). '.sql';
    $command = "mysqldump -h".DbHost." -u".DbUser." -p".DbPassword." ".DbName."  > ".$backup_file;
    system($command);
    
    function PayablePV($minimum_pv,$cut_off,$eligible_pv) {
        if ($minimum_pv<$eligible_pv) {
            return "0";
        }  
        if ($minimum_pv>=$cut_off) {
            return $cut_off;
        }
        return $minimum_pv;
    }
    
    function writelog($text) {
        global $filename;
        $myfile = fopen("/home/astrafx/public_html/app/backup/logs/payoutlogs/".$filename, "a") or die("Unable to open file!");
        fwrite($myfile, "\n[".date("Y-m-d H:i:s")."]\t".$text);
        fclose($myfile);
    }
       
    $minimumPayout = 1;
    $date = date("Y-m-d");                
    
    $memberTree->process_date=$date; 
    $filename="temp_payout_".date("Y_m_d_H_i_s").".txt";                            
    
    $pid = $mysql->insert("_tbl_payout_log",array("PayoutDate"         => $date,
                                                  "CreatedOn"          => date("Y-m-d H:i:s"),
                                                  "EndedOn"            => date("Y-m-d H:i:s"),
                                                  "FileName"           => $filename,
                                                  "CompanyCollectedPV" => "0",
                                                  "TotalPayoutAmount"  => "0")); 

    writelog("\n=== Payout Process Starts ===");
    
    $IsPayoutEligible = $mysql->select("select * from `_tbl_Members` 
                                            left Join  `_tbl_Settings_Packages`
                                            On 
                                            `_tbl_Members`.`ActivePackageID`= `_tbl_Settings_Packages`.`PackageID`
                                            where date(`_tbl_Members`.`CreatedOn`)<=date('".$date."')");
      
   foreach($IsPayoutEligible as $Member) {
        
       $memberTree->GetNodeIDs($Member['MemberCode'],"L");
       $totalLeftPV = $memberTree->leftPV;
       $todayLeftPV = $memberTree->todayLeftPV;
       $memberTree->GetNodeIDs($Member['MemberCode'],"R");
       $totalRightPV = $memberTree->rightPV;
       $todayRightPV = $memberTree->todayRightPV;
                                                           
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
                   
           //$payableAmt     = $payablePV*$Member['PVAmount'];      
           $payableAmt     = $payablePV*$Member['BinaryCommission']/100;      
           $chargeAmt      = $payableAmt/10;
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
               ."\tCharges: 10%"
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
                                                       "Charges"                  => "10%",
                                                       "ChargeAmount"             => $chargeAmt==0 ? '0' : $chargeAmt,
                                                       "PayableAmountDebitCharge" => $payfinal==0 ? '0' : $payfinal,
                                                       "processedon"              => date("Y-m-d H:i:s")));  
       if ($payableAmt>0)   {
           $balance = getEarningWalletBalance($Member['MemberID']);
           $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Member['MemberID'],
                                                                     "MemberCode"       => $Member['MemberCode'],
                                                                     "Particulars"      => "Binary Income on ".$date.", Txn ID: ".$id,
                                                                     "TxnDate"          => date("Y-m-d H:i:s"),
                                                                     "Credits"          => $payableAmt==0 ? '0' : $payableAmt,
                                                                     "Debits"           => '0',
                                                                     "AvailableBalance" => $balance+$payableAmt,
                                                                     "Ledger"           => '3',
                                                                     "details"          => ""));
           writelog("Credit Amount:\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
           
           $balance = $balance+$payableAmt;
           $chargeAmt = ($payableAmt/10);
           $balance = $balance-$chargeAmt;
           $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Member['MemberID'],
                                                                     "MemberCode"       => $Member['MemberCode'],
                                                                     "Particulars"      => "Charges 10% Binary Income on ".$date.", Txn ID: ".$id,
                                                                     "TxnDate"          => date("Y-m-d H:i:s"),
                                                                     "Credits"          => '0',
                                                                     "Debits"           => $chargeAmt==0 ? '0' : $chargeAmt,
                                                                     "AvailableBalance" => $balance,
                                                                     "Ledger"           => '30001',
                                                                     "details"          => "")); 
           writelog("Charges Debit:\tDebited: ".$charges."\tWalletTxnID: ".$walletTxnID) ;
       }
   }
   
   // ROI Payouts   1-investment, 2-referal 
   // Package ROI Settlement
   $package_rois = $mysql->select("select * from _roi_payments where date(ROI_DATE)=Date('".$date."') and ROI_TYPE='1'");
   foreach($package_rois as $pr)  {
       $balance = getEarningWalletBalance($pr['MemberID']);
       $balance += +$pr['ROI_AMT'];
       $walletTxnID = $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $pr['MemberID'],
                                                                  "MemberCode"       => $pr['MemberCode'],
                                                                  "Particulars"      => "Package ROI  On".$date,
                                                                  "TxnDate"          => date("Y-m-d H:i:s"),
                                                                  "Credits"          => $pr['ROI_AMT']==0 ? '0' : $pr['ROI_AMT'],
                                                                  "Debits"           => '0',
                                                                  "AvailableBalance" => $balance,
                                                                  "Ledger"           => '2',
                                                                  "details"          => ""));
       writelog("Package ROI Credit Amount:\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
       
       $chargeAmt = ($pr['ROI_AMT']/10);
       $balance = $balance-$chargeAmt;
       $walletTxniD = $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $pr['MemberID'],
                                                                  "MemberCode"       => $pr['MemberCode'],
                                                                  "Particulars"      => "Charge 10% Package ROI on ".$date,
                                                                  "TxnDate"          => date("Y-m-d H:i:s"),
                                                                  "Credits"          => '0',
                                                                  "Debits"           => $chargeAmt==0 ? '0' : $chargeAmt,
                                                                  "AvailableBalance" => $balance,
                                                                  "Ledger"           => '20001',
                                                                  "details"          => "")); 
       writelog("Charges Debit:\tDebited: ".$charges."\tWalletTxnID: ".$walletTxnID) ;
       $mysql->execute("update _roi_payments set IsSettled='1',SettledOn='".date("Y-m-d H:i:s")."', AccountTxnID='".$walletTxnID."', ChargesPercentage='10', ChargeAmount='".$chargeAmt."',CreditToWallet='".($pr['ROI_AMT']-$chargeAmt)."' where ROIID='".$pr['ROIID']."'");
   }
   
   // Referral ROI Settlement
   $referral_rois = $mysql->select("select * from _roi_payments where date(ROI_DATE)=Date('".$date."') and ROI_TYPE='2'");
   foreach($referral_rois as $rr)  {
       $balance = getEarningWalletBalance($rr['MemberID']);
       $balance += +$rr['ROI_AMT'];
       $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $rr['MemberID'],
                                                                 "MemberCode"       => $rr['MemberCode'],
                                                                 "Particulars"      => "Referral ROI  On ".$date,
                                                                 "TxnDate"          => date("Y-m-d H:i:s"),
                                                                 "Credits"          => $rr['ROI_AMT']==0 ? '0' : $rr['ROI_AMT'],
                                                                 "Debits"           => '0',
                                                                 "AvailableBalance" => $balance,
                                                                 "Ledger"           => '4',
                                                                 "details"          => ""));
       writelog("Package ROI Credit Amount:\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
       
       $chargeAmt = ($rr['ROI_AMT']/10);
       $balance = $balance-$chargeAmt;
       $walletTxniD= $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $rr['MemberID'],
                                                                 "MemberCode"       => $rr['MemberCode'],
                                                                 "Particulars"      => "Charge 10% Referral ROI on ".$date,
                                                                 "TxnDate"          => date("Y-m-d H:i:s"),
                                                                 "Credits"          => '0',
                                                                 "Debits"           => $chargeAmt==0 ? '0' : $chargeAmt,
                                                                 "AvailableBalance" => $balance,
                                                                 "Ledger"           => '40001',
                                                                 "details"          => "")); 
       writelog("Charges Debit:\tDebited: ".$charges."\tWalletTxnID: ".$walletTxnID) ;
       $mysql->execute("update _roi_payments set IsSettled='1',SettledOn='".date("Y-m-d H:i:s")."', AccountTxnID='".$walletTxnID."', ChargesPercentage='10', ChargeAmount='".$chargeAmt."',CreditToWallet='".($rr['ROI_AMT']-$chargeAmt)."' where ROIID='".$rr['ROIID']."'");
   } 
   
   $mysql->execute("update _tbl_payout_log set EndedOn='".date("Y-m-d H:i:s")."' where PayoutLogID='".$pid."'");
   echo "<pre>";
        echo (file_get_contents("/home/astrafx/public_html/app/backup/logs/payoutlogs/".$filename));
   echo "</pre>";
   //30     23     *     *     *     /usr/local/bin/php /home/happylife2020/public_html/cron.php
 ?>