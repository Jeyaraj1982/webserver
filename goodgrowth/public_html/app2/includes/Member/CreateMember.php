<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            
            $DupLoginName = $mysql->select("select * from _tbl_Members where MemberLoginName='".trim($_POST['LoginName'])."'");
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
             
             $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$_POST['Plan']."'");
             if (getBalance($userData['MemberID'])<$planDetails[0]['PlanAmount']) {
                  $ErrorString = ErrorMsg("Insufficiant Fund");  
                  return false;
             }
         
            return true;
        }
        
        if (isset($_POST['CreateMemberBtn'])) {
            
            $res = validateCreateMemberForm($ErrorString);
            
            if ($res) {
                
                $PlanUpgradedA=0;
                $PlanUpgradedB=0;
                $PlanUpgradedC=0;
                $PlanUpgradedD=0;
                
                $plan = $mysql->select("select * from _tbl_Plans where PlanID='".$_POST['Plan']."'");
                
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
                                                          "Address"         => trim($_POST['Address']),
                                                          "CityName"        => trim($_POST['CityName']),
                                                          "DistrictName"    => trim($_POST['DistrictName']),
                                                          "StateName"       => trim($_POST['StateName']),
                                                          "CountryName"     => trim($_POST['CountryName']),
                                                          "PinCode"         => trim($_POST['PinCode']),
                                                          "PlanUpgradedA"    => $PlanUpgradedA,
                                                          "PlanUpgradedB"    => $PlanUpgradedB,
                                                          "PlanUpgradedC"    => $PlanUpgradedC,
                                                          "PlanUpgradedD"    => $PlanUpgradedD,
                                                          "IsAdmin"          => "0",
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
                if (isset($_GET['parent'])) {
                    $mysql->insert("_tbl_Member_Placement",array("ParentID"=>$_GET['parent'],"ChildID"=>$ID,"ChildPosition"=>$_GET['C'],"Plan"=>$plan[0]['PlanID'],"PlacedBy"=>$userData['MemberID']));     
                } else {
                    $mysql->insert("_tbl_Member_Placement",array("ParentID"=>$userData['MemberID'],"ChildID"=>$ID,"ChildPosition"=>$_GET['C'],"Plan"=>$plan[0]['PlanID'],"PlacedBy"=>$userData['MemberID']));    
                }
                echo SuccessMsg("Member Created Successfully. Member ID: ".$Code);                    
                 
                 $particulars = "CreateMember/".$Code."/From:".$userData['MemberCode']."/Plan:".$plan[0]['PlanString'];
                 
                 $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => $userData['MemberID'],
                                                                                    "TxnDate"       => date("Y-m-d H:i:s"),
                                                                                    "Particulars"   => $particulars,
                                                                                    "ActualAmount"  => $plan[0]['PlanAmount'],
                                                                                    "CreditAmount"  => "0",
                                                                                    "DebitAmount"   => $plan[0]['PlanAmount'],
                                                                                    "BalanceAmount" => getBalance($userData['MemberID'])-$plan[0]['PlanAmount'],
                                                                                    "Ledger"        => "3"));
                                                                                    
                $InvoiceID = Invoice::CreateInvoice(array("MemberID"           => $ID,
                                                          "MemberCode"         => $Code,
                                                          "Particulars"        => $particulars,
                                                          "InvoiceAmount"      => $plan[0]['PlanAmount'],
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
                  //Points update
                  $mysql->insert("_tbl_Member_Points",
                                array("MemberID"=>$userData['MemberID'],
                                      "MemberCode"=>$userData['MemberCode'],
                                      "EarnPoint"=>"500",
                                      "DirectMemberID"=>$ID,
                                      "DirectMemberCode"=>$Code,
                                      "PointsUpdated"=>date("Y-m-d H:i:s")));
                                      
                  $smstxt= "Dear ".trim($_POST['FirstName']).", Your account has been created. Your account ID: ".$Code." and Login Name: ".$_POST['LoginName'].", LoginPassword: ".$_POST['LoginPassword']."  -Thanks GoodGrowth";
                  //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($_POST['MobileNumber']));
                  MobileSMS::sendSMS($_POST['MobileNumber'],$smstxt);
                  $smstxt= "Dear ".trim($d[0]['FirstName']).", Your INR. ".$plan[0]['PlanAmount']." has been debited for create new Member ".$Code.". Your current Balance Rs. ".number_format(getBalance($userData['MemberID']),2)."  -Thanks GoodGrowth";
                  //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($userData['MobileNumber']));
                  MobileSMS::sendSMS($userData['MobileNumber'],$smstxt);
                  unset($_POST);
                 
                 if ($plan[0]['PlanID']==1) {
 echo "<script>location.href='dashboard.php?action=GOLDWAY&msg=Member Created Successfully. Member ID: ".$Code."';</script>";                }
                if ($plan[0]['PlanID']==2) {
                 echo "<script>location.href='dashboard.php?action=MYGOLD&msg=Member Created Successfully. Member ID: ".$Code."';</script>";}
                
                if ($plan[0]['PlanID']==3) {
                     echo "<script>location.href='dashboard.php?action=SUPERGOLD&msg=Member Created Successfully. Member ID: ".$Code."';</script>";
                }
                if ($plan[0]['PlanID']==4) {
                     echo "<script>location.href='dashboard.php?action=G3&msg=Member Created Successfully. Member ID: ".$Code."';</script>";
                }
                
            } else {
                echo $ErrorString;
            }   
        }
