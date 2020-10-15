 <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payout/task">Payout</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payout/task">Logs</a></li>
        </ul>
    </div>
           <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Generate EPins</div>
                </div>
                <div class="card-body">
 <?php
    include_once("/home/happylife2020/public_html/config.php");
    
    $date = date("Y-m-d");
    $date = "2020-01-20";
    $memberTree->process_date=$date; 
    $filename="temp_payout_".date("Y_m_d_H_i_s").".txt";
    function writelog($text) {
        global $filename;
        $myfile = fopen("/home/happylife2020/public_html/app/includes/Admin/Payout/Logs/".$filename, "a") or die("Unable to open file!");
        $txt = "user id date";
        fwrite($myfile, "\n[".date("Y-m-d H:i:s")."]\t".$text);
        fclose($myfile);
    }

    writelog("=== Binary Eligible Starts ===");
    //$IsBinaryEligible = $mysql->select("select * from `_tbl_Members` where `IsBinaryEligible`='0'");
    $IsBinaryEligible = $mysql->select("select * from `_tbl_Members`");
    foreach($IsBinaryEligible as $m) {
        $binary_eligible = $memberTree->IsBinaryEligible($m['MemberCode'],$left,$right);
        if ($binary_eligible) {
            writelog($m['MemberCode']."\t... eligible\tL:".sizeof($left)."\tR:".sizeof($right));
           // $mysql->execute("update `_tbl_Members` set `IsBinaryEligible`='1'  where `MemberCode`='".$m['MemberCode']."'");
        } else {
            writelog($m['MemberCode']."\tnot eligible\tL:".sizeof($left)."\tR:".sizeof($right));
        }
    }
    writelog("=== Binary Eligible End ==="); 
     
    writelog("\n=== Payout Eligible Starts ===");
    $IsPayoutEligible = $mysql->select("select * from `_tbl_Members` where `IsPayoutEligible`='0'");
    $IsPayoutEligible = $mysql->select("select * from `_tbl_Members` ");
    foreach($IsPayoutEligible as $m) {
        $payout_eligible = $memberTree->IsPayoutEligible($m['MemberCode'],$left,$right);
        if ($payout_eligible==true) {
            writelog($m['MemberCode']."\t... eligible\tL:".sizeof($left)."\tR:".sizeof($right));
            //$mysql->execute("update `_tbl_Members` set `IsPayoutEligible`='1'  where `MemberCode`='".$m['MemberCode']."'");
        }  else {
            writelog($m['MemberCode']."\tnot eligible\tL:".sizeof($left)."\tR:".sizeof($right));
            //$mysql->execute("update `_tbl_Members` set `IsPayoutEligible`='0'  where `MemberCode`='".$m['MemberCode']."'");
        }
    }
    writelog("=== Payout Eligible End ==="); 
    
     
    
    writelog("\n=== Payout Process Starts ===");
    
    $IsPayoutEligible = $mysql->select("select * from `_tbl_Members` 
                                            left Join  `_tbl_Settings_Packages`
                                            On 
                                            `_tbl_Members`.`CurrentPackageID`= `_tbl_Settings_Packages`.`PackageID`
                                            where date(`_tbl_Members`.`CreatedOn`)<=date('".$date."')");
                                            // and `_tbl_Members`.`IsPayoutEligible`='1'
      
   foreach($IsPayoutEligible as $Member) {
        
       $memberTree->GetNodeIDs($Member['MemberCode'],"L");
       $totalLeftPV = $memberTree->leftPV;
       $todayLeftPV = $memberTree->todayLeftPV;
       $memberTree->GetNodeIDs($Member['MemberCode'],"R");
       $totalRightPV = $memberTree->rightPV;
       $todayRightPV = $memberTree->todayRightPV;
                                                           
       if ($todayLeftPV<$todayRightPV) {
           $minimum = $todayLeftPV;
       }
       
       if ($todayLeftPV>$todayRightPV) {
           $minimum = $todayRightPV;
       }
      
       if ($todayLeftPV==$todayRightPV) {
           $minimum = $todayLeftPV;
       }
       
       $payablePV = PayablePV($minimum,$Member['CutOffPV'],$Member['PV']);
       
       $CompanyLeft = $todayLeftPV-$payablePV;
       $CompanyRight = $todayRightPV-$payablePV;
       
       $payableAmt = $payablePV*$Member['PVAmount'];
       
       if ($Member['IsPayoutEligible']==0) {
         $CompanyLeft=$todayLeftPV;  
         $CompanyRight=$todayRightPV; 
         $payableAmt=0;
         $payablePV=0; 
       }
                          //$Member['PV'] 20
                          
                            $chargeAmt = $payableAmt/10;
               $payfinal = $payableAmt-$chargeAmt;
               
       writelog("Member: ".$Member['MemberCode']
               ."\tLeft: ".sprintf('%04d',$totalLeftPV)
               ."\tToday Left:".sprintf('%04d',$todayLeftPV)
               ."\t\tRight: ".sprintf('%04d',$totalRightPV)
               ."\tToday Right: ".sprintf('%04d',$todayRightPV)
               ."\tTodayPayoutPV: ".sprintf('%04d',$minimum)
               ."\tPackage: ".sprintf('%04d',$Member['PackageName'])
               ."\tEligible Minimum PayoutPV: 10"
               ."\tEligible Maximum PayoutPV: ".sprintf('%04d',$Member['CutOffPV'])
               ."\tPayable PayoutPV: ".sprintf('%04d',$payablePV)
               ."\tPayable Amount: ".($payableAmt) 
               ."\tCompanyLeft: ".sprintf('%04d',$CompanyLeft) 
               ."\tCompanyRight: ".sprintf('%04d',$CompanyRight)
               ."\tCompanyRight: ".sprintf('%04d',$CompanyRight)
               ."\tIsPayoutEligible: ".sprintf('%04d',$CompanyRight)
               ."\tIsPayoutEligible: ".$Member['IsPayoutEligible']
               ."\tCharges: 10%"
               ."\ChargeAmount: ".sprintf('%04d',$chargeAmt)
               ."\tPayableAmountDebitCharge: ".sprintf('%04d',$payfinal)
               ."\tprocessedon: ".date("Y-m-d H:i:s")
               );
               
             
               
   /*    $id=    $mysql->insert("_tbl_payoutsummary",array("PayoutProcessDate"       => $date,
                                                         "MemberID"                => $Member['MemberID'],
                                                         "MemberCode"              => $Member['MemberCode'],
                                                         "TotalLeft"               => $totalLeftPV == 0 ? '0' : $totalLeftPV,
                                                         "TodayLeft"               => $todayLeftPV == 0 ? '0' : $todayLeftPV,
                                                         "TotalRight"              => $totalRightPV==0 ? '0' : $totalRightPV,
                                                         "TodayRight"              => $todayRightPV==0 ? '0' : $todayRightPV,
                                                         "TodayPayoutPV"           => $minimum==0 ? '0' : $minimum,
                                                         "PackageName"             => $Member['PackageName'],
                                                         "PackageID"               => $Member['CurrentPackageID'],
                                                         "EligibleMinimumPayoutPV" => "10",
                                                         "EligibleMaximumPayoutPV" => $Member['CutOffPV'],
                                                         "PayablePV"               => $payablePV==0 ? '0' : $payablePV,
                                                         "PayableAmount"           => $payableAmt==0 ? '0' : $payableAmt,
                                                         "CompanyLeft"             => $CompanyLeft  == 0 ? '0' : $CompanyLeft,
                                                         "CompanyRight"            => $CompanyRight == 0 ? '0' : $CompanyRight,
                                                         "IsPayoutEligible"        => $Member['IsPayoutEligible'],
                                                         "Charges"                  => "10%",
                                                         "ChargeAmount"             => $chargeAmt==0 ? '0' : $chargeAmt,
                                                         "PayableAmountDebitCharge" => $payfinal==0 ? '0' : $payfinal,
                                                         "processedon"             => date("Y-m-d H:i:s")));       */
       if ($payableAmt>0)   {
           $balance = getEarningWalletBalance($Member['MemberID']);
           /*$walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"=>$Member['MemberID'],
                                                                     "MemberCode"=>$Member['MemberID'],
                                                                     "Particulars"=>"Payout process on ".$date.", Txn ID: ".$id,
                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                     "Credits"=>$payableAmt==0 ? '0' : $payableAmt,
                                                                     "Debits"=>'0',
                                                                     "AvailableBalance"=>$balance+$payableAmt,
                                                                     "Ledger"=>'0',
                                                                     "details"=>""));*/
           //writelog("Credit Amount: TxnID: ".$id."\tOldBalance: ".$balance."\tNewBalance: ".($balance+$payableAmt)."\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
           writelog("Credit Amount:\tCredited: ".$payableAmt."\tWalletTxnID: ".$walletTxnID) ;
           
           
           $balance = $balance+$payableAmt;
           $charges = ($payableAmt/10);
           $balance = $balance-$charges;
          /* $walletTxnID= $mysql->insert("_tbl_wallet_earnings",array("MemberID"=>$Member['MemberID'],
                                                                     "MemberCode"=>$Member['MemberID'],
                                                                     "Particulars"=>"Charges 10% Payout process on ".$date.", Txn ID: ".$id,
                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                     "Credits"=>'0',
                                                                     "Debits"=>$charges==0 ? '0' : $charges,
                                                                     "AvailableBalance"=>$balance,
                                                                     "Ledger"=>'1',
                                                                     "details"=>"")); */
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
   ?>
 
     <?php    
     echo "<pre>"       ;
   echo (file_get_contents("/home/happylife2020/public_html/app/includes/Admin/Payout/Logs/".$filename));
   echo "</pre>"       ;
 ?>
 </div>
 </div>
 </div>
 </div>
 </div>
 