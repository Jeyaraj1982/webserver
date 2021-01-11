<?php include_once("header.php"); ?>
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
        
        $('#ErrName').html("");
        $('#ErrDateofBirth').html("");
        $('#ErrMobileNumber').html("");
        // $('#ErrEmailID').html("");
        $('#ErrAddressLine1').html("");
        $('#ErrPassword').html("");
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please enter your AddressLine1");
        IsNonEmpty("Name", "ErrName", "Please Enter Name");
        IsNonEmpty("Password","ErrPassword","Please enter your Password");
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
                                                                         "CreatedOn"          => date("Y-m-d H:i:s")));
                            if ($Member>0) {
                                
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
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Name</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="FirstName" placeholder="Name here ..." id="Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;width:100%">
                            <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                        </div> 
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Sex</div>
                        <div class="col-sm-2">
                            <select class="form-control" data-live-search="true" id="Sex" name="Sex" style="padding: 0px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                                <option value="Male" <?php echo ($_POST['Sex']=="Male") ? " selected='selected' " : "";?>>Male</option>                             
                                <option value="FeMale" <?php echo ($_POST['Sex']=="FeMale") ? " selected='selected' " : "";?>>FeMale</option>                             
                            </select>
                        </div>                                                                                
                        <div class="col-sm-3 col-form-label" style="margin-right: -40px;">Date of birth</div>
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
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Mobile Number</div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="MobileNumber" maxlength="10" placeholder="Mobile Number here ..." id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;;width:100%">
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
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Address Line1</div>
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
                        <div class="col-sm-3" style="text-align: right;padding-top:13px;">Password</div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="Password" placeholder="Password here ..." id="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;;width:100%">
                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                        </div>                                                                                
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"  style="text-align: right;padding-top:13px;">Confirm Password</div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password here ..." id="ConfirmPassword" value="<?php echo isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;width:100%">
                            <span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span>
                        </div>                                                                                
                    </div>
                      <div class="form-group row">
                        <div class="col-sm-3"  style="text-align: right;padding-top:13px;">Activation Method</div>
                        <div class="col-sm-9">
                            <select class="form-control">
                                <option vlaue="1">Using Payment Gateway (Rs. 500/-)</option>
                                <option vlaue="2">Using Epin & Pin Password</option>
                            </select>
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