?>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           Create Member
        </div>
        <div class="panel-body list">
            <div style="text-align:center;padding-bottom:10px">Sponsor Information</div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="form-group row"  style="margin:0px auto;border:1px dotted #ccc;padding: 5px;" >                  
                        <div class="col-sm-2 control-label" style="padding-right:0px;padding-left:0px"><img style="height:90px;width:90px;"></div>
                        <div class="col-sm-10">
                            <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                <label class="col-sm-3 control-label">Sponsor ID:&nbsp;</label>
                                <div class="col-sm-9"><?php echo $userData['MemberCode'];?></div>
                            </div>
                            <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                <label class="col-sm-3 control-label">Name:&nbsp;</label>
                                <div class="col-sm-9"><?php echo $userData['FirstName']." ".$userData['LastName'];?></div>
                            </div>
                            <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                <label class="col-sm-3 control-label">Nick Name:&nbsp;</label>
                                <div class="col-sm-9"><?php echo $userData['NickName'];?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" >Parent ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;<?php
            if (isset($_GET['parent'])) {
                    $dData = $mysql->select("select * from _tbl_Members where MemberID='".$_GET['parent']."'");
                    echo $dData[0]['FirstName']." ".$dData[0]['LastName'];               
                } else {
                    echo $userData['FirstName']." ".$userData['LastName'];
                }
            ?></div>
            <div class="col-sm-12" >Parent Code   :&nbsp;<?php
            if (isset($_GET['parent'])) {
                     $dData = $mysql->select("select * from _tbl_Members where MemberID='".$_GET['parent']."'");
                     echo $dData[0]['MemberCode'];
                } else {
                    echo $userData['MemberCode'];
                }
            ?></div>
            <div class="col-sm-12" >Position &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo ($_GET['C']=="L")  ? "Left" : "Right";?></div>
            </div> 
            <div class="form-group row">
                <div class="col-sm-7">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Plan</div>
                            <div class="col-sm-9">
                                <select name="Plan" style="width:250px" class="form-control">
                                    <?php 
                                        $plans = $mysql->select("select * from _tbl_Plans where PlanID='".$_GET['P']."'");
                                        foreach($plans as $plan) {
                                            ?>
                                                <option value="<?php echo $plan['PlanID'];?>"><?php echo $plan['PlanString'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">First Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" class="form-control" name="FirstName" placeholder="First Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Last Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="LastName" placeholder="Last Name" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Nick Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="NickName" placeholder="Nick Name" value="<?php echo isset($_POST['NickName']) ? $_POST['NickName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Date of Birth</div>
                            <div class="col-sm-9"><input id="datepicker" class="form-control" type="text" name="DateofBirth" placeholder="Date Of Birth" style="min-width:120px !important" value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Sex</div>
                            <div class="col-sm-9">
                                <select name="Sex" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="FeMale">FeMale</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Mobile Number</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="MobileNumber" placeholder="Mobile Number" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Email ID</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="EmailID" placeholder="Email Address"  value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Login Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="LoginName" placeholder="Login Name" value="<?php echo isset($_POST['LoginName']) ? $_POST['LoginName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Login Password</div>
                            <div class="col-sm-9"><input type="password" class="form-control" name="LoginPassword" placeholder="Login Password" value="<?php echo isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Address</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="Address" placeholder="Address" value="<?php echo isset($_POST['Address']) ? $_POST['Address'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">City Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="CityName" placeholder="City Name" value="<?php echo isset($_POST['CityName']) ? $_POST['CityName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">District Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="DistrictName" placeholder="District Name" value="<?php echo isset($_POST['DistrictName']) ? $_POST['DistrictName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">State Name</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="StateName" placeholder="State Name" value="<?php echo isset($_POST['StateName']) ? $_POST['StateName'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">Country Name</div>
                            <div class="col-sm-9"><select class="form-control" name="CountryName"><option value="India">India</option></select></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 control-label">PinCode</div>
                            <div class="col-sm-9"><input type="text" class="form-control" name="PinCode" placeholder="Pin Code" value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : '';?>"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 control-label"><input type="checkbox">INR. <?php echo $plans[0]['PlanAmount'];?> will debit in your wallet.</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 control-label"><input type="submit" class="btn btn-outline btn-success" name="CreateMemberBtn" value="Create Member"></div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5" style="vertical-align:top;border-left:1px solid #f1f1f1;">
                    <?php
                            if (isset($_POST['DuplicateMemberBtn'])) {
                                 $err=0;
                
                $plan = $mysql->select("select * from _tbl_Plans where PlanID='1'");
                if (getBalance($userData['MemberID'])<$plan[0]['PlanAmount']) {
                   echo ErrorMsg("Insufficiant Fund");  
                   $err++;
                } 
                
                if (strlen(trim($_POST['NickName']))<2) {
                    echo  ErrorMsg("Please enter valid Nick Name");  
                    $err++;
                }
                
                if (strlen(trim($_POST['LoginName']))<3) {
                    echo ErrorMsg("Login Name must have morethan 3 characters");  
                    $err++;
                }
                
                $DupLoginName = $mysql->select("select * from _tbl_Members where MemberLoginName='".trim($_POST['LoginName'])."'");
                if (sizeof($DupLoginName)>0) {
                    echo ErrorMsg("LoginName already exists. Please try another LoginName");  
                    $err++;
                }
                
                if (strlen(trim($_POST['LoginPassword']))<6) {
                    echo ErrorMsg("Login password must have morethan 6 characters");  
                    $err++;
                }
                        
                if ($err==0) {
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
                            
                            $u = $mysql->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'");
                            
                            $ID = $mysql->insert("_tbl_Members",array("FirstName"       => trim($u[0]['FirstName']),
                                                                      "LastName"        => trim($u[0]['LastName']),
                                                                      "NickName"        => trim($u[0]['NickName']),
                                                                      "Sex"             => trim($u[0]['Sex']),
                                                                      "DateOfBirth"     => trim($u[0]['DateOfBirth']),
                                                                      "MobileNumber"    => trim($u[0]['MobileNumber']),
                                                                      "EmailID"         => trim($u[0]['EmailID']),
                                                                      "MemberUserName"  => trim($_POST['MemberUserName']),
                                                                      "MemberPassword"  => trim($_POST['MemberPassword']),
                                                                      "Address"         => trim($u[0]['Address']),
                                                                      "CityName"        => trim($u[0]['CityName']),
                                                                      "DistrictName"    => trim($u[0]['DistrictName']),
                                                                      "StateName"       => trim($u[0]['StateName']),
                                                                      "CountryName"     => trim($u[0]['CountryName']),
                                                                      "PinCode"         => trim($u[0]['PinCode']),
                                                                      "PlanUpgradedA"    => $PlanUpgradedA,
                                                                      "PlanUpgradedB"    => $PlanUpgradedB,
                                                                      "PlanUpgradedC"    => $PlanUpgradedC,
                                                                      "IsAdmin"          => "0",
                                                                      "PlanID"          => $plan[0]['PlanID'],
                                                                      "PlanString"      => $plan[0]['PlanString'],
                                                                      "ReferedBy"       => $userData["MemberID"],
                                                                      "IsSelfID"       => "1",
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
                            if (isset($_GET['parent'])) {
                                $mysql->insert("_tbl_Member_Placement",array("ParentID"=>$_GET['parent'],"ChildID"=>$ID,"ChildPosition"=>$_GET['C'],"Plan"=>$plan[0]['PlanID'],"PlacedBy"=>$userData['MemberID']));     
                            } else {
                                $mysql->insert("_tbl_Member_Placement",array("ParentID"=>$userData['MemberID'],"ChildID"=>$ID,"ChildPosition"=>$_GET['C'],"Plan"=>$plan[0]['PlanID'],"PlacedBy"=>$userData['MemberID']));    
                            }
                            echo SuccessMsg("Member Created Successfully. Member ID: ".$Code);                    
                             
                             $particulars = "CreateMember/".$Code."/From:".$userData['MemberCode']."/Plan:".$plan[0]['PlanString']."/SelfCreation";
                             
                             $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => $userData['MemberID'],
                                                                                                "TxnDate"       => date("Y-m-d H:i:s"),
                                                                                                "Particulars"   => $particulars,
                                                                                                "ActualAmount"  => $plan[0]['PlanAmount'],
                                                                                                "CreditAmount"  => "0",
                                                                                                "DebitAmount"   => $plan[0]['PlanAmount'],
                                                                                                "BalanceAmount" => getBalance($userData['MemberID'])-$plan[0]['PlanAmount'],
                                                                                                "Ledger"        => "3"));
                                                                                                
                            $InvoiceID = Invoice::CreateInvoice(array("MemberID"           => $ID,
                                                                      "MemberCode"         => $Code,
                                                                      "Particulars"        => $particulars,
                                                                      "InvoiceAmount"      => $plan[0]['PlanAmount'],
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
                              //Points update
                              $mysql->insert("_tbl_Member_Points",
                                            array("MemberID"=>$userData['MemberID'],
                                                  "MemberCode"=>$userData['MemberCode'],
                                                  "EarnPoint"=>"500",
                                                  "DirectMemberID"=>$ID,
                                                  "DirectMemberCode"=>$Code,
                                                  "PointsUpdated"=>date("Y-m-d H:i:s")));
                                                  
                              $smstxt= "Dear ".trim($u[0]['FirstName']).", Your account has been created. Your account ID: ".$Code." and Login Name: ".$_POST['LoginName'].", LoginPassword: ".$_POST['LoginPassword']."  -Thanks GoodGrowth";
                              //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($_POST['MobileNumber']));
                              MobileSMS::sendSMS($u[0]['MobileNumber'],$smstxt);
                              $smstxt= "Dear ".trim($u[0]['FirstName']).", Your INR. ".$plan[0]['PlanAmount']." has been debited for create new Member ".$Code.". Your current Balance Rs. ".number_format(getBalance($userData['MemberID']),2)."  -Thanks GoodGrowth";
                              //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($userData['MobileNumber']));
                              MobileSMS::sendSMS($userData['MobileNumber'],$smstxt);
                              unset($_POST);
                             
                             if ($plan[0]['PlanID']==1) {
             echo "<script>location.href='dashboard.php?action=GOLDWAY&msg=Member Created Successfully. Member ID: ".$Code."';</script>";                }
                            if ($plan[0]['PlanID']==2) {
                             echo "<script>location.href='dashboard.php?action=MYGOLD&msg=Member Created Successfully. Member ID: ".$Code."';</script>";}
                            
                            if ($plan[0]['PlanID']==3) {
                                 echo "<script>location.href='dashboard.php?action=SUPERGOLD&msg=Member Created Successfully. Member ID: ".$Code."';</script>";
                            }
                            if ($plan[0]['PlanID']==4) {
                                 echo "<script>location.href='dashboard.php?action=G3&msg=Member Created Successfully. Member ID: ".$Code."';</script>";
                            }
                    
                }
                            }
                        ?>
                        <form action="" method="post">
                           <div class="form-group row">
                                <div class="col-sm-3 control-label">Nick Name</div>
                                <div class="col-sm-9"><input type="text" class="form-control" name="NickName" placeholder="Nick Name" value="<?php echo isset($_POST['NickName']) ? $_POST['NickName'] : '';?>"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 control-label">Login Name</div>
                                <div class="col-sm-9"><input type="text" class="form-control" name="LoginName" placeholder="Login Name" value="<?php echo isset($_POST['LoginName']) ? $_POST['LoginName'] : '';?>"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 control-label">Login Password</div>
                                <div class="col-sm-9"><input type="password" class="form-control" name="LoginPassword" placeholder="Login Password" value="<?php echo isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] : '';?>"> </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12"><input type="submit" class="btn btn-outline btn-success" name="DuplicateMemberBtn" value="Create Member Using My Account Again"> </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

     <script>
   $(document).ready(function() {
   
    $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd",
    });
 
});
 
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script> 