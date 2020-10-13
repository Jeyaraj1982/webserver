<?php include_once("header.php");?>
<style>
.form-control{display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;} 
#btnLogin[type="submit"] {    background: #E91E63;    border: 0;    border-radius: 3px;    padding: 10px 30px;    color: #fff;    transition: 0.4s;    cursor: pointer;}
#btnLogin[type="submit"]:hover {    background: #081e5b;}
.errorstring{color:red;font-size:11px;}
</style>
<script>
    var firstName="";
    var ErrorCount=0;
    function submitRegister() {
        
        $('#ErrName').html("");
        $('#ErrSurName').html("");
        $('#ErrEducation').html("");
        $('#ErrDateofBirth').html("");
        $('#ErrSex').html("");
        $('#ErrMobileNumber').html("");
        // $('#ErrEmailID').html("");
        $('#ErrAddressLine1').html("");
        $('#ErrCity').html("");
        $('#ErrPincode').html("");
        $('#ErrPassword').html("");
        $('#ErrState').html("");
        $('#ErrSponserName').html("");
        $('#ErrSponserID').html("");
        $('#ErrNomineeName').html("");
        $('#ErrRelation').html("");
        $('#ErrAadhaarcard').html("");
        $('#ErrPanCard').html("");
        $('#ErrVoterID').html("");
        $('#ErrAccountName').html("");
        $('#ErrBankName').html("");
        $('#ErrAccountNumber').html("");
        $('#ErrIFSCode').html("");
        $('#ErrEntryPin').html("");                                            
        $('#ErrSafePin').html("");
        
        //IsNonEmpty("DateofBirth", "ErrDateofBirth", "Please Enter Date of Birth");
        //if (!(IsNonEmpty("MobileNumber","ErrMobileNumber","Please enter your mobile number"))) {
        //  IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid Mobile Number");
        //}
        //if (IsNonEmpty("EmailID","ErrEmailID","Please enter your email id") {
        //  IsEmail("EmailID","ErrEmailID","Please enter valid EmailID");
        //}
        //IsNonEmpty("Pincode","ErrPincode","Please enter your Pincode");
        //IsNonEmpty("VoterID","ErrVoterID","Please enter your Voter ID"); 
               
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please enter your AddressLine1");
        IsNonEmpty("City","ErrCity","Please enter your City");
        IsNonEmpty("Name", "ErrName", "Please Enter Name");
        IsNonEmpty("SurName", "ErrSurName", "Please Enter Sur Name");
        IsNonEmpty("Education", "ErrEducation", "Please Enter Education");
        IsNonEmpty("Sex", "ErrSex", "Please Enter Sex");
        IsNonEmpty("Password","ErrPassword","Please enter your Password");
        IsNonEmpty("State","ErrState","Please enter your State");
        IsNonEmpty("NomineeName","ErrNomineeName","Please enter your Nominee Name");
        IsNonEmpty("Relation","ErrRelation","Please enter your Relation");
        IsNonEmpty("Aadhaarcard","ErrAadhaarcard","Please enter your Aadhaar card");
        IsNonEmpty("PanCard","ErrPanCard","Please enter your PanCard");
        IsNonEmpty("SponserID","ErrSponserID","Please enter your Sponsor ID");
        IsNonEmpty("AccountName","ErrAccountName","Please enter your Account Name");
        IsNonEmpty("BankName","ErrBankName","Please enter your Bank Name");
        IsNonEmpty("AccountNumber","ErrAccountNumber","Please enter your Account Number");
        IsNonEmpty("IFSCode","ErrIFSCode","Please enter your IFSCode");
        return (ErrorCount==0) ? true : false;
    }
