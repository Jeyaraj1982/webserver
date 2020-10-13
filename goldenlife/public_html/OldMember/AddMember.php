<?php include_once("header.php");?>
<?php
 if (isset($_POST['AddMember'])) {
       
        $ErrorCount =0;
            
        $duplicate = $mysql->select("select * from  _tbl_member where MemberCode='".trim($_POST['MemberCode'])."'");
        if (sizeof($duplicate)>0) {
             $ErrMemberCode="Member Code already Exists";    
             $ErrorCount++;
        }
        if(sizeof($_POST['EmailID'])>0){
        $duplicate = $mysql->select("select * from  _tbl_member where EmailID='".trim($_POST['EmailID'])."'");
        if (sizeof($duplicate)>0) {
             $ErrEmailID="EmailID Already Exists";    
             $ErrorCount++;
        }
        }
        $duplicate = $mysql->select("select * from  _tbl_member where MemberMobileNumber='".trim($_POST['MobileNumber'])."'");
        if (sizeof($duplicate)>0) {
             $ErrMobileNumber="Mobile Number Already Exists";    
             $ErrorCount++;
        }
        
        $Epin = $mysql->select("select * from  _tbl_epins where PinCode='".trim($_POST['EPin'])."' and IsUsed='0'");
        
        if (sizeof($Epin)==0) {
             $ErrEPin="E-Pin Not available";    
             $ErrorCount++;
        }                                                                                                
       if ($ErrorCount==0) {     
                      $MemberCode=SeqMaster::GetNextMemberCode();                                                                      
     $Member = $mysql->insert("_tbl_member",array("MemberCode"          =>$MemberCode,
                                                  "MemberName"          => trim($_POST['FirstName']),
                                                  "MemberSurname"       => trim($_POST['Surname']),
                                                  "Username"            => trim($_POST['Username']),
                                                  "EmailID"             => trim($_POST['EmailID']),
                                                  "MemberPassword"      => trim($_POST['Password']),
                                                  "AddressLine1"        => trim($_POST['Address1']),
                                                  "AddressLine2"        => trim($_POST['Address2']),
                                                  "Country"             => trim($_POST['Country']),
                                                  "City"                => trim($_POST['City']),
                                                  "State"               => trim($_POST['State']),
                                                  "PinCode"             => trim($_POST['Pincode']),
                                                  "MemberMobileNumber"  => trim($_POST['MobileNumber']),
                                                  "SponsorID"           => $_SESSION['User']['MemberID'],
                                                  "SponsorCode"         => $_SESSION['User']['MemberCode'],
                                                  "Sponsorname"         => $_SESSION['User']['MemberName'],
                                                  "CreatedOn"           => date("Y-m-d H:i:s")));
    
    $mysql->execute("update _tbl_epins set IsUsed='1',UsedToMemberID='".$_SESSION['User']['MemberID']."',UsedMemberCode='".$_SESSION['User']['MemberCode']."',UsedMemberName='".$_SESSION['User']['MemberName']."' where PinID='".$Epin[0]['PinID']."'");
    echo "update _tbl_epins set IsUsed='1',UsedToMemberID='".$_SESSION['User']['MemberID']."',UsedMemberCode='".$_SESSION['User']['MemberCode']."',UsedMemberName='".$_SESSION['User']['MemberName']."' where PinID='".$Epin[0]['PinID']."'";
      if ($Member>0) 
  /* <script>location.href='MemberCheckout.php?id=<?php echo $Member;?>';</script>  */
            $successmessage = "<div class='success'>Member added successfully</div>";
            unset($_POST);
        } else {                                                                    
            $errorMessage = "<div class='failure'>Error occured. Couldn't save member detatils</div>";
        }
    
    }
