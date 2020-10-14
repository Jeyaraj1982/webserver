<?php  include_once("header.php"); ?>
<style>
#star{color:red}
</style>
<script>
     function submitMember() {
         
                $('#ErrFirstName').html("");
                $('#ErrSurname').html("");
                $('#ErrPassword').html("");
                $('#ErrConfirmPassword').html("");
                $('#ErrMobileNumber').html("");
                $('#ErrAddress1').html("");
                
                ErrorCount = 0;
                
                IsNonEmpty("FirstName", "ErrFirstName", "Please Enter Your First Name");
                IsNonEmpty("Surname", "ErrSurname", "Please Enter Your Surname");
                IsNonEmpty("Password", "ErrPassword", "Please Enter Password");
                IsNonEmpty("ConfirmPassword", "ErrConfirmPassword", "Please Enter Confirm Password");
                IsNonEmpty("MobileNumber", "ErrMobileNumber", "Please Enter Mobile Number");
                IsNonEmpty("Address1", "ErrAddress1", "Please Enter Address1");
                
                 var password = document.getElementById("Password").value;
                 var confirmPassword = document.getElementById("ConfirmPassword").value;
                  if (password != confirmPassword) {
                  ErrorCount++;
                  $('#ErrConfirmPassword').html("Passwords do not match.");
                  }
                  return (ErrorCount==0) ? true : false;
    }