</script>
<section style="background:#fcf4cf;">
    <div class="form-group row"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="margin-top: 5%;">
            <div class="container" style="padding-bottom: 35px;"> 
                <?php
                    $ErrorCount = 0;
                    
                    if (isset($_POST['btnRegister'])) {
                        
                        if ($ErrorCount==0) {
                            $MemberCode=SeqMaster::GetNextMemberCode();                                                                      
                            $Member = $mysql->insert("_tbl_free_member",array("MemberCode"         => $MemberCode,
                                                                         "MemberName"         => trim($_POST['FirstName']),
                                                                         "MemberSurname"      => trim($_POST['Surname']),
                                                                         "MemberPassword"     => trim($_POST['Password']),
                                                                         "AddressLine1"       => trim($_POST['Address1']),
                                                                         "AddressLine2"       => trim($_POST['Address2']),               
                                                                         "City"               => trim($_POST['City']),           
                                                                         "State"              => trim($_POST['State']),
                                                                         "PinCode"            => trim($_POST['Pincode']),
                                                                         "MemberMobileNumber" => trim($_POST['MobileNumber']),
                                                                         "AadhaarNumber"      => trim($_POST['AadhaarNumber']),
                                                                         "PancardNumber"      => trim($_POST['PancardNumber']),
                                                                         "VoterIDNumber"      => trim($_POST['VoterIDNumber']),
                                                                         "Sex"                => trim($_POST['Sex']),
                                                                         "DateOfBirth"        => trim($_POST['year']."-".$_POST['month']."-".$_POST['date']),
                                                                         "EduDetails"         => trim($_POST['EduDetails']),
                                                                         "EmailID"            => trim($_POST['EmailID']),
                                                                         "AccountHolderName"  => $_POST['AccountHolderName'],
                                                                         "AccountNumber"      => $_POST['AccountNumber'],
                                                                         "AccountType"        => $_POST['AccountType'],
                                                                         "BankName"           => $_POST['BankName'],
                                                                         "IFSCode"            => $_POST['IFSCode'],  
                                                                         "NominiName"         => $_POST['NominiName'],
                                                                         "NominiRelation"     => $_POST['NominiRelation'],
                                                                         "NominiDateOfBirth"  => $_POST['NominiYear']."-".$_POST['NominiMonth']."-".$_POST['NominiDate'],
                                                                         "CreatedOn"          => date("Y-m-d H:i:s")));
                            if ($Member>0) {
                                
                                $message="Dear ".$_POST['FirstName'].", Your request has been accepted, we will call back shortly. Url: http://www.goldenlifesociety.co.in - Thanks GLS Team";
                                $url="http://www.aaranju.in/sms/api.php?username=a3VtYXJtMTQ5QGdtYW&password=lsLmNvbQ==&number=".trim($_POST['MobileNumber'])."&sender=GOLDLS&message=".urlencode($message)."&uid=".$MemberCode;
                                $ch = curl_init($url);
                                curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0");
                                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                curl_setopt($ch, CURLOPT_TIMEOUT, 400);
                                $res = curl_exec($ch);
                                curl_close($ch);
                                
                                /* <script>location.href='MemberCheckout.php?id=<?php echo $Member;?>';</script>  */
                                $successmessage = "<div style='text-align:center;padding:20px;'>
                                                        <img src='assets/images/checkmark-flat.png'><br><br>
                                                        Member has been created successfully<br><br>
                                                        We will callback to you shortly.
                                                        </table>
                                                        <br><br>
                                                        <a href='login.php'>Continue to login</a>
                                                        <style>#memberform{display:none}</style>
                                                   </div>";
                            } else {
                                $errorMessage = "<div class='failure' style='color:red'>Error occured. Couldn't save member detatils</div>";
                            }
                        }
                    }
                ?>
                <div class="col-sm-12"><?php echo $errorMessage;?><?php echo $successmessage?></div>
                <form id="memberform" method="post" action=""   onsubmit="return submitRegister()">
                    <div class="h5 modal-title text-center">
                        <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><div style="color:#333 !important">GLS Member Registration Form</div><span style="font-size: 1.1rem;"><br></span>   </h4>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Name</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="FirstName" placeholder="Name here ..." id="Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Sur Name</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="Surname" placeholder="SurName here ..." id="SurName" value="<?php echo isset($_POST['Surname']) ? $_POST['Surname'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrSurName"><?php echo isset($ErrSurName)? $ErrSurName : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Education</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="EduDetails" placeholder="Education here ..." id="Education" value="<?php echo isset($_POST['EduDetails']) ? $_POST['EduDetails'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrEducation"><?php echo isset($ErrEducation)? $ErrEducation : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Sex</div>
                        <div class="col-sm-2">
                            <select class="form-control" data-live-search="true" id="Sex" name="Sex" style="padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <option value="Male" <?php echo ($_POST['Sex']=="Male") ? " selected='selected' " : "";?>>Male</option>                             
                                <option value="FeMale" <?php echo ($_POST['Sex']=="FeMale") ? " selected='selected' " : "";?>>FeMale</option>                             
                            </select>
                        </div>                                                                                
                        <div class="col-sm-2 col-form-label" style="margin-right: -40px;">Date of birth</div>
                        <div class="col-sm-1" style="max-width:160px !important;margin-right: -26px;">
                            <select class="form-control" data-live-search="true" id="date" name="date" style="width:50px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
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
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Mobile Number</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="MobileNumber" maxlength="10" placeholder="Mobile Number here ..." id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Email ID</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="EmailID" placeholder="Email ID here ..." id="EmailID" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Address Line1</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="Address1" placeholder="Address here ..." id="AddressLine1" value="<?php echo isset($_POST['Address1']) ? $_POST['Address1'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                        </div>                                                                                
                    </div>                          
                    <div class="form-group row">
                        <div class="col-sm-4">Address Line2</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="Address2" placeholder="Address here ..." id="AddressLine2" value="<?php echo isset($_POST['Address2']) ? $_POST['Address2'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">City</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="City" placeholder="City here ..." id="City" value="<?php echo isset($_POST['City']) ? $_POST['City'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrCity"><?php echo isset($ErrCity)? $ErrCity : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">State Name</div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="State" placeholder="State here ..." id="State" value="<?php echo isset($_POST['State']) ? $_POST['State'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrState"><?php echo isset($ErrState)? $ErrState : "";?></span>
                        </div>                                                                                
                        <div class="col-sm-2 col-form-label" style="margin-right: -69px;">Pincode</div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="Pincode" maxlength="6" placeholder="Pincode here ..." id="City" value="<?php echo isset($_POST['Pincode']) ? $_POST['Pincode'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrPincode"><?php echo isset($ErrPincode)? $ErrPincode : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Password</div>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="Password" placeholder="Password here ..." id="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Confirm Password</div>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password here ..." id="ConfirmPassword" value="<?php echo isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="h5 modal-title text-center">
                        <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><span style="font-size: 1.1rem;">Nominee Information</span>   </h4>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Nominee Name</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="NominiName" placeholder="Nominee Name here ..." id="NomineeName" value="<?php echo isset($_POST['NominiName']) ? $_POST['NominiName'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrNomineeName"><?php echo isset($ErrNomineeName)? $ErrNomineeName : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-form-label">Date of birth</div>
                        <div class="col-sm-1" style="max-width:160px !important;margin-right: -26px;">
                            <select class="form-control" data-live-search="true" id="Nomineedate" name="NominiDate" style="width:50px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <?php for($i=1;$i<=31;$i++) {?>
                                    <option value="<?php echo $i; ?>" <?php echo ($_POST[ 'NominiDate']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2" style="max-width:132px !important;margin-right: -25px;">
                            <select data-live-search="true" class="form-control"  id="Nomineemonth" name="NominiMonth" style="width:80px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;"> 
                            <?php foreach($_monthname as $key=>$value) {?>
                                <option value="<?php echo $key+1; ?>" <?php echo ($_POST[ 'NominiMonth']==$key+1) ? " selected='selected' " : "";?>><?php echo $value;?></option>
                            <?php } ?>
                            </select>                                    
                        </div>
                        <div class="col-sm-2" style="max-width: 148px;">
                            <select class="form-control" data-live-search="true" id="Nomineeyear" name="NominiYear" style="width:80px;padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <?php for($i=$_DOB_Year_Start;$i>=$_DOB_Year_End;$i--) {?>
                                    <option value="<?php echo $i; ?>" <?php echo ($_POST['NominiYear']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>                             
                                <?php } ?>                                                 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Relation</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="NominiRelation" placeholder="Relation here ..." id="Relation" value="<?php echo isset($_POST['NominiRelation']) ? $_POST['NominiRelation'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrRelation"><?php echo isset($ErrRelation)? $ErrRelation : "";?></span>
                        </div> 
                    </div>
                    <div class="h5 modal-title text-center">
                        <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><span style="font-size: 1.1rem;">KYC Information</span>   </h4>
                    </div>          
                    <div class="form-group row">
                        <div class="col-sm-4">AdhaarCard</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="AadhaarNumber" placeholder="Aadhaarcard here ..." id="Aadhaarcard" value="<?php echo isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrAadhaarcard"><?php echo isset($ErrAadhaarcard)? $ErrAadhaarcard : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Pancard</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="PancardNumber" placeholder="PanCard here ..." id="PanCard" value="<?php echo isset($_POST['PancardNumber']) ? $_POST['PancardNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrPanCard"><?php echo isset($ErrPanCard)? $ErrPanCard : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">VoterID</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="VoterIDNumber" placeholder="VoterID here ..." id="PanCard" value="<?php echo isset($_POST['VoterIDNumber']) ? $_POST['VoterIDNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrVoterID"><?php echo isset($ErrVoterID)? $ErrVoterID : "";?></span>
                        </div> 
                    </div>
                    <div class="h5 modal-title text-center">
                        <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><span style="font-size: 1.1rem;">Bank Account Information</span>   </h4>
                    </div>
                    <div class="form-group row">                  
                        <div class="col-sm-4">A/C Name</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="AccountHolderName" placeholder="AccountName here ..." id="AccountName" value="<?php echo isset($_POST['AccountHolderName']) ? $_POST['AccountHolderName'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrAccountName"><?php echo isset($ErrAccountName)? $ErrAccountName : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">Bank Names</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="BankName" placeholder="BankName here ..." id="BankName" value="<?php echo isset($_POST['BankName']) ? $_POST['BankName'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrBankName"><?php echo isset($ErrBankName)? $ErrBankName : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">A/C Number</div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="AccountNumber" placeholder="AccountNumber here ..." id="AccountNumber" value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrAccountNumber"><?php echo isset($ErrAccountNumber)? $ErrAccountNumber : "";?></span>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">A/C Type</div>
                        <div class="col-sm-2">
                            <select class="form-control" data-live-search="true" id="AccountType" name="AccountType" style="padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <option value="Current" <?php echo ($_POST['AccountType']=="Current") ? " selected='selected' " : "";?>>Current</option>                             
                                <option value="Savings" <?php echo ($_POST['AccountType']=="Savings") ? " selected='selected' " : "";?>>Savings</option>                             
                            </select>
                        </div> 
                        <div class="col-sm-2 col-form-label" style="margin-right: -74px;">IFS Code</div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="IFSCode" placeholder="IFSCode here ..." id="IFSCode" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span>
                        </div> 
                    </div>
                    <input type="submit" value="Submit Request" class="btn btn-primary" id="btnLogin" name="btnRegister">
                </form>
            </div>                                                                                                                         
        </div>
    </div>
    <div class="col-sm-2"></div>
</section>
<?php include_once("footer.php");?>