?>
<script>
     function submitMember() {
         
                $('#ErrFirstName').html("");
                $('#ErrSurname').html("");
                //$('#ErrEmailID').html("");
                $('#ErrPassword').html("");
                $('#ErrConfirmPassword').html("");
                $('#ErrMobileNumber').html("");
                $('#ErrAddress1').html("");
                //$('#ErrCity').html("");
                //$('#ErrPincode').html("");
                
                ErrorCount = 0;
                
                IsNonEmpty("FirstName", "ErrFirstName", "Please Enter Your First Name");
                IsNonEmpty("Surname", "ErrSurname", "Please Enter Your Surname");
                //IsNonEmpty("EmailID", "ErrEmailID", "Please Enter EmailID");
                IsNonEmpty("Password", "ErrPassword", "Please Enter Password");
                IsNonEmpty("ConfirmPassword", "ErrConfirmPassword", "Please Enter Confirm Password");
                IsNonEmpty("MobileNumber", "ErrMobileNumber", "Please Enter Mobile Number");
                IsNonEmpty("Address1", "ErrAddress1", "Please Enter Address1");
                //IsNonEmpty("City", "ErrCity", "Please Enter City");
                //IsNonEmpty("Pincode", "ErrPincode", "Please Enter Pincode");
                
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
                                <div>Add New Member
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        
                                        <div class="col-sm-12">
                                        <?php echo $errorMessage;?><?php echo $successmessage?>
                                        </div>
                                        <form method="post"   onsubmit="return submitMember();">
                                            <div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Member Name<span id="star">*</span></div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="FirstName" id="FirstName" placeholder="First Name" class="form-control" value="<?php echo (isset($_POST['FirstName']) ? $_POST['FirstName'] : "");?>">
                                                        <span class="errorstring" id="ErrFirstName"><?php echo isset($ErrFirstName)? $ErrFirstName : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Surname<span id="star">*</span></div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Surname" id="Surname" placeholder="Surname" class="form-control" value="<?php echo (isset($_POST['Surname']) ? $_POST['Surname'] : "");?>">
                                                        <span class="errorstring" id="ErrSurname"><?php echo isset($ErrSurname)? $ErrSurname : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">E-mail address</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="EmailID" id="EmailID" placeholder="EmailID" class="form-control" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] : "");?>">
                                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Password<span id="star">*</span></div>
                                                    <div class="col-sm-9">
                                                        <input type="Password" name="Password" id="Password" placeholder="Password" class="form-control" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] : "");?>">
                                                        <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Confirm password<span id="star">*</span></div>
                                                    <div class="col-sm-9">
                                                        <input type="Password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" class="form-control" value="<?php echo (isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Mobile Number<span id="star">*</span></div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" class="form-control" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>">
                                                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Country </div>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="Country" id="Country">
                                                            <option value="India">India</option>
                                                        </select>
                                                        <span class="errorstring" id="ErrCountry"><?php echo isset($ErrCountry)? $ErrCountry : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Address 1<span id="star">*</span></div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Address1" id="Address1" placeholder="" class="form-control" value="<?php echo (isset($_POST['Address1']) ? $_POST['Address1'] : "");?>">
                                                        <span class="errorstring" id="ErrAddress1"><?php echo isset($ErrAddress1)? $ErrAddress1 : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Address 2</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Address2" id="Address2" placeholder="" class="form-control" value="<?php echo (isset($_POST['Address2']) ? $_POST['Address2'] : "");?>">
                                                        <span class="errorstring" id="ErrAddress2"><?php echo isset($ErrAddress2)? $ErrAddress2 : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">City</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="City" id="City" placeholder="" class="form-control" value="<?php echo (isset($_POST['City']) ? $_POST['City'] : "");?>">
                                                        <span class="errorstring" id="ErrCity"><?php echo isset($ErrCity)? $ErrCity : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">State Name</div>
                                                    <div class="col-sm-3">
                                                        <select name="State" id="State" class="form-control">
                                                            <option value="Tamilnadu">Tamilnadu</option>
                                                        </select>
                                                        <span class="errorstring" id="ErrState"><?php echo isset($ErrState)? $ErrState : "";?></span>
                                                    </div>
                                                    <div class="col-sm-3" style="float:right">Pincode</div>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="Pincode" id="Pincode" placeholder="" class="form-control" value="<?php echo (isset($_POST['Pincode']) ? $_POST['Pincode'] : "");?>">
                                                        <span class="errorstring" id="ErrPincode"><?php echo isset($ErrPincode)? $ErrPincode : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                                </div>  
                                                
                                            </div>
                                         
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                                 <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        <div class="form-group row">
                                        <div class="col-sm-3">
                                        <?php include_once("PaymentHeader.php");?>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="col-sm-12">
                                                <div class="E-Pin" id="E-Pindiv">
                                                        E-pin     <br>
                                                        <input type="text" name="EPin" id="EPin" class="form-control" value="<?php echo (isset($_POST['EPin']) ? $_POST['EPin'] : "");?>">
                                                        <span class="errorstring" id="ErrEPin"><?php echo isset($ErrEPin)? $ErrEPin : "";?></span>
                                                    </div>
                                            </div>
                                        <!--<div class="Col-sm-12" id="resdiv" style="width: 74%;">   
                                         
                                            </div>
                                            <div>
                                                <div style="display:none">
                                                    <div class="E-Pin" id="E-Pindiv" style="padding:40px;padding-bottom:100px;text-align:center;color:#aaa">
                                                        E-pin     <br>
                                                        <input type="text" name="E-Pin" id="E-Pin" class="form-control">
                                                    </div>
                                                    <div class="Paypal" id="Paypaldiv" style="padding:40px;padding-bottom:100px;text-align:center;color:#aaa">
                                                    
                                                    </div>
                                                </div>
                                        </div>-->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                                                   <div class="col-sm-12"><button type="submit" class="mb-2 mr-2 btn btn-gradient-primary" name="AddMember">Continue to next step</button></div>
                        </div>
                        </form>
                    </div>
                </div>
       </div>
       <script>
 /*function loadPaymentOption(pOption){
     $("#resdiv").html($("E-Pindiv"));
     if (pOption=="E-Pin") {                  
        $("#resdiv").html($('#E-Pindiv').html());
        $('#E-Pin').css({"background":"#95abfb"});
        $('#Paypal').css({"background":"Transparent"});
     }
     if (pOption=="Paypal") {
        $("#resdiv").html($('#Paypaldiv').html());
        $('#E-Pin').css({"background":"Transparent"});
        $('#Paypal').css({"background":"#95abfb"});
     }
 }     */
</script>
                                                
                                       
 <?php include_once("footer.php");?>             