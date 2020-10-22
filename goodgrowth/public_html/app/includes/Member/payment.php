<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1"><span>Payment Information</span></div>
    <Br>
        <?php
            $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$_POST['Plan']."'");
            if (sizeof($planDetails)==0) {
                ?>
                 <span style="color:red">Access denied. </span>
                <?php
            }  else {
            
                if (isset($_POST['ProcessBtn'])) {
                    
                    $particulars = "Purchase/Plan:".$planDetails[0]['PlanString']."/From:".$userData['MemberCode'];
                 
                    /*$mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => "1",
                                                                    "TxnDate"       => date("Y-m-d H:i:s"),
                                                                    "Particulars"   => $particulars,
                                                                    "ActualAmount"  => $planDetails[0]['PlanAmount'],
                                                                    "CreditAmount"  => "0",
                                                                    "DebitAmount"   => $planDetails[0]['PlanAmount'],
                                                                    "BalanceAmount" => getBalance("1")+$planDetails[0]['PlanAmount'],
                                                                    "Ledger"        => "3"));*/
                    $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => $userData['MemberID'],
                                                                                       "TxnDate"       => date("Y-m-d H:i:s"),
                                                                                       "Particulars"   => $particulars,
                                                                                       "ActualAmount"  => $planDetails[0]['PlanAmount'],
                                                                                       "CreditAmount"  => "0",
                                                                                       "DebitAmount"   => $planDetails[0]['PlanAmount'],
                                                                                       "BalanceAmount" => getBalance($userData['MemberID'])-$planDetails[0]['PlanAmount'],
                                                                                       "Ledger"        => "3"));
                                                                                       
                    //Invoice
                    $InvoiceID = Invoice::CreateInvoice(array("MemberID"           => $userData['MemberID'],
                                                              "MemberCode"         => $userData['MemberCode'],
                                                              "Particulars"        => $particulars,
                                                              "InvoiceAmount"      => $planDetails[0]['PlanAmount'],
                                                              "TxnID"              => $ACTransactionID,
                                                              "MemberName"         => $userData['FirstName'],
                                                              "MemberMobileNumber" => $userData['MobileNumber'],
                                                              "MemberEmailID"      => $userData['EmailID'],
                                                              "MemberAddress"      => $userData['Address'],
                                                              "CityName"           => $userData['CityName'],
                                                              "DistrictName"       => $userData['DistrictName'],
                                                              "StateName"          => $userData['StateName'],
                                                              "CountryName"        => $userData['CountryName'],
                                                              "PinCode"            => $userData['PinCode']));
                                                          
                    if ($planDetails[0]['PlanID']==1) {
                        $PlanUpgradedA = 1;
                        $PlanUpgradedB = 0;
                        $PlanUpgradedC = 0;
                        $PlanUpgradedD = 0;
                        $mysql->execute("update _tbl_Members set PlanUpgradedA='1' where MemberID='".$userData['MemberID']."' ");
                        $_SESSION['UserData']['PlanUpgradedA']=1;
                    }
                    
                    if ($planDetails[0]['PlanID']==2) {
                        $PlanUpgradedA = 0;
                        $PlanUpgradedB = 1;
                        $PlanUpgradedC = 0;
                        $PlanUpgradedD = 0;
                        $mysql->execute("update _tbl_Members set PlanUpgradedB='1' where MemberID='".$userData['MemberID']."' ");
                        $_SESSION['UserData']['PlanUpgradedB']=1;
                    }
                
                    if ($planDetails[0]['PlanID']==3) {
                        $PlanUpgradedA = 0;
                        $PlanUpgradedB = 0;
                        $PlanUpgradedC = 1;
                        $PlanUpgradedD = 1;
                        $mysql->execute("update _tbl_Members set PlanUpgradedC='1' where MemberID='".$userData['MemberID']."' ");
                        $_SESSION['UserData']['PlanUpgradedC']=1;
                    }
                    
                      if ($planDetails[0]['PlanID']==4) {
                        $PlanUpgradedA = 0;
                        $PlanUpgradedB = 0;
                        $PlanUpgradedC = 0;
                        $PlanUpgradedD = 1;
                        $mysql->execute("update _tbl_Members set PlanUpgradedC='1' where MemberID='".$userData['MemberID']."' ");
                        $_SESSION['UserData']['PlanUpgradedD']=1;
                    }
                    
                    
                    $smstxt= "Dear ".trim($d[0]['FirstName']).", Your have purchased ".$planDetails[0]['PlanString']." for INR. ".$plan[0]['PlanAmount']." has been debited. Your current Balance Rs. ".number_format(getBalance($userData['MemberID']),2)."  -Thanks GoodGrowth";
                    file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($userData['MobileNumber']));
                    unset($_POST);
                    echo "Purchase Completed";
                    echo "<style>#frm{display:none}</style>";
                
                }
        ?>
        <form action="" method="post" id="frm">
            <input type="hidden" value="<?php echo $_POST['Plan'];?>" name="Plan">
            <table cellspacing="0" cellpadding="6" style="width:100%">
                <tr>
                    <td style="width:150px">Purchase Plan</td>
                    <td><?php echo $planDetails[0]['PlanString'];?></td>
                </tr>
                <tr>
                    <td>Purchase Amount</td>
                    <td>INR <?php echo number_format($planDetails[0]['PlanAmount'],2);?></td>
                </tr>
                <tr>
                    <td>Wallet Balance</td>
                    <td>INR <?php echo number_format(getBalance($userData['MemberID']),2);?></td>
                </tr>   
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php if (getBalance($userData['MemberID'])>$planDetails[0]['PlanAmount']) {?>    
                        <input type="submit" class="SubmitBtn" name="ProcessBtn" value="Pay Now">
                        <?php } else { ?>
                        <span style="color:red">Insufficiant fund to proceed payment</span>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </form>
        <?php } ?>
    </div>  
  <br><br>
  