</script>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <br> 
                    <div style="text-align:center">
                        <div class="h5 modal-title text-center">
                            <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><div>Create Member</div><span style="font-size: 1.1rem;">My Direct Downline</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-md-8">
                        <div class="main-card mb-3 card" style="border:0px">
                            <div class="card-body">
                                <?php
                                    $epin = $mysql->select("select * from  _tbl_epins where IsUsed='0' and (GeneratedByID='".$_SESSION['User']['MemberID']."' || SoldMemberID='".$_SESSION['User']['MemberID']."') order by PinID Desc");
                                    if (sizeof($epin)==0) {
                                        ?>
                                            <style>
                                            #createform {display:none}
                                            </style>
                                            <div style="text-align:center;">
                                            <img src="../assets/images/error.png"><br>
                                        Somthing went to wrong or you don't have e-pins <br><br>
                                        <a href="Dashboard.php">Continue ...</a>
                                        </div>
                                        
                                        <?php 
                                    }  else if (isset($_POST['AddMember'])) {
                                      
                                       $epindetails = $mysql->select("select * from  _tbl_epins where IsUsed='0' and Pincode='".$_POST['PinCode']."' and (GeneratedByID='".$_SESSION['User']['MemberID']."' || SoldMemberID='".$_SESSION['User']['MemberID']."') order by PinID Desc");
                                      
                                      if (sizeof($epindetails)==0) {
                                          $ErrPinCode="Invalid Pin or already used";
                                          $ErrorCount++;
                                      }    
                                       
                                      if (strlen(trim($_POST['FirstName']))==0) {
                                          $ErrFirstName="Please enter valid name" ;
                                          $ErrorCount++;
                                      } 
                                      
                                          if (strlen(trim($_POST['MemberFatherName']))==0) {
                                          $ErrMemberFatherName="Please enter valid Father's Name" ;
                                          $ErrorCount++;
                                      } 
                                      
                                       if (strlen(trim($_POST['MOVillage']))==0) {
                                          $ErrMOVillage="Please enter Village Name" ;
                                          $ErrorCount++;
                                      } 
                                      
                                       if (strlen(trim($_POST['MOAccount']))==0) {
                                          $ErrMOAccount="Please enter Money Order A/c & Mobile Number" ;
                                          $ErrorCount++;
                                      }                         
                                      
                                      if (strlen(trim($_POST['Surname']))==0) {
                                          $ErrSurname="Please enter valid sur name" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (strlen(trim($_POST['MobileNumber']))==0) {
                                          $ErrMobileNumber="Please enter valid mobile number" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (strlen(trim($_POST['Address1']))==0) {
                                          $ErrAddress1="Please enter valid communication address" ;
                                          $ErrorCount++;
                                      } 
                                       
                                      if (strlen(trim($_POST['Password']))==0) {
                                          $ErrPassword="Please enter valid password" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (strlen(trim($_POST['Password']))<6) {
                                          $ErrPassword="Password must have 6 characters" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (strlen(trim($_POST['ConfirmPassword']))==0) {
                                          $ErrConfirmPassword="Please enter confirm password" ;
                                          $ErrorCount++;
                                      }
                                      if (strlen(trim($_POST['eduDetails']))==0) {
                                          $ErreduDetails="Please enter education details" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (!($_POST['ConfirmPassword']==$_POST['ConfirmPassword'])) {
                                          $ErrConfirmPassword="must be same password and confirm password" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                                          $ErrMobileNumber="Please enter valid mobile number" ;
                                          $ErrorCount++;
                                      }
                                      
                                      if (isset($_GET['P'])) {
                                          $uplines = findUplines($_GET['P']);    
                                      } else {
                                            $upline = findUpline($epindetails[0]['SoldMemberCode']);
                                      }
                                      if (sizeof($upline)==0) {
                                          $ErrorCount++;
                                          ?>
                                           <style>
                                            #createform {display:none}
                                            </style>
                                            <div style="text-align:center;">
                                            <img src="../assets/images/error.png"><br>
                                        Somthing went to wrong or you couldn't create member <br><br>
                                            <a href="Dashboard.php">Continue ...</a>
                                        </div>
                                          <?php
                                      }        
                                      if ($ErrorCount==0) {
                                                                 
                                          if ($epindetails[0]['PinPackageID']==2)  { 
                                          $MemberCode=SeqMaster::GetNextMemberCode(2);                                                                      
                                      }
                                      
                                        if ($epindetails[0]['PinPackageID']==1)  { 
                                          $MemberCode=SeqMaster::GetNextMemberCode(2);                                                                      
                                      } 
                                      
                                        if ($epindetails[0]['PinPackageID']==3)  {
                                             $MemberCode=SeqMaster::GetNextMemberCode(3);                                                                      
                                        }                                                                     
                                          $Member = $mysql->insert("_tbl_member",array("MemberCode"         => $MemberCode,
                                                                                       "MemberName"         => trim($_POST['FirstName']),
                                                                                       "MemberSurname"      => trim($_POST['Surname']),
                                                                                       "MemberPassword"     => trim($_POST['Password']),
                                                                                       "AddressLine1"       => trim($_POST['Address1']),
                                                                                       "AddressLine2"       => trim($_POST['Address2']),
                                                                                       "City"               => trim($_POST['City']),
                                                                                       "State"              => trim($_POST['State']),
                                                                                       "PinCode"            => trim($_POST['Pincode']),
                                                                                         "MOVillage"         => trim($_POST['MOVillage']),
                                                                                       "MOAccount"         => trim($_POST['MOAccount']),
                                                                                        "MemberFatherName"      => trim($_POST['MemberFatherName']),
                                                                                       "EduDetails"         => trim($_POST['eduDetails']),
                                                                                       "DateOfBirth"        => trim($_POST['year'])."-".trim($_POST['month'])."-".trim($_POST['date']),
                                                                                       "MemberMobileNumber" => trim($_POST['MobileNumber']),
                                                                                       "SponsorID"          => $epindetails[0]['SoldMemberID'],
                                                                                       "SponsorCode"        => $epindetails[0]['SoldMemberCode'],
                                                                                       "Sponsorname"        => $epindetails[0]['SoldMemberName'],
                                                                                       "CreatedOn"          => date("Y-m-d H:i:s")));
                                          if ($Member>0) {     
                                              
                                              $mysql->execute("update _tbl_epins set IsUsed='1', 
                                                                                     UsedOn='".date("Y-m-d H:i:s")."',
                                                                                     UsedToMemberID='".$Member."',
                                                                                     UsedMemberCode='".$MemberCode."',
                                                                                     UsedMemberName='".trim($_POST['FirstName'])."' where PinID='".$epindetails[0]['PinID']."'");
                                              
                                                if ($epindetails[0]['PinPackageID']==2)  {  
                                              $mysql->insert("_tbl_placements",array("ParentMemberID"   => $upline[0]['MemberID'],
                                                                                     "ParentMemberCode" => $upline[0]['MemberCode'],
                                                                                     "ParentMemberName" => $upline[0]['MemberName'],
                                                                                     
                                                                                     "UplineMemberID"   => $upline[0]['UplineMemberID'],
                                                                                     "UplineMemberCode" => $upline[0]['UplineMemberCode'],
                                                                                     "UpilneMemberName" => $upline[0]['UplineMemberName'],
                                                                                     
                                                                                     "ChildMemberID"    => $Member,
                                                                                     "ChildMemberCode"  => $MemberCode,
                                                                                     "ChildMemberName"  => trim($_POST['FirstName']),
                                                                                     
                                                                                     "PlacementedOn"    => date("Y-m-d H:i:s"),
                                                                                     
                                                                                     "PlacementedID"    => $epindetails[0]['SoldMemberID'],
                                                                                     "PlacementedCode"  => $epindetails[0]['SoldMemberCode'],
                                                                                     "PlacementedName"  => $epindetails[0]['SoldMemberName'],
                                                                                     "UsedPinID"        => $epindetails[0]['PinID'],
                                                                                       "IsPayable"        => "0",
                                                                                     "IsDirect"         => $epindetails[0]['SoldMemberID']==$upline[0]['MemberID'] ? "1" : "0"));
                                              
                                                                  $levelnumber=1;
                                              $uplines = findUplines($upline[0]['UplineMemberCode']);                    
                                               
                                              foreach($uplines as $supline) {
                                                  
                                                  if (isset($income[$levelnumber-1]) && $income[$levelnumber-1]>0) {
                                                  
                                                   $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                                        "MemberCode"=>$supline['MemberCode'],
                                                                                        "MemberName"=>$supline['MemberName'],
                                                                                        
                                                                                        "LevelNumber"=>$levelnumber,
                                                                                        "LevelIncome"=>$income[$levelnumber-1],
                                                                                        
                                                                                        "PlacedMemberID"=>$Member,
                                                                                        "PlacedMemberCode"=>$MemberCode,
                                                                                        "PlacedMemberName"=>trim($_POST['FirstName']),
                                                                                        
                                                                                        "PlacedByMemberID"=>$epindetails[0]['SoldMemberID'],
                                                                                        "PlacedByMemberCode"=>$epindetails[0]['SoldMemberCode'],
                                                                                        "PlacedByMemberName"=>$epindetails[0]['SoldMemberName'],
                                                                                          
                                                                                        "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                                        "FromWeb"=>"1",
                                                                                        "FromPortal"=>"1"));
                                                   
                                                   // Credit Amount
                                                      $mysql->insert("_tbl_accounts",array("MemberID"       => $supline['MemberID'],
                                                                                           "MemberCode"     => $supline['MemberCode'],
                                                                                           "TxnDate"        => date("Y-m-d H:i:s"),
                                                                                           "Particulars"    => "Referal Income ".$MemberCode."",
                                                                                           "Amount"         => number_format($income[$levelnumber-1],2),
                                                                                           "Credit"         => number_format($income[$levelnumber-1],2),
                                                                                           "Debit"          => "0.00",
                                                                                           "Balance"        => number_format(getWithdrawableBalance($supline['MemberCode'])+$income[$levelnumber-1],2),
                                                                                           "VoucherID"      => "1",
                                                                                           "VoucherName"    => "ReferalIncome",
                                                                                           "ToFrom"         => "0",
                                                                                           "ToFromCode"     => "0"));
                                                      $particulars  = $supline['MemberCode']." Earned Rs. ".number_format($income[$levelnumber-1])." placed ".$MemberCode;
                                                      DebitCharges($supline['MemberID'],$supline['MemberCode'],$particulars,$income[$levelnumber-1]);
                                                  }
                                                   $levelnumber++;
                                              }
                                                } 
                                                
                                                
                                                  if ($epindetails[0]['PinPackageID']==3)  {
                                                     $mysql->insert("_tbl_placements",array("ParentMemberID"   => $upline[0]['MemberID'],
                                                                                     "ParentMemberCode" => $upline[0]['MemberCode'],
                                                                                     "ParentMemberName" => $upline[0]['MemberName'],
                                                                                     
                                                                                     "UplineMemberID"   => $upline[0]['UplineMemberID'],
                                                                                     "UplineMemberCode" => $upline[0]['UplineMemberCode'],
                                                                                     "UpilneMemberName" => $upline[0]['UplineMemberName'],
                                                                                     
                                                                                     "ChildMemberID"    => $Member,
                                                                                     "ChildMemberCode"  => $MemberCode,
                                                                                     "ChildMemberName"  => trim($_POST['FirstName']),
                                                                                     
                                                                                     "PlacementedOn"    => date("Y-m-d H:i:s"),
                                                                                     
                                                                                     "PlacementedID"    => $epindetails[0]['SoldMemberID'],
                                                                                     "PlacementedCode"  => $epindetails[0]['SoldMemberCode'],
                                                                                     "PlacementedName"  => $epindetails[0]['SoldMemberName'],
                                                                                     "UsedPinID"        => $epindetails[0]['PinID'],
                                                                                       "IsPayable"        => "0",
                                                                                     "IsDirect"         => $epindetails[0]['SoldMemberID']==$upline[0]['MemberID'] ? "1" : "0"));
                               
                                                  }
                                              $message="Dear ".$_POST['FirstName'].", Your account has been created. Login Details: Member Code: ".$MemberCode.", Password=".$_POST['Password'].", Url: http://www.goldenlifesociety.co.in - Thanks GLS Team";
                                              MobileSMS::sendSMS($_POST['MobileNumber'],$message,$Member);
                                              
                                              $successmessage = "<div style='text-align:center;padding:20px;'>
                                                          <img src='assets/images/checkmark-flat.png'><br><br>
                                              New Member has been created successfully<br> <br>
                                              <table align='Center'>
                                                <tr>
                                                    <td style='text-align:left;padding:5px;'>Your Member ID</td>
                                                    <td style='text-align:left;padding:5px;'>:&nbsp;".$MemberCode."</td>
                                                </tr>
                                                 <tr>
                                                    <td style='text-align:left;padding:5px;'>Your Password</td>
                                                    <td style='text-align:left;padding:5px;'>:&nbsp;".trim($_POST['Password'])."</td>
                                                </tr>
                                              </table>
                                              <br><br>
                                                      <style>#createform{display:none}</style>
                                              </div>";
                                           
                                          } else {
                                              $errorMessage = "<div class='failure'>Error occured. Couldn't save member detatils</div>";
                                          }
                                      }
                                  }
                                ?>
                                <div class="col-sm-12"><?php echo $errorMessage;?><?php echo $successmessage?></div>
                                <form method="post" onsubmit="return submitMember();" id="createform">
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Direct Sponsor ID</div>
                                            <div class="col-sm-9"><input type="text" value="<?php echo $_SESSION['User']['MemberCode'];?>" class="form-control" disabled="disabled"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Direct Sponsor Name</div>
                                            <div class="col-sm-9"><input type="text" value="<?php echo  $_SESSION['User']['MemberName'];?>" class="form-control" disabled="disabled"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">E=Pin<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <select name="PinCode" class="form-control">
                                                 <?php foreach($epin as $e) {?>
                                                    <option <?php echo ($e['PinPackageID']==3) ? "style='background:orange'" : "";?> value="<?php echo $e['PinCode'];?>" <?php echo ($_POST['PinCode']==$e['PinCode']) ? " selected='selected' " : "";?> ><?php echo $e['PinCode'];?></option>
                                                 <?php } ?>
                                                </select>
                                                <span class="errorstring" id="ErrPinCode"><?php echo isset($ErrSurname)? $ErrSurname : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align:center;color:green"><hr></div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-sm-3">Member Name<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="FirstName" id="FirstName" placeholder="Member Name" class="form-control" value="<?php echo (isset($_POST['FirstName']) ? $_POST['FirstName'] : "");?>"><span class="errorstring" id="ErrFirstName"><?php echo isset($ErrFirstName)? $ErrFirstName : "";?></span></div>
                                        </div>
                                          <div class="form-group row">
                                            <div class="col-sm-3">Father's Name<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="MemberFatherName" id="MemberFatherName" placeholder="Father's Name" class="form-control" value="<?php echo (isset($_POST['MemberFatherName']) ? $_POST['MemberFatherName'] : "");?>"><span class="errorstring" id="ErrMemberFatherName"><?php echo isset($ErrMemberFatherName)? $ErrMemberFatherName: "";?></span></div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-sm-3">Surname<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="Surname" id="Surname" placeholder="Surname" class="form-control" value="<?php echo (isset($_POST['Surname']) ? $_POST['Surname'] : "");?>"><span class="errorstring" id="ErrSurname"><?php echo isset($ErrSurname)? $ErrSurname : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Education Details<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="eduDetails" id="eduDetails" placeholder="Education Details" class="form-control" value="<?php echo (isset($_POST['eduDetails']) ? $_POST['eduDetails'] : "");?>"><span class="errorstring" id="ErreduDetails"><?php echo isset($ErreduDetails)? $ErreduDetails : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Date of Birth<span id="star">*</span></div>
                                            <div class="col-sm-3">
                                              <select name="year" class="form-control">
                                                    <?php for($i=date("Y")-18;$i>date("Y")-88;$i--) {?> 
                                                   <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                                   <?php } ?>
                                              </select>
                                            </div>
                                            <div class="col-sm-3">
                                              <select  name="month" class="form-control">
                                                  <?php for($i=1;$i<=12;$i++) {?> 
                                                   <option value="<?php echo $i;?>" ><?php echo $_Month[$i];?></option>
                                                   <?php } ?>
                                              </select>
                                            </div>
                                            <div class="col-sm-3">
                                              <select  name="date" class="form-control">
                                                <?php for($i=1;$i<=31;$i++) {?> 
                                                   <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                                   <?php } ?>
                                              </select>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Mobile Number<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" class="form-control" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>"><span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Address 1<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="Address1" id="Address1" placeholder="Address Line 1" class="form-control" value="<?php echo (isset($_POST['Address1']) ? $_POST['Address1'] : "");?>"><span class="errorstring" id="ErrAddress1"><?php echo isset($ErrAddress1)? $ErrAddress1 : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Address 2</div>
                                            <div class="col-sm-9"><input type="text" name="Address2" id="Address2" placeholder="Address Line 2" class="form-control" value="<?php echo (isset($_POST['Address2']) ? $_POST['Address2'] : "");?>"><span class="errorstring" id="ErrAddress2"><?php echo isset($ErrAddress2)? $ErrAddress2 : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">City Name</div>
                                            <div class="col-sm-9"><input type="text" name="City" id="City" placeholder="City Name" class="form-control" value="<?php echo (isset($_POST['City']) ? $_POST['City'] : "");?>"><span class="errorstring" id="ErrCity"><?php echo isset($ErrCity)? $ErrCity : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">State Name</div>
                                            <div class="col-sm-3">
                                                <select name="State" id="State" class="form-control">
                                                    <option value="Tamilnadu">Tamilnadu</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="float:right">Pincode</div>
                                            <div class="col-sm-3"><input type="text" name="Pincode" id="Pincode" placeholder="Pincode" class="form-control" value="<?php echo (isset($_POST['Pincode']) ? $_POST['Pincode'] : "");?>"><span class="errorstring" id="ErrPincode"><?php echo isset($ErrPincode)? $ErrPincode : "";?></span></div>
                                        </div>
                                        
                                          <div class="form-group row">
                                            <div class="col-sm-3">Money Order Village Name<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="MOVillage" id="MOVillage" placeholder="Money Order Village Name" class="form-control" value="<?php echo (isset($_POST['MOVillage']) ? $_POST['MOVillage'] : "");?>"><span class="errorstring" id="ErrMOVillage"><?php echo isset($ErrMOVillage)? $ErrMOVillage : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Money Order A/C & Mobile Number<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" name="MOAccount" id="MOAccount" placeholder="Money Order A/C & Mobile Number" class="form-control" value="<?php echo (isset($_POST['MOAccount']) ? $_POST['MOVillage'] : "");?>"><span class="errorstring" id="ErrMOAccount"><?php echo isset($ErrMOAccount)? $ErrMOAccount : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align:center;color:green"><hr></div>
                                        </div>                                                                       
                                        <div class="form-group row">
                                            <div class="col-sm-3">Password<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="Password" name="Password" id="Password" placeholder="Password" class="form-control" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] : "");?>"><span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Confirm password<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="Password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" class="form-control" value="<?php echo (isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : "");?>"><span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                        </div>  
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align:right;"><button type="submit" class="btn btn-primary" name="AddMember">Continue to Create Member</button></div>
                                        </div>
                                   </form>           
                            </div>
                        </div>                                                                                          
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</div>
 <?php include_once("footer.php");?>             