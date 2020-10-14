<?php 
include_once("config.php");
include_once("header.php")    ;?>
    <div id="aq-block-7843-8" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf">
        <style scoped>.mainwrap.rand-737 #headerwrap{background:#f8f8f8 !important;}</style>
        <div  class="mainwrap rand-737      " style="background:#f8f8f8 url() 50% 0;background-size:cover;border-top:1px solid #dddddd;border-bottom:1px solid #dddddd;padding:0px 0 0px 0;">
            <div class="main clearfix ">
                <div class="content fullwidth"></div>
                <div id="aq-block-7843-9" class="aq-block aq-block-pmc_wp_breadcrumb_block aq_span12 aq-first cf">            
                    <div class = "outerpagewrap">
                        <style scoped>.pagewrap a, .pagewrap h1, .pagewrap h1 span, .pagewrap p{color: #2a2b2c; }</style>
                        <div class="pagewrap" style="">
                            <div class="pagecontent">
                                <div class="pagecontentContent-title">
                                    <h1>Register</h1>
                                </div>
                                <div class="pagecontentContent-breadcrumb">
                                    <p><a href="https://www.glspost.com">Home</a> &#187; <span>Register</span></p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div id="aq-block-7843-10" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf"></div>
            </div>
        </div>
    </div>
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
        IsNonEmpty("EntryPin","ErrEntryPin","Please enter your EntryPin");
        IsNonEmpty("SafePin","ErrSafePin","Please enter your SafePin");
        return (ErrorCount==0) ? true : false;
    }
