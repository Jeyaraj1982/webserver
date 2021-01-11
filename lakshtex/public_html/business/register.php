<?php include_once("header.php"); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .form-control{display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;} 
    #btnLogin[type="submit"] {    background: #E91E63;    border: 0;    border-radius: 3px;    padding: 10px 30px;    color: #fff;    transition: 0.4s;    cursor: pointer;}
    #btnLogin[type="submit"]:hover {    background: #081e5b;}
    .errorstring{color:red;font-size:11px;}
    .SponsorInfo {padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;width:100%;background:#fff;border:none;padding-left:0px;font-weight:bold}
</style>
<script>
    var firstName="";
    var ErrorCount=0;
    function submitRegister() {
          ErrorCount=0;
        $('#ErrName').html("");
        $('#ErrDateofBirth').html("");
        $('#ErrMobileNumber').html("");
        $('#ErrEmailID').html("");
        $('#ErrAddressLine1').html("");
        $('#ErrPassword').html("");
        $('#ErrConfirmPassword').html("");
        $('#ErrAgreeTerms').html("");
        
        
        if(IsNonEmpty("Name", "ErrName", "Please Enter Name")){
                IsAlphaNumeric("Name", "ErrName", "Please Enter Alpha Numerics Characters Only");
            }
        if(IsNonEmpty("MobileNumber", "ErrMobileNumber", "Please Enter Mobile Number")){
			IsMobileNumber("MobileNumber", "ErrMobileNumber", "Please Enter Valid Mobile Number");
		}
		if($('#EmailID').val()!=""){
			IsEmail("EmailID", "ErrEmailID", "Please Enter Valid EmailID");
		}
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please enter your AddressLine1");
        if(IsNonEmpty("Password","ErrPassword","Please enter your Password")){
            IsFPassword("Password","ErrPassword","Please enter more than 6 charcters");
        }
        if($('#ConfirmPassword').val()==""){
            ErrorCount++;
            $('#ErrConfirmPassword').html("Please Enter Confirm Password");
        }else{
            if($('#ConfirmPassword').val()!=$('#Password').val()){
                ErrorCount++;
                $('#ErrConfirmPassword').html("Password do not match");    
            }
        }
        if($('#AgreeTerms').prop("checked")==false){
            ErrorCount++;
            $('#ErrAgreeTerms').html("Please Agree Terms and Conditions"); 
        }  
        var currentyear = new Date().getFullYear()   
        if($('#year').val()<(currentyear-18)){
          ErrorCount++;
          $('#ErrDateofBirth').html("Please Select Valid"); 
        }
        return (ErrorCount==0) ? true : false;
    }
</script>


<section style="background:#fff;">
    <div class="row" style="margin-left:0px;margin-right:0px;"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="margin-top: 5%;">
            <div class="container" style="padding-bottom: 35px;"> 
                <?php
                    $ErrorCount = 0;
                    
                    if (isset($_POST['btnRegister'])) {
                        
                       // $epin=$mysql->select("select * from `_tbl_epins` where `PinCode`='".$_POST['EPin']."' and `EPinPassword`='".$_POST['EPinPassword']."' `IsUsed`=='0'");
                        if (sizeof($epin)==0) {
                         //    $errorMessage = "<div class='failure'>Error occured. Couldn't find epin details</div>";
                           //  $ErrorCount++;
                        }
                        
                         $ref=isset($_GET['Ref']) ? trim($_GET['Ref']) : "";
                        if ($ref!="") {
                            $ref_data = $mysql->select("select * from _tbl_member where UID='".$ref."'");
                            if (sizeof($ref_data)==0) {
                            $ref = "";    
                            }
                            
                        }
                        
                        if ($ref!="") {
                            $sponsor=$mysql->select("select * from `_tbl_member` where `UID`='".$ref."'");   
                        }else {
                            $sponsor=$mysql->select("select * from `_tbl_member` where `UID`='LAKSHTEX'");
                        }
                        
                        if (sizeof($sponsor)==0) {
                             $errorMessage = "<div class='failure'>Error occured. Couldn't find sponsor information</div>";
                             echo $errorMessage;
                             $ErrorCount++;?>
							<script>
								 $(document).ready(function() {
									swal("", "Error occured. Couldn't find sponsor information", "Error");
								 });
							</script>
                        <?php }
                        
                        if ($ErrorCount==0) {
                            //$upline = findUpline($sponsor[0]['MemberCode']);
                                                                                                
                            $Member = $mysql->insert("_tbl_member_preregister",array(
                                                                         "MemberName"         => trim($_POST['FirstName']),
                                                                         "MemberPassword"     => trim($_POST['Password']),
                                                                         "AddressLine1"       => trim($_POST['Address1']),
                                                                         "AddressLine2"       => trim($_POST['Address2']),               
                                                                         "MemberMobileNumber" => trim($_POST['MobileNumber']),
                                                                         "Sex"                => trim($_POST['Sex']),
                                                                         "DateOfBirth"        => trim($_POST['year']."-".$_POST['month']."-".$_POST['date']),
                                                                         "EmailID"            => trim($_POST['EmailID']),
                                                                         "SponsorID"          => $sponsor[0]['MemberID'],
                                                                         "SponsorCode"        => $sponsor[0]['MemberCode'],
                                                                         "Sponsorname"        => $sponsor[0]['MemberName'],
                                                                         "activationMode"     => $_POST['activationMode'],
                                                                         "CreatedOn"          => date("Y-m-d H:i:s")));
                                                                         
                                                   if ($_POST['activationMode']=="1") {
                                                       //payment gateway
                                                       ?>
                                                       <form action="pg.php" method="post" id="frm" name="frm">
                                                             <input type="hidden" value="<?php echo $Member;?>" name="pgid">
                                                       </form>
                                                       <script>
                                                        document.getElementById("frm").submit();
                                                       </script>
                                                       <?php
                                                       exit;
                                                   } else {
                                                       //epin and password
                                                        
                                                   }
                            } else {
                                $errorMessage = "<div class='failure' style='color:red'>Error occured. Couldn't save member detatils</div>";?>
								<script>
								 $(document).ready(function() {
									swal("", "Error occured. Couldn't save member detatils", "Error")
								 });
							</script>
                           <?php }
                          
                    }
                ?>
                <div class="col-sm-12">
                    <?php echo $errorMessage;?><?php echo $successmessage?>
                </div>
                <form id="memberform" method="post" action="" onsubmit="return submitRegister()">
                    <div class="h5 modal-title text-center">
                        <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><div style="color:#333 !important">Member Registration Form</div><span style="font-size: 1.1rem;">Safe & Secure</span>   </h4>
                    </div>
                    <?php
                        $ref=isset($_GET['Ref']) ? trim($_GET['Ref']) : "";
                        if ($ref!="") {
                            $ref_data = $mysql->select("select * from _tbl_member where UID='".$ref."'");
                            if (sizeof($ref_data)==0) {
                                echo InvalidRegistrationReferCode();
                                echo "<style>#RegisterForm{display:none;}</style>";
                            }   else {
                                $mysql->insert("linkhistory",array("LinkName"=>$ref,"Opened"=>date("Y-m-d H:i:s")));
                            }
                            $ref = "";
                        }
                    ?>
                    <?php if (sizeof($ref_data)!=0) {?>
                    <input type="hidden" value="<?php echo $ref;?>" name="Ref"> 
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Sponsor's Info</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control SponsorInfo" value="<?php echo $ref_data[0]['MemberName'];?> (<?php echo $ref_data[0]['MemberCode'];?>)">
                        </div> 
                    </div>
                    <?php } ?>
                    <div id="RegisterForm">
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Name<span id="star">*</span></div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="FirstName" placeholder="Name here ..." id="Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;width:100%">
                            <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                        </div> 
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Sex<span id="star">*</span></div>
                        <div class="col-sm-2">
                            <select class="form-control" data-live-search="true" id="Sex" name="Sex" style="padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <option value="Male" <?php echo ($_POST['Sex']=="Male") ? " selected='selected' " : "";?>>Male</option>                             
                                <option value="FeMale" <?php echo ($_POST['Sex']=="FeMale") ? " selected='selected' " : "";?>>FeMale</option>                             
                            </select>
                        </div>                                                                                
                        <div class="col-sm-3 col-form-label" style="margin-right: -40px;">Date of birth<span id="star">*</span></div>
                        <div class="col-sm-1" style="max-width:160px !important;margin-right: -26px;">
                            <select class="form-control" data-live-search="true" id="date" name="date" style="width:65px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <?php for($i=1;$i<=31;$i++) {?>
                                    <option value="<?php echo $i; ?>" <?php echo ($_POST[ 'date']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2" style="max-width:100px !important;margin-right: -16px;">
                            <select data-live-search="true" class="form-control"  id="month" name="month" style="width:80px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <?php foreach($_monthname as $key=>$value) {?>
                                    <option value="<?php echo $key+1; ?>" <?php echo ($_POST[ 'month']==$key+1) ? " selected='selected' " : "";?>><?php echo $value;?></option>
                                <?php } ?>
                            </select>                                    
                        </div>
                        <div class="col-sm-2" style="max-width: 148px;">
                            <select class="form-control" data-live-search="true" id="year" name="year" style="width:80px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <?php for($i=$_DOB_Year_Start;$i>=$_DOB_Year_End;$i--) {?>
                                    <option value="<?php echo $i; ?>" <?php echo ($_POST['year']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                <?php } ?>                                                 
                            </select>
                        </div>
                        <span class="errorstring" id="ErrDateofBirth"><?php echo isset($ErrDateofBirth)? $ErrDateofBirth : "";?></span>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Mobile Number<span id="star">*</span></div>
                        <div class="col-sm-9">
                            <div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1" style="background:#fff;border-right:none">+91</span>
								</div>
								<input type="text" class="form-control" name="MobileNumber" maxlength="10" placeholder="Mobile Number here ..." id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
							</div>
							<span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Email ID</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="EmailID" placeholder="Email ID here ..." id="EmailID" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;;width:100%">
                            <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Address Line1<span id="star">*</span></div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="Address1" placeholder="Address here ..." id="AddressLine1" value="<?php echo isset($_POST['Address1']) ? $_POST['Address1'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;;width:100%">
                            <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                        </div>                                                                                
                    </div>                          
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Address Line2</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="Address2" placeholder="Address here ..." id="AddressLine2" value="<?php echo isset($_POST['Address2']) ? $_POST['Address2'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;;width:100%">
                            <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Password<span id="star">*</span></div>
                        <div class="col-sm-9">
                            <div class="input-group">
								<input type="password" class="form-control" name="Password" placeholder="Password here ..." id="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
								<div class="input-group-appened">
									<span class="input-group-text" id="basic-addon1" onclick="showHidePwd('Password',$(this))"  style="background:#fff;border-left:none;font-size: 15px;border-radius: 0px;padding: 14px;"><i class="fa fa-eye-slash"></i></span>
								</div>
							</div>
                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                        </div>                                                                                
                    </div>
					<div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Confirm Password<span id="star">*</span></div>
                        <div class="col-sm-9">
                            <div class="input-group">
								<input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password here ..." id="ConfirmPassword" value="<?php echo isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
								<div class="input-group-appened">
									<span class="input-group-text" id="basic-addon1" onclick="showHidePwd('ConfirmPassword',$(this))"  style="background:#fff;border-left:none;font-size: 15px;border-radius: 0px;padding: 14px;"><i class="fa fa-eye-slash"></i></span>
								</div>
							</div>
                            <span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"  style="text-align: right;padding-top:13px;">Activation Method</div>
                        <div class="col-sm-9">
                            <select name="activationMode" class="form-control">
                                <option value="1">Using Payment Gateway (Rs. 500/-)</option>
                                <!--<option vlaue="2">Using Epin & Pin Password</option>-->
                            </select>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="AgreeTerms" name="AgreeTerms" <?php echo ($_POST['AgreeTerms']==1) ? ' checked="checked" ' :'';?>>
                                <label class="custom-control-label" for="AgreeTerms" style="font-weight: normal;">I agree terms and conditions</label>
                            </div>
                            <span class="errorstring" id="ErrAgreeTerms"><?php echo isset($ErrAgreeTerms)? $ErrAgreeTerms : "";?></span>
                        </div>                                                                                
                    </div>
                     <div class="form-group row">
                     <div class="col-sm-12" style="text-align: right;padding-top:20px;">
                    <input type="submit" value="Continue" class="btn btn-primary" id="btnLogin" name="btnRegister" >
                    </div>
                    </div>
                    </div>
                </form>
            </div>                                                                                                                         
        </div>
        <div class="col-sm-2"></div>
    </div>
</section>
<?php include_once("footer.php");?>  
<script>
function showHidePwd(pwd,btn) {
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    btn.html('<i class="fa fa-eye"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="fa fa-eye-slash"></i>');
  }
}
 $(document).ready(function () {
        $("#Name").blur(function () {
            if(IsNonEmpty("Name", "ErrName", "Please Enter Name")){
                IsAlphaNumeric("Name", "ErrName", "Please Enter Alpha Numerics Characters Only");
            }
        });
        $("#MobileNumber").blur(function () {
            if(IsNonEmpty("MobileNumber", "ErrMobileNumber", "Please Enter Mobile Number")){
                IsMobileNumber("MobileNumber", "ErrMobileNumber", "Please Enter Valid Mobile Number");
            }
        });
        $("#EmailID").blur(function () {
            $('#ErrEmailID').html("");
            if($('#EmailID').val()!=""){
                IsEmail("EmailID", "ErrEmailID", "Please Enter Valid EmailID");
            }
        });
        $("#AddressLine1").blur(function () {
            IsNonEmpty("AddressLine1","ErrAddressLine1","Please enter your AddressLine1");
        });
        $("#Password").blur(function () {
            if(IsNonEmpty("Password","ErrPassword","Please enter your Password")){
                IsFPassword("Password","ErrPassword","Please enter more than 6 charcters");
            }
        });
        $("#ConfirmPassword").blur(function () {
            $('#ErrConfirmPassword').html("");
            if($('#ConfirmPassword').val()==""){
                $('#ErrConfirmPassword').html("Please Enter Confirm Password");
            }else{
                if($('#ConfirmPassword').val()!=$('#Password').val()){
                    $('#ErrConfirmPassword').html("Password do not match");    
                }
            }
        });
        $("#AgreeTerms").blur(function () {
            $('#ErrAgreeTerms').html("");
            if($('#AgreeTerms').prop("checked")==false){
                $('#ErrAgreeTerms').html("Please Agree Terms and Conditions"); 
            } 
        });
    });
</script>