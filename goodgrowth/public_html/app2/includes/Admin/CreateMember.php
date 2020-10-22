<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Create Member</span>
    </div>
    <Br>
    <?php
     function validateCreateMemberForm(&$ErrorString) {
            
            global $userData,$Config,$mysql;
            
            if (strlen(trim($_POST['FirstName']))<2) {
                $ErrorString = ErrorMsg("Please enter valid First Name");  
                return false;
            }
            
            if (strlen(trim($_POST['LastName']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Last Name");  
                return false;
            }
            
            if (strlen(trim($_POST['NickName']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Nick Name");  
                return false;
            } 
            
            if (strlen(trim($_POST['DateofBirth']))<2) {
                $ErrorString = ErrorMsg("Please select valid Date of Birth");  
                return false;
            }
            
            $dob = date("Y",strtotime($_POST['DateofBirth']));
            if (!($dob<=$Config['DOB_YEAR_END'] && $dob>$Config['DOB_YEAR_START'])) {
                $ErrorString = ErrorMsg("Please enter valid date of birth, Member must have 18 years old");  
                return false;  
            }
            
            if (!((strlen(trim($_POST['MobileNumber']))==10) && $_POST['MobileNumber']<9999999999 && $_POST['MobileNumber']>6000000000)) {
                $ErrorString = ErrorMsg("Please enter valid Mobile Number");  
                return false;
            }
            
            $DupMobileNumber = $mysql->select("select * from _tbl_Members where MobileNumber='".trim($_POST['MobileNumber'])."'");
            if (sizeof($DupMobileNumber)>0) {
                $ErrorString = ErrorMsg("Mobile number already exists. Please try another mobile number");  
                return false;  
            }
            
            if (strlen(trim($_POST['EmailID']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Email ID");  
                return false;
            }
            
            if (!filter_var(trim($_POST['EmailID']), FILTER_VALIDATE_EMAIL)) {
                $ErrorString = ErrorMsg("Invalid email format. Please enter valid email id");
                 return false;
            }
            
            $DupEmailID = $mysql->select("select * from _tbl_Members where EmailID='".trim($_POST['EmailID'])."'");
            if (sizeof($DupEmailID)>0) {
                $ErrorString = ErrorMsg("Email ID already exists. Please try another Email ID");  
                return false;  
            }
            
            if (strlen(trim($_POST['LoginName']))<2) {
                $ErrorString = ErrorMsg("Please Enter Login Name");  
                return false;
            }
            
            if (strlen(trim($_POST['LoginName']))<3) {
                $ErrorString = ErrorMsg("Login Name must have morethan 3 characters");  
                return false;
            }
            
            $DupLoginName = $mysql->select("select * from _tbl_Members where LoginName='".trim($_POST['LoginName'])."'");
            if (sizeof($DupLoginName)>0) {
                $ErrorString = ErrorMsg("LoginName already exists. Please try another LoginName");  
                return false;  
            }
            
            if (strlen(trim($_POST['LoginPassword']))<2) {
                $ErrorString = ErrorMsg("Please enter Login Password");  
                return false;
            }
            
            if (strlen(trim($_POST['LoginPassword']))<6) {
                $ErrorString = ErrorMsg("Login password must have morethan 6 characters");  
                return false;
            }
             
            return true;
        }
        
        if (isset($_POST['CreateMemberBtn'])) {
            
            $res = validateCreateMemberForm($ErrorString);
            if ($res) {
                 $plan = $mysql->select("select * from _tbl_Plans where PlanID='".$_POST['Plan']."'");
                 
                 $PlanUpgradedA=0;
                $PlanUpgradedB=0;
                $PlanUpgradedC=0;
                $PlanUpgradedD=0;
                
                if ($plan[0]['PlanID']==1) {
                    $PlanUpgradedA='1';
                    $PlanUpgradedB='0';
                    $PlanUpgradedC='0';
                    $PlanUpgradedD='0';
                }
                if ($plan[0]['PlanID']==2) {
                    $PlanUpgradedA='0';
                    $PlanUpgradedB='1';
                    $PlanUpgradedC='0';
                    $PlanUpgradedD='0';
                }
                
                if ($plan[0]['PlanID']==3) {
                    $PlanUpgradedA='0';
                    $PlanUpgradedB='0';
                    $PlanUpgradedC='1';
                    $PlanUpgradedD='0';
                }
                
                if ($plan[0]['PlanID']==4) {
                    $PlanUpgradedA='0';
                    $PlanUpgradedB='0';
                    $PlanUpgradedC='0';
                    $PlanUpgradedD='1';
                }
                
                $ID = $mysql->insert("_tbl_Members",array("FirstName"       => trim($_POST['FirstName']),
                                                          "LastName"        => trim($_POST['LastName']),
                                                          "NickName"        => trim($_POST['NickName']),
                                                          "Sex"             => trim($_POST['Sex']),
                                                          "DateOfBirth"     => trim($_POST['DateofBirth']),
                                                          "MobileNumber"    => trim($_POST['MobileNumber']),
                                                          "EmailID"         => trim($_POST['EmailID']),
                                                          "MemberUserName"  => trim($_POST['LoginName']),
                                                          "MemberPassword"  => trim($_POST['LoginPassword']),
                                                          "PlanUpgradedA"   => $PlanUpgradedA,
                                                          "PlanUpgradedB"   => $PlanUpgradedB,
                                                          "PlanUpgradedC"   => $PlanUpgradedC,
                                                          "PlanUpgradedD"   => $PlanUpgradedD,
                                                          "IsAdmin"         => "0",
                                                          "Address"         => trim($_POST['Address']),
                                                          "CityName"        => trim($_POST['CityName']),
                                                          "DistrictName"    => trim($_POST['DistrictName']),
                                                          "StateName"       => trim($_POST['StateName']),
                                                          "CountryName"     => trim($_POST['CountryName']),
                                                          "PinCode"         => trim($_POST['PinCode']),
                                                          "PlanID"          => $plan[0]['PlanID'],
                                                          "PlanString"      => $plan[0]['PlanString'],
                                                          "ReferedBy"       => $userData["MemberID"],
                                                          "CreatedOn"       => date("Y-m-d H:i:s")));
                $Count = $mysql->select("select MemberID from _tbl_Members where date(CreatedOn)=date('".date("Y-m-d")."')");
                $Count = sizeof($Count)+1;
                $Code="GGA".(strlen(date("m"))==0 ? "0".date("m") : date("m")).(strlen(date("d"))==0 ? "0".date("d") : date("d"));
                if (strlen($Count)==3) {
                      $Code .= $Count;
                }
                if (strlen($Count)==2) {
                      $Code .= "0".$Count;
                }
                 if (strlen($Count)==1) {
                      $Code .= "00".$Count;
                }
                
                $mysql->execute("update _tbl_Members set MemberCode='".$Code."' where MemberID=".$ID);
                
                $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => "1",
                                                                "TxnDate"       => date("Y-m-d H:i:s"),
                                                                "Particulars"   => "ReceviedCash/".$Code."/ByAdmin",
                                                                "ActualAmount"  => $plan[0]['PlanAmount'],
                                                                "CreditAmount"  => $plan[0]['PlanAmount'],
                                                                "DebitAmount"   => "0",
                                                                "BalanceAmount" => getBalance("1")+$plan[0]['PlanAmount'],
                                                                "Ledger"        => "10"));
                                                                
                $WalletID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"        => $ID,
                                                                            "TxnDate"         => date("Y-m-d H:i:s"),
                                                                            "Particulars"     => "WalletRefill/".$Code."/ByAdmin",
                                                                            "ActualAmount"    => $plan[0]['PlanAmount'],
                                                                            "CreditAmount"    => $plan[0]['PlanAmount'],
                                                                            "DebitAmount"     => "0",
                                                                            "BalanceAmount"   => $plan[0]['PlanAmount'],
                                                                            "Ledger"          => "11"));
                                                       
                $ReceiptID = $mysql->insert("_tbl_Accounts_Receipts", array("MemberID"        => $ID,
                                                                            "MemberCode"      => $Code,
                                                                            "ReceiptNo"      => "",
                                                                            "TxnDate"         => date("Y-m-d H:i:s"),
                                                                            "Particulars"     => "For refill wallet ID: ".$Code,
                                                                            "ReceiptAmount"   => $plan[0]['PlanAmount'],
                                                                            "TxnID"           => $WalletID,
                                                                            "MemberName"      => $_POST['FirstName']." ".$_POST['LastName'],
                                                                            "MemberMobileNumber" => trim($_POST['MobileNumber']),
                                                                            "MemberEmailID"   => trim($_POST['EmailID']),
                                                                            "MemberAddress"   => $_POST['Address'],
                                                                            "CityName"        => trim($_POST['CityName']),
                                                                            "DistrictName"    => trim($_POST['DistrictName']),
                                                                            "StateName"       => trim($_POST['StateName']),
                                                                            "CountryName"     => trim($_POST['CountryName']),
                                                                            "PinCode"         => trim($_POST['PinCode'])));
               
               $mysql->execute("update _tbl_Wallet_Transactions set ReceiptID='".$ReceiptID."' where WalletTransactionID='".$ReceiptID."'");                                             
                                                                
                $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"       => $data[0]['MemberID'],
                                                                                   "TxnDate"        => date("Y-m-d H:i:s"),
                                                                                   "Particulars"    => "CreateMember/".$Code."/From:Admin/Plan:".$plan[0]['PlanString'],
                                                                                   "ActualAmount"   => $plan[0]['PlanAmount'],
                                                                                   "CreditAmount"   => "0",
                                                                                   "DebitAmount"    => $plan[0]['PlanAmount'],
                                                                                   "BalanceAmount"  => "0",
                                                                                   "Ledger"         => "2"));
                //Invoice
                $InvoiceID = Invoice::CreateInvoice(array("MemberID"           => $ID,
                                                          "MemberCode"         => $Code,
                                                          "Particulars"        => "CreateMember/".$Code."/From:Admin/Plan:".$plan[0]['PlanString'],
                                                          "InvoiceAmount"      => $plan[0]['PlanAmount'],
                                                          "TxnID"              => $ACTransactionID,
                                                          "MemberName"         => $_POST['FirstName'],
                                                          "MemberMobileNumber" => trim($_POST['MobileNumber']),
                                                          "MemberEmailID"      => trim($_POST['EmailID']),
                                                          "MemberAddress"      => $_POST['Address'],
                                                          "CityName"           => trim($_POST['CityName']),
                                                          "DistrictName"       => trim($_POST['DistrictName']),
                                                          "StateName"          => trim($_POST['StateName']),
                                                          "CountryName"        => trim($_POST['CountryName']),
                                                          "PinCode"            => trim($_POST['PinCode'])));
                                                       
                $smstxt= "Dear ".trim($_POST['FirstName']).", Your account has been created. Your account ID: ".$Code." and Login Name: ".$_POST['LoginName'].", LoginPassword: ".$_POST['LoginPassword']."  -Thanks GoodGrowth";
                MobileSMS::sendSMS($_POST['MobileNumber'],$smstxt,$ID);
                echo SuccessMsg("Member Created Successfully. Member ID: ".$Code);    
                unset($_POST);
            } else {
                echo $ErrorString;
            }   
        }