</script>
<?php            
                    $ErrorCount = 0;
                    
                    if (isset($_POST['btnRegister'])) {
                        
                        $epin=$mysql->select("select * from `_tbl_epins` where `PinCode`='".$_POST['EPin']."' and `EPinPassword`='".$_POST['EPinPassword']."' `IsUsed`=='0'");
                        if (sizeof($epin)==0) {
                             $errorMessage = "<div class='failure'>Error occured. Couldn't find epin details</div>";
                             $ErrorCount++;
                        }
                        
                        $sponsor=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$_POST['SponsorID']."'");
                        if (sizeof($sponsor)==0) {
                             $errorMessage = "<div class='failure'>Error occured. Couldn't find sponsor information</div>";
                             $ErrorCount++;
                        }
                        
                        if ($ErrorCount==0) {
                            $upline = findUpline($sponsor[0]['MemberCode']);
                            $MemberCode=SeqMaster::GetNextMemberCode();                                                                      
                            $Member = $mysql->insert("_tbl_member",array("MemberCode"         => $MemberCode,
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
                                                                         "SponsorID"          => $sponsor[0]['MemberID'],
                                                                         "SponsorCode"        => $sponsor[0]['MemberCode'],
                                                                         "Sponsorname"        => $sponsor[0]['MemberName'],
                                                                         "CreatedOn"          => date("Y-m-d H:i:s")));
                            if ($Member>0) {
                                
                                $mysql->insert("_tbl_member_banknames",array("MemberID"          => $Member,
                                                                             "MemberCode"        => $MemberCode,
                                                                             "AccountHolderName" => $_POST['AccountHolderName'],
                                                                             "AccountNumber"     => $_POST['AccountNumber'],
                                                                             "AccountType"       => $_POST['AccountType'],
                                                                             "BankName"          => $_POST['BankName'],
                                                                             "IFSCode"           => $_POST['IFSCode'],           
                                                                             "Added"             => date("Y-m-d H:i:s")));
                                                                             
                                $mysql->insert("_tbl_member_kycinformation",array("MemberID"      => $Member,
                                                                                  "MemberCode"    => $MemberCode,
                                                                                  "AadhaarNumber" => $_POST['AadhaarNumber'],
                                                                                  "PanCardNumber" => $_POST['PancardNumber'],
                                                                                  "VoterIDNumber" => $_POST['VoterIDNumber'],
                                                                                  "AddedOn"       => date("Y-m-d H:i:s")));
                                                                                  
                                $mysql->insert("_tbl_member_nominiinformation",array("MemberID"          => $Member,
                                                                                     "MemberCode"        => $MemberCode,
                                                                                     "NominiName"        => $_POST['NominiName'],
                                                                                     "NominiRelation"    => $_POST['NominiRelation'],
                                                                                     "NominiDateOfBirth" => $_POST['NominiYear']."-".$_POST['NominiMonth']."-".$_POST['NominiDate'],
                                                                                     "IsActive"          => "1",
                                                                                     "AddedOn"           => date("Y-m-d H:i:s")));
                                                                                     
                                $mysql->execute("update _tbl_epins set IsUsed='1', 
                                                                       UsedOn='".date("Y-m-d H:i:s")."',
                                                                       UsedToMemberID='".$Member."',
                                                                       UsedMemberCode='".$MemberCode."',
                                                                       UsedMemberName='".trim($_POST['FirstName'])."' where PinID='".$epin[0]['PinID']."'");
                                                  
                                $mysql->insert("_tbl_placements",array("ParentMemberID"=>$upline[0]['MemberID'] ,
                                                                       "ParentMemberCode"=>$upline[0]['MemberCode'],
                                                                       "ParentMemberName"=>$upline[0]['MemberName'],
                                                                                         
                                                                       "UplineMemberID"   => $upline[0]['UplineMemberID'],
                                                                       "UplineMemberCode" => $upline[0]['UplineMemberCode'],
                                                                       "UpilneMemberName" => $upline[0]['UplineMemberName'],
                                                                                         
                                                                       "ChildMemberID"=>$Member,
                                                                       "ChildMemberCode"=>$MemberCode,
                                                                       "ChildMemberName"=>trim($_POST['FirstName']),
                                                                                         
                                                                       "PlacementedOn"=>date("Y-m-d H:i:s"),
                                                                       
                                                                       "PlacementedID"=>$sponsor[0]['MemberID'],
                                                                       "PlacementedCode"=>$sponsor[0]['MemberCode'],
                                                                       "PlacementedName"=>$sponsor[0]['MemberName'],
                                                                       "UsedPinID"        =>$epin[0]['PinID'],
                                                                       "IsDirect"=>  $epin[0]['SoldMemberID']==$upline[0]['MemberID'] ? "1" : "0"));
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
                                                                             "PlacedByMemberID"=>$epin[0]['SoldMemberID'],
                                                                             "PlacedByMemberCode"=>$epin[0]['SoldMemberCode'],
                                                                             "PlacedByMemberName"=>$epin[0]['SoldMemberName'],
                                                                             "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                             "FromWeb"=>"1",
                                                                             "FromPortal"=>"0"));
                                                                             
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

                                $message="Dear ".$_POST['FirstName'].", Your account has been created. Login Details: Member Code: ".$MemberCode.", Password=".$_POST['Password'].", Url: http://www.goldenlifesociety.co.in - Thanks GLS Team";
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
                                                        <a href='login.php'>Continue to login</a>
                                                        <style>#memberform{display:none}</style>
                                                   </div>";
                            } else {
                                $errorMessage = "<div class='failure' style='color:red'>Error occured. Couldn't save member detatils</div>";
                            }
                        }
                    }
                ?>
      <div class="usercontent"> 
            <div id="aq-template-wrapper-7697" class="aq-template-wrapper aq_row">
                <div id="aq-block-7697-1" class="aq-block aq-block-aq_richtext_block aq_span12 aq-first cf">
                    <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=4.8.13'></script>
                    <p></p>
                </div>
                <div id="aq-block-7697-2" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf">
                    <style scoped>.mainwrap.rand-479 #headerwrap{background:#fff !important;}</style>
                    <div  class="mainwrap rand-479      " style="background:#fff url() 50% 0;background-size:cover;border-top:0px solid #fff;border-bottom:0px solid #fff;padding:0px 0 0px 0;">
                        <div class="main clearfix ">
                            <div class="content fullwidth">
                        </div>
                        <div id="aq-block-7697-3" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf">
                            <div class="cf" style="height:70px; background:#fff"></div>
                        </div>
                        <div id="aq-block-7697-4" class="aq-block aq-block-aq_contact_block aq_span7 aq-first cf">
                            <div role="form" class="wpcf7" id="wpcf7-f9266-p7698-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response"></div>  
                                <!--<form action="/contact/#wpcf7-f9266-p7698-o1" method="post" class="wpcf7-form" novalidate="novalidate">-->
                                <form id="memberform" method="post" action=""   onsubmit="return submitRegister()">
                                    <p>Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" name="FirstName" placeholder="Name here ..." id="Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>" >
                                            <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Sur Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="Surname" id="SurName" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Surname']) ? $_POST['Surname'] : '';?>" placeholder="SurName here ...">
                                            <span class="errorstring" id="ErrSurName"><?php echo isset($ErrSurName)? $ErrSurName : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Education<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="EduDetails" id="Education" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Education']) ? $_POST['Education'] : '';?>" placeholder="Education here ...">
                                            <span class="errorstring" id="ErrEducation"><?php echo isset($ErrEducation)? $ErrEducation : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Sex<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <select class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" data-live-search="true" id="Sex" name="Sex" style="padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                                <option value="Male" <?php echo ($_POST['Sex']=="Male") ? " selected='selected' " : "";?>>Male</option>                             
                                                <option value="FeMale" <?php echo ($_POST['Sex']=="FeMale") ? " selected='selected' " : "";?>>FeMale</option>                             
                                            </select>
                                        </span> 
                                    </p> 
                                    <p>DateofBirth<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="EduDetails" id="Education" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Education']) ? $_POST['Education'] : '';?>" placeholder="Education here ...">
                                            <span class="errorstring" id="ErrEducation"><?php echo isset($ErrEducation)? $ErrEducation : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Mobile Number<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="MobileNumber" id="MobileNumber" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : '';?>" placeholder="Mobile Number here ..." maxlength="10">
                                            <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Email ID<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="EmailID" id="EmailID" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : '';?>" placeholder="Email ID here ...">
                                            <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Address Line1<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="Address1" id="AddressLine1" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Address1']) ? $_POST['Address1'] : '';?>" placeholder="Address here ...">
                                            <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Address Line2<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="Address2" id="AddressLine2" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Address2']) ? $_POST['Address2'] : '';?>" placeholder="Address here ...">
                                            <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                        </span> 
                                    </p>
                                    <p>City<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="City" id="City" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['City']) ? $_POST['City'] : '';?>" placeholder="City here ...">
                                            <span class="errorstring" id="ErrCity"><?php echo isset($ErrCity)? $ErrCity : "";?></span>
                                        </span> 
                                    </p>
                                    <p>State Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="State" id="State" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['State']) ? $_POST['State'] : '';?>" placeholder="State here ...">
                                            <span class="errorstring" id="ErrState"><?php echo isset($ErrState)? $ErrState : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Pincode<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="Pincode" id="Pincode" maxlength="6" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Pincode']) ? $_POST['Pincode'] : '';?>" placeholder="Pincode here ...">
                                            <span class="errorstring" id="ErrPincode"><?php echo isset($ErrPincode)? $ErrPincode : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Password<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="password" name="Password" id="Password" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>" placeholder="Password here ...">
                                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Confirm Password<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : '';?>" placeholder="Confirm Password here ...">
                                            <span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span>
                                        </span> 
                                    </p>
                                    <h5>My Sponsor's Info</h5>
                                    <p>Sponsor's ID<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="SponsorID" id="SponsorID" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['SponsorID']) ? $_POST['SponsorID'] : '';?>" placeholder="Sponsor ID here ...">
                                            <span class="errorstring" id="ErrSponsorID"><?php echo isset($ErrSponsorID)? $ErrSponsorID : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Sponsor's Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="SponserName" id="SponserName" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['SponserName']) ? $_POST['SponserName'] : '';?>" placeholder="Sponser Name here ...">
                                            <span class="errorstring" id="ErrSponserName"><?php echo isset($ErrSponserName)? $ErrSponserName : "";?></span>
                                        </span> 
                                    </p>
                                    <h5>Nominee Information</h5>
                                    <p>Nominee Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="NominiName" id="NominiName" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['NominiName']) ? $_POST['NominiName'] : '';?>" placeholder="Nomini Name here ...">
                                            <span class="errorstring" id="ErrNominiName"><?php echo isset($ErrNominiName)? $ErrNominiName : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Date of Birth<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="date" name="NomineeDateofBirth" id="NomineeDateofBirth" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['NomineeDateofBirth']) ? $_POST['NomineeDateofBirth'] : '';?>">
                                        </span> 
                                    </p>
                                     <p>Relation<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="NominiRelation" id="Relation" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['NominiRelation']) ? $_POST['NominiRelation'] : '';?>" placeholder="Relation here ...">
                                            <span class="errorstring" id="ErrRelation"><?php echo isset($ErrRelation)? $ErrRelation : "";?></span>
                                        </span> 
                                    </p>
                                    <h5>KYC Information</h5>
                                    <p>AdhaarCard<br />
                                       <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="AadhaarNumber" id="Aadhaarcard" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : '';?>" placeholder="Aadhaarcard here ...">
                                            <span class="errorstring" id="ErrAadhaarcard"><?php echo isset($ErrAadhaarcard)? $ErrAadhaarcard : "";?></span>
                                        </span> 
                                    </p>
                                    <p>Pancard<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="PancardNumber" id="PanCard" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['PancardNumber']) ? $_POST['PancardNumber'] : '';?>" placeholder="PanCard here ...">
                                            <span class="errorstring" id="ErrPanCard"><?php echo isset($ErrPanCard)? $ErrPanCard : "";?></span>
                                        </span>  
                                    </p>
                                    <p>VoterID<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="VoterIDNumber" id="VoterIDNumber" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['VoterIDNumber']) ? $_POST['VoterIDNumber'] : '';?>" placeholder="VoterID here ...">
                                            <span class="errorstring" id="ErrVoterIDNumber"><?php echo isset($ErrVoterIDNumber)? $ErrVoterIDNumber : "";?></span>
                                        </span>  
                                    </p>
                                    <h5>Bank Account Information</h5>
                                    <p>A/C Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="AccountHolderName" id="AccountName" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['AccountHolderName']) ? $_POST['AccountHolderName'] : '';?>" placeholder="AccountName here ...">
                                            <span class="errorstring" id="ErrAccountName"><?php echo isset($ErrAccountName)? $ErrAccountName : "";?></span>
                                        </span>  
                                    </p> 
                                    <p>Bank Name<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="BankName" id="BankName" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['BankName']) ? $_POST['BankName'] : '';?>" placeholder="Bank Name here ...">
                                            <span class="errorstring" id="ErrBankName"><?php echo isset($ErrBankName)? $ErrBankName : "";?></span>
                                        </span>  
                                    </p>
                                    <p>A/C Number<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="AccountNumber" id="AccountNumber" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : '';?>" placeholder="Account Number here ...">
                                            <span class="errorstring" id="ErrAccountNumber"><?php echo isset($ErrAccountNumber)? $ErrAccountNumber : "";?></span>
                                        </span>  
                                    </p>
                                    <p>A/C Type<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <select class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" data-live-search="true" id="AccountType" name="AccountType" >
                                                <option value="Current" <?php echo ($_POST['AccountType']=="Current") ? " selected='selected' " : "";?>>Current</option>                             
                                                <option value="Savings" <?php echo ($_POST['AccountType']=="Savings") ? " selected='selected' " : "";?>>Savings</option>                             
                                            </select>
                                        </span> 
                                    </p>
                                    <p>IFS Code<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="IFSCode" id="IFSCode" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : '';?>" placeholder="IFSCode here ...">
                                            <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span>
                                        </span>  
                                    </p>
                                    <h5>E-Pin Information</h5>
                                    <p>Entry Pin<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="EPin" id="EntryPin" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['EPin']) ? $_POST['EPin'] : '';?>" placeholder="EntryPin here ...">
                                            <span class="errorstring" id="ErrEntryPin"><?php echo isset($ErrEntryPin)? $ErrEntryPin : "";?></span>
                                        </span>  
                                    </p>
                                    <p>Safe Pin<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="EPinPassword" id="SafePin" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" value="<?php echo isset($_POST['EPinPassword']) ? $_POST['EPinPassword'] : '';?>" placeholder="SafePin here ...">
                                            <span class="errorstring" id="ErrSafePin"><?php echo isset($ErrSafePin)? $ErrSafePin : "";?></span>
                                        </span>  
                                    </p>
                                    <p><?php echo $errorMessage;?><?php echo $successmessage?></p>
                                    <p><input type="submit" value="Register" name="btnRegister" class="wpcf7-form-control wpcf7-submit" /></p>
                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                </form>
                            </div>
                        </div>
                        <div id="aq-block-7697-5" class="aq-block aq-block-aq_widgets_block aq_span5  cf">       
                        <script type="text/javascript">
                            jQuery(document).ready(function(){                                                                                                          
                                jQuery('.aq-block-aq_widgets_block .widget div').css('color','#fff !important');
                            });
                        </script>
                        
                </div>
                <div id="aq-block-7697-6" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">        
                </div>
            </div>
      </div>
      </div>
        <div id="aq-block-7697-7" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf">
            <div class="cf" style="height:100px; background:#fff"></div>                  
        </div>
    </div>    
    </div>
    <div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>

<?php include_once("footer.php");?>