?>
    <form action="" method="post">
    <table cellspacing="0" cellpadding="6" style="width:100%">
        <tr>
            <td style="width:150px;padding-bottom:0px;padding-top:0px">Plan</td>
            <td style="padding-bottom:8px;padding-top:0px;padding-left:3px">
                <select name="Plan" style="width:250px">
                    <?php 
                        $plans = $mysql->select("select * from _tbl_Plans");
                        foreach($plans as $plan) {
                            ?>
                                <option value="<?php echo $plan['PlanID'];?>"><?php echo $plan['PlanString'];?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:150px;padding-bottom:0px;padding-top:0px">First Name</td>
            <td style="padding-bottom:0px;padding-top:0px;padding-left:3px">
                <input type="text" name="FirstName" placeholder="First Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Last Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <input type="text" name="LastName" placeholder="Last Name" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : '';?>">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Nick Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <input type="text" name="NickName" placeholder="Nick Name" value="<?php echo isset($_POST['NickName']) ? $_POST['NickName'] : '';?>">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Date of Birth</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <input id="datepicker" type="text" name="DateofBirth" placeholder="Date Of Birth" style="min-width:120px !important" value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : '';?>">
               &nbsp;&nbsp;&nbsp;Sex&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
                <select name="Sex">
                    <option value="Male">Male</option>
                    <option value="FeMale">FeMale</option>
                </select>
            </td>
        </tr>  
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Mobile Number</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <input type="text" name="MobileNumber" placeholder="Mobile Number" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : '';?>">
            </td>
        </tr> 
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Email ID</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="EmailID" placeholder="Email Address"  value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : '';?>"> </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Login Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="LoginName" placeholder="Login Name" value="<?php echo isset($_POST['LoginName']) ? $_POST['LoginName'] : '';?>"> </td>
        </tr>  
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Login Password</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="password" name="LoginPassword" placeholder="Login Password" value="<?php echo isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] : '';?>"> </td>
        </tr>
                <tr>
            <td style="padding-bottom:0px;padding-top:0px">Address</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="Address" placeholder="Address" value="<?php echo isset($_POST['Address']) ? $_POST['Address'] : '';?>"> </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">City Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="CityName" placeholder="City Name" value="<?php echo isset($_POST['CityName']) ? $_POST['CityName'] : '';?>"> </td>
        </tr> 
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">District Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="DistrictName" placeholder="District Name" value="<?php echo isset($_POST['DistrictName']) ? $_POST['DistrictName'] : '';?>"> </td>
        </tr>  
         <tr>
            <td style="padding-bottom:0px;padding-top:0px">State Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="StateName" placeholder="State Name" value="<?php echo isset($_POST['StateName']) ? $_POST['StateName'] : '';?>"> </td>
        </tr>
         <tr>
            <td style="padding-bottom:0px;padding-top:0px">Country Name</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><select name="CountryName"><option value="India">India</option></select></td>
        </tr> 
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">PinCode</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="PinCode" placeholder="Pin Code" value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : '';?>"></td>
        </tr>           
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="SubmitBtn" name="CreateMemberBtn" value="Create Member"></td>
        </tr>
    </table>
    </form>
</div>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd",
    
    });
    
  } );
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script> 
   