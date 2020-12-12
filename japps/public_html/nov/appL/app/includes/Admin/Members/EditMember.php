<?php
$data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
if (isset($_POST['PancardBtn'])) {
    $target_path = "assets/uploads/";
    $filename = strtolower(time()."_".$_FILES['Pancard']['name']);
    
    if(move_uploaded_file($_FILES['Pancard']['tmp_name'], $target_path.$filename)) {  
        $mysql->execute("update `_tbl_Members` set `PanCardFile`='".$filename."' where `MemberCode`='".$_GET['MCode']."'");
        ?>
          <script>
              $(document).ready(function() {
            
                    swal("Pancard Image updated successfully", {
                        icon : "success" 
                    });
                 });
            </script>
        <?php
    } else{  
       // echo "Sorry, file not uploaded, please try again!";  
       ?>
         <script>
              $(document).ready(function() {
            
                    swal("Pancard Image upload failed", {
                        icon : "error" 
                    });
                 });
            </script>
       <?php
    }  
}

if (isset($_POST['PhotoBtn'])) {
    $target_path = "assets/uploads/";
    $filename = strtolower(time()."_".$_FILES['profile']['name']);
    if(move_uploaded_file($_FILES['profile']['tmp_name'], $target_path.$filename)) {  
        $mysql->execute("update `_tbl_Members` set `Thumb`='".$filename."' where `MemberCode`='".$_GET['MCode']."'");
        ?>
         <script>
              $(document).ready(function() {
            
                    swal("Profile Image updated successfully", {
                        icon : "success" 
                    });
                 });
            </script>
        <?php
    } else{  
      //  echo "Sorry, file not uploaded, please try again!";  
      ?>
       <script>
              $(document).ready(function() {
            
                    swal("Profile Image upload failed", {
                        icon : "error" 
                    });
                 });
            </script>
      <?php
    }  
}


if (isset($_POST['BlockBtn'])) {
    
    $mysql->execute("update _tbl_Members set IsActive='0' where MemberCode='".$_GET['MCode']."'");
            ?>
            <script>
            $(document).ready(function() {
                swal("Blocked successfully", {
                    icon : "success" 
                });
            });
            </script>
  <?php   
}
if (isset($_POST['UnblockBtn'])) {
    
    $mysql->execute("update _tbl_Members set IsActive='1' where MemberCode='".$_GET['MCode']."'");
            ?>
            <script>
            $(document).ready(function() {
                swal("Un blocked successfully", {
                    icon : "success" 
                });
            });
            </script>
  <?php   
}
if (isset($_POST['RemovePancardFile'])) {
    
    $mysql->execute("update _tbl_Members set PanCardFile='' where MemberCode='".$_GET['MCode']."'");
            ?>
            <script>
            $(document).ready(function() {
                swal("Pancard Removed successfully", {
                    icon : "success" 
                });
            });
            </script>
  <?php   
}
if (isset($_POST['RemoveProfileThumb'])) {
    
    $mysql->execute("update _tbl_Members set Thumb='' where MemberCode='".$_GET['MCode']."'");
            ?>
            <script>
            $(document).ready(function() {
                swal("Profile Photo Removed successfully", {
                    icon : "success" 
                });
            });
            </script>
  <?php   
}
    
    
if (isset($_POST['updateBtn'])) {
    
    $error =0;                                      
         
          if (!(strlen(trim($_POST['MemberName']))>3)) {
            $error++;
            $errorMsg = "Please enter member name.";
            $errorMember ="Please enter member name.";
        }
          
        $mobilenumber_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsMobileIsMandatory')");    
        if ($mobilenumber_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['MobileNumber']))>0)  {
            if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
                $error++;
                $errorMobile="Invalid mobile number. Please try again.";
            }
            
            $mobilenumber_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateMobile')");    
            if ($mobilenumber_allowduplicate[0]['ParamValue']==0)  {
                $dupMobile = $mysql->select("select * from _tbl_Members where MemberID<>'".$data[0]['MemberID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                if (sizeof($dupMobile)>0) {
                    $error++;
                    $errorMsg = "Please enter valid mobile number.";
                    $errorMobile ="Mobile Number already used.";
                }
            }
        }
        
        $email_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsEmailMandatory')");    
        if ($email_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['MemberEmail']))>0)  {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
            if (!(preg_match($regex, strtolower($_POST['MemberEmail'])))) {
                $error++;
                $errorEmail="Email is an invalid email. Please try again.";
            }
            
            $email_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateEmail')");    
            if ($email_allowduplicate[0]['ParamValue']==0)  {
                $dupEmail = $mysql->select("select * from _tbl_Members where MemberID<>'".$data[0]['MemberID']."' and MemberEmail='".trim($_POST['MemberEmail'])."'");
                if (sizeof($dupEmail)>0) {
                    $error++;
                    $errorMsg = "Please enter valid mobile number.";
                    $errorEmail ="Email ID already used.";
                }                                                                                               
            }
        }
        

        $pancard_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')");    
        if ($pancard_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['PanCard']))>0)  {
            if (!(strlen(trim($_POST['PanCard']))>5)) {
                $error++;
                $errorMsg = "Please enter valid Pancard Number.";
                $errorPanCard ="Please enter valid Pancard Number.";
            }
            
            $pancard_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicatePanCard')");    
            if ($pancard_allowduplicate[0]['ParamValue']==0) {
                $dupPancard = $mysql->select("select * from _tbl_Members where MemberID<>'".$data[0]['MemberID']."' and PanCard='".trim($_POST['PanCard'])."'");
                if (sizeof($dupPancard)>0) {
                    $error++;
                    $errorMsg = "Please enter valid Pancard Number.";
                    $errorPanCard ="Pancard already used.";
                }
            } 
        } 
        if ($error==0) {
            $dob = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
            $mysql->execute("update _tbl_Members set PanCard        = '".$_POST['PanCard']."',
                                                     MemberEmail    = '".$_POST['MemberEmail']."',
                                                     MobileNumber   = '".$_POST['MobileNumber']."',
                                                     MemberName     = '".$_POST['MemberName']."',
                                                     MemberPassword = '".$_POST['MemberPassword']."',
                                                     MemberTxnPassword = '".$_POST['MemberTxnPassword']."',
                                                     Sex            = '".$_POST['Sex']."',                           
                                                     AdhaarCard     = '".$_POST['AdhaarCard']."',
                                                     AddressLine1   = '".$_POST['AddressLine1']."',
                                                     AddressLine2   = '".$_POST['AddressLine2']."',
                                                     DateofBirth    = '".$dob."',
                                                     PinCode        = '".$_POST['PinCode']."' where MemberCode='".$_GET['MCode']."'");
            ?>
            <script>
            $(document).ready(function() {
                swal("Profile Information updated successfully", {
                    icon : "success" 
                });
            });
            </script>
            <?php
                                                     
        } else {
            ?>
             <script>
            $(document).ready(function() {
                swal("<?php echo $errorMsg;?>", {
                    icon : "error" 
                });
            });
            </script>
            <?php
        }
}
if (isset($_POST['BankupdateBtn'])) {
    
    $error =0;     
           if($_POST['AccountName']==""){
             $error++;
             $errorAccountName="Please Enter Account Name.";  
           }
           if(strlen($_POST['AccountName'])<3){
             $error++;
             $errorAccountName="Please Enter Valid Account Name.";  
           } 
            $regex = '/^[a-z0-9\-\s]+$/i'; 
            if (!(preg_match($regex, $_POST['AccountName']))) {
                $error++;
                $errorAccountName="AccountName is an invalid. Please try again.";
            }
            if($_POST['AccountNumber']==""){
             $error++;
             $errorAccountNumber="Please Enter Account Number.";  
           }
           if(strlen($_POST['AccountNumber'])<6){
             $error++;
             $errorAccountNumber="Please Enter Valid Account Number.";  
           } 
           $regex = '/^[\w.]+$/i';
            if (!(preg_match($regex, $_POST['AccountNumber']))) {
                $error++;
                $errorAccountNumber="AccountNumber is an invalid. Please try again.";
            }
            if($_POST['IFSCode']==""){
             $error++;
             $errorIFSCode="Please Enter IFSCode.";  
           }
           if(strlen($_POST['IFSCode'])<6){
             $error++;
             $errorIFSCode="Please Enter Valid IFSCode.";  
           } 
           $regex = '/^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/';
            if (!(preg_match($regex, $_POST['IFSCode']))) {
                $error++;
                $errorIFSCode="IFSCode is an invalid. Please try again.";
            }
                                             
      
        if ($error==0) {
            $Bank = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$data[0]['MemberID']."'");
            
            if(sizeof($Bank)==0){
                $mysql->insert("_tbl_member_bank_details",array("MemberID"      => $data[0]['MemberID'],
                                                              "AccountName"   => $_POST['AccountName'],
                                                              "AccountNumber" => $_POST['AccountNumber'],
                                                              "IFSCode"       => $_POST['IFSCode'],
                                                              "CreatedOn"     => date("Y-m-d H:i:s")));
            }else {
                $mysql->execute("update _tbl_member_bank_details set MemberID       = '".$data[0]['MemberID']."',
                                                                   AccountName    = '".$_POST['AccountName']."',
                                                                   AccountNumber  = '".$_POST['AccountNumber']."',
                                                                   IFSCode        = '".$_POST['IFSCode']."' where BankID='".$Bank[0]['BankID']."'");
              
            }
            ?>
           <script>
            $(document).ready(function() {
                swal("Bank Information updated successfully", {
                    icon : "success" 
                });
            });   
            </script>
            <?php
                                                    
        }                                                                                                
}

if (isset($_POST['NomineeupdateBtn'])) {
    
    $error =0;     
           if($_POST['NomineeName']==""){
             $error++;
             $errorNomineeName="Please Enter Nominee Name.";  
           }
           if($_POST['NomineeRelation']=="0"){
             $error++;
             $errorNomineeRelation="Please Enter Nominee Relation.";  
           }
                                       
      
        if ($error==0) {
            $Nominee = $mysql->select("select * from _tbl_member_nominee_details where MemberID='".$data[0]['MemberID']."'");
            
            if(sizeof($Nominee)==0){
                $mysql->insert("_tbl_member_nominee_details",array("MemberID"        => $data[0]['MemberID'],
                                                                   "NomineeName"     => $_POST['NomineeName'],
                                                                   "NomineeGender"   => $_POST['NomineeGender'],
                                                                   "NomineeRelation" => $_POST['NomineeRelation'],
                                                                   "CreatedOn"       => date("Y-m-d H:i:s")));
            }else {
                $mysql->execute("update _tbl_member_nominee_details set MemberID       = '".$data[0]['MemberID']."',
                                                                   NomineeName    = '".$_POST['NomineeName']."',
                                                                   NomineeGender    = '".$_POST['NomineeGender']."',
                                                                   NomineeRelation  = '".$_POST['NomineeRelation']."' where NomineeID='".$Nominee[0]['NomineeID']."'");
              
            }
            ?>
           <script>
            $(document).ready(function() {
                swal("Nominee Information updated successfully", {
                    icon : "success" 
                });
            });   
            </script>
            <?php
                                                    
        }                                                                                                
}
  //  $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
?>
<script>
 function GetDistrictname(StateID,DistrictID) {
        $.ajax({url:'webservice.php?action=GetDistrictname&StateID='+StateID+'&DistrictID='+DistrictID,success:function(data){
            $('#div_district').html(data);
        }});
    }
 </script>
<?php
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
    $Bdata = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$data[0]['MemberID']."'");
    $Ndata = $mysql->select("select * from _tbl_member_nominee_details where MemberID='".$data[0]['MemberID']."'");
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$data[0]['CurrentPackageID']."'"); 
    
    $url_array['']="MInfo";
    $url_array['EPins/MyPins']="EPins";
    $url_array['EPins/List']="EPins";
    $url_array['Earnings/PayoutTransactions']="Payout";
    $url_array['Earnings/Summary']="AC_Summary";
    $url_array['Members/GenealogyTree']="GTree";
    $url_array['Members/MyMembers']="DMembers";
    $url_array['Logs/MemberLogin']="Loglogin";
    $url_array['Logs/MobileSMS']="LogSMS";
    $url_array['Logs/Email']="LogEmail";
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member Information</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers"><?php echo $_GET['MCode'];?></a></li>
        </ul>
    </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="MInfo" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Member Info</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="EPins" ? 'active show ' : '';?>" id="pills-profile-tab"  href="dashboard.php?action=Members/ViewMember&cp=EPins/MyPins&MCode=<?php echo $_GET['MCode'];?>" role="tab">EPins</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Payout" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Earnings/PayoutTransactions&MCode=<?php echo $_GET['MCode'];?>">Payout</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="AC_Summary" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Earnings/Summary&MCode=<?php echo $_GET['MCode'];?>">A/C Summary</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="GTree" ? 'active show ' : '';?>" id="pills-contact-tab"  href="dashboard.php?action=Members/ViewMember&cp=Members/GenealogyTree&MCode=<?php echo $_GET['MCode'];?>">GTree</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="DMembers" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Members/MyMembers&MCode=<?php echo $_GET['MCode'];?>">Members</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Loglogin" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MemberLogin&MCode=<?php echo $_GET['MCode'];?>" >Login Logs</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="LogSMS" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MobileSMS&MCode=<?php echo $_GET['MCode'];?>">SMS Logs</a>
                    </li>
                    
                    <li class="nav-item submenu">
            <a class="nav-link <?php echo $url_array[$_GET['cp']]=="LogEmail" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/Email&MCode=<?php echo $_GET['MCode'];?>">Email Logs</a>
        </li>
    </ul> 
    </div>
    </div>
    </div>
                                <?php if (isset($_GET['cp'])) {
                                  
                                   
                                    include_once("includes/".UserRole."/Members/Member/".$_GET['cp'].".php");
                                   
                                    ?>
                                <?php } else { ?>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row">              
    
        <div class="col-md-12">
        
            <div class="card">
           
                <div class="card-header">
                    <div class="row"> 
                        <div class="col-md-8">
                            <div class="card-title">Edit Member Information</div>
                            <span style="font-size:13px"><?php echo ($data[0]['IsActive']==1) ? '<span style="color:green">Active</span>' : '<span style="color:red">Blocked</span>';?></span>
                        </div>
                        <div class="col-md-4">
                            <a style="float:right;font-size:13px;color:#1572E8;margin-top:10px" href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Code</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row" style="text-align: right;">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                    <img src="assets/img/<?php echo $package[0]['FileName'];?>" style="height:48px;">
                                    <?php echo $package[0]['PackageName'];?>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2">Member Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="MemberName" value="<?php echo $data[0]['MemberName'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Joined</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d, Y h:s",strtotime($data[0]['CreatedOn']));?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Gender</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Sex'];?></small>-->
                                        <select name="Sex" class="form-control">
                                            <option vlaue="Male" <?php echo $data[0]['Sex']=="Male" ? "selected='selected' " : "";?> >Male</option>
                                            <option vlaue="Female" <?php echo $data[0]['Sex']=="Female" ? "selected='selected' " : "";?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Date of Birth</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DateofBirth'];?></small>-->
                                        <div class="form-group row" style="padding: 0px;">
                                        <?php
                                            $d = date("d",strtotime($data[0]['DateofBirth']));
                                            $m = date("m",strtotime($data[0]['DateofBirth']));
                                            $y = date("Y",strtotime($data[0]['DateofBirth']));
                                        ?>
                                        <div class="col-sm-3">
                                                <select required="" name="date" id="date" class="form-control" style="width: 83px;">
                                            <?php for($i=1;$i<=31;$i++) { ?>
                                            <option value="<?php echo $i;?>" <?php echo ($d==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="col-sm-5" >
                                        <?php $month_array = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC"); ?>
                                        <select name="month" class="form-control"  style="padding-left:5px;text-align:center;width:140px">
                                            <?php for($i=1;$i<=12;$i++) { ?>
                                            <option value="<?php echo $i;?>" <?php echo ($m==$i) ? " selected='selected' " : "";?> ><?php echo $month_array[$i];?></option>
                                            <?php } ?>
                                        </select>
                                        </div>                                                                    
                                        <div class="col-md-4">
                                        <select name="year"  class="form-control" style="padding-left:5px;text-align:center">
                                            <?php for($i=date("Y")-70;$i<=date("Y")-18;$i++) { ?>
                                            <option value="<?php echo $i;?>" <?php echo ($y==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>                       
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 "> 
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+91</span>
                                                </div>
                                                <input type="text" name="MobileNumber" id="MobileNumber" class="form-control"value="<?php echo $data[0]['MobileNumber'];?>">
                                            </div>
                                        <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberEmail'];?></small>-->
                                        <input type="text" name="MemberEmail" value="<?php echo $data[0]['MemberEmail'];?>" class="form-control">
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line1</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine1'];?></small> -->
                                        <input type="text" name="AddressLine1" value="<?php echo $data[0]['AddressLine1'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line2</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine2'];?></small>-->
                                        <input type="text" name="AddressLine2" value="<?php echo $data[0]['AddressLine2'];?>" class="form-control">
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Country</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <select name="CountryName" id="CountryName" class="form-control">
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">State Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <?php $statenames = $mysql->select("select * from _tbl_master_statenames order by StateName");?>
                                        <select name="StateName" id="StateName" class="form-control" onchange="GetDistrictname($(this).val(),'0');">
                                            <option value="0">Select State Name</option>
                                            <?php foreach($statenames as $s) { ?>
                                            <option value="<?php echo $s['StateID'];?>" <?php echo ($data[0]['StateNameID']==$s['StateID']) ? " selected='selected' " : "";?>> <?php echo $s['StateName'];?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block" style="color:red"><?php echo $errorStateName;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">District</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <div id="div_district">
                                            <select name="DistrictName" id="DistrictName" class="form-control">   
                                                <option value="0">Select District Name</option>               
                                            </select>
                                        </div>
                                        <div class="help-block" style="color:red"><?php echo $errorDistrictName;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pincode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PinCode'];?></small>-->
                                        <input type="text" name="PinCode" value="<?php echo $data[0]['PinCode'];?>" class="form-control">
                                        <div class="help-block" style="color:red"><?php echo $errorPinCode;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>-->
                                        <input type="text" name="PanCard" value="<?php echo $data[0]['PanCard'];?>" class="form-control">
                                        <div class="help-block" style="color:red"><?php echo $errorPanCard;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Aadhaar Card</label>
                                     <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AdhaarCard'];?></small>-->
                                        <input type="text" name="AdhaarCard" value="<?php echo $data[0]['AdhaarCard'];?>" class="form-control">
                                        <div class="help-block" style="color:red"><?php echo $errorAdhaarCard;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                         <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>-->
                                        <input type="text" name="MemberPassword" value="<?php echo $data[0]['MemberPassword'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Transaction Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>-->
                                        <input type="text" name="MemberTxnPassword" value="<?php echo $data[0]['MemberTxnPassword'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> 
                </div>
                <div class="card-footer">
                     <div class="row"> 
                        <div class="col-md-9">
                             <input type="submit" value="Save" name="updateBtn" class="btn btn-primary waves-effect waves-light">
                             <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                        </div>
                        <div class="col-md-3" style="text-align: right;">
                            <?php if($data[0]['IsActive']=="0"){ ?>
                                <button type="button" onclick="CallUnblockConfirmation()" class="btn btn-danger waves-effect waves-light">Un Block</button>
                                <button type="submit" style="display: none;" name="UnblockBtn" id="UnblockBtn" class="btn btn-danger waves-effect waves-light"></button>
                             <?php }else { ?>
                                <button type="button" onclick="CallBlockConfirmation()" class="btn btn-danger waves-effect waves-light">Block</button>
                                <button type="submit" style="display: none;" name="BlockBtn" id="BlockBtn" class="btn btn-danger waves-effect waves-light"></button>
                             <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Additional Information</div>
                </div>
                <div class="card-body">
                    
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pan Card</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if (strlen(trim($data[0]['PanCardFile'])>5)) { ?>
                                            <img src="assets/uploads/<?php echo $data[0]['PanCardFile'];?>" style="height:200px;">
                                            <br>
                                        <button type="button" onclick="CallRemovePancardConfirmation()"  class="btn btn-primary btn-sm waves-effect waves-light" style="padding: 0px 10px 0px 10px;">Remove</button>
                                        <button type="submit" style="display: none;" name="RemovePancardFile" id="RemovePancardFile" class="btn btn-primary btn-sm waves-effect waves-light" style="padding: 0px 10px 0px 10px;"></button><br>
                                            
                                        <?php } else { ?>
                                            <input type="file" name="Pancard">
                                            <input type="submit" value="Update"  class="btn btn-primary waves-effect waves-light" name="PancardBtn">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Profile Photo</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <?php  if (strlen($data[0]['Thumb'])>5) { ?>
                                            <img src="assets/uploads/<?php echo $data[0]['Thumb'];?>" style="height:200px;">
                                            <br>
                                        <button type="button" onclick="CallRemoveProfileThumbConfirmation()"  class="btn btn-primary btn-sm waves-effect waves-light" style="padding: 0px 10px 0px 10px;">Remove</button>
                                        <button type="submit" style="display: none;" name="RemoveProfileThumb" id="RemoveProfileThumb" class="btn btn-primary btn-sm waves-effect waves-light" style="padding: 0px 10px 0px 10px;"></button>
                                        <?php } else { ?>
                                            <input type="file" name="profile">
                                            <input type="submit" value="Update"  class="btn btn-primary waves-effect waves-light"name="PhotoBtn">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Bank Information</div>
                </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Account Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" class="form-control" name="AccountName" id="AccountName" value="<?php echo $Bdata[0]['AccountName'];?>">
                                        <div class="help-block" style="color:red" id="ErrAccountName"><?php echo $errorAccountName;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Account Number</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" class="form-control" name="AccountNumber" id="AccountNumber" value="<?php echo $Bdata[0]['AccountNumber'];?>">
                                        <div class="help-block" style="color:red" id="ErrAccountNumber"><?php echo $errorAccountNumber;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">IFSCode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" class="form-control" name="IFSCode" id="IFSCode" onblur="getIFSCode()" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : $Bdata[0]['IFSCode'];?>" maxlength="11">
                                        <div class="help-block" style="color:red" id="ErrIFSCode"><?php echo $errorIFSCode;?></div>
                                        <div class="col-sm-12" id="result_div" style="padding:0px;"></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                </div>
                    <div class="card-footer">
                         <div class="row"> 
                            <div class="col-md-12">
                                 <input type="submit" value="Save" name="BankupdateBtn" class="btn btn-primary waves-effect waves-light">
                                 <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Nominee Information</div>
                </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Nominee Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" class="form-control" name="NomineeName" id="NomineeName" value="<?php echo $Ndata[0]['NomineeName'];?>">
                                        <div class="help-block" style="color:red" id="ErrNomineeName"><?php echo $errorNomineeName;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Gender</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <select name="NomineeGender" class="form-control">
                                            <option vlaue="Male" <?php echo ($Ndata[0]['NomineeGender']=="Male") ? " selected='selected' " : "";?> >Male</option>
                                            <option vlaue="Female" <?php echo ($Ndata[0]['NomineeGender']=="Female") ? " selected='selected' " : "";?> >Female</option>
                                        </select>
                                        <div class="help-block" style="color:red" id="ErrNomineeGender"><?php echo $errorNomineeGender;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Relation</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <select name="NomineeRelation" class="form-control">
                                            <option vlaue="0" <?php echo ($Ndata[0]['NomineeRelation']=="0") ? " selected='selected' " : "";?> >Select Relation</option>
                                            <option vlaue="Father" <?php echo ($Ndata[0]['NomineeRelation']=="Father") ? " selected='selected' " : "";?> >Father</option>
                                            <option vlaue="Mother" <?php echo ($Ndata[0]['NomineeRelation']=="Mother") ? " selected='selected' " : "";?> >Mother</option>
                                            <option vlaue="Sister" <?php echo ($Ndata[0]['NomineeRelation']=="Sister") ? " selected='selected' " : "";?> >Sister</option>
                                            <option vlaue="Brother" <?php echo ($Ndata[0]['NomineeRelation']=="Brother") ? " selected='selected' " : "";?> >Brother</option>
                                            <option vlaue="Husband" <?php echo ($Ndata[0]['NomineeRelation']=="Husband") ? " selected='selected' " : "";?> >Husband</option>
                                            <option vlaue="Wife" <?php echo ($Ndata[0]['NomineeRelation']=="Wife") ? " selected='selected' " : "";?> >Wife</option>
                                        </select>
                                        <div class="help-block" style="color:red" id="ErrNomineeRelation"><?php echo $errorNomineeRelation;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                </div>
                   
                    <div class="card-footer">
                     <div class="row"> 
                        <div class="col-md-12">
                             <input type="submit" value="Save" name="NomineeupdateBtn" class="btn btn-primary waves-effect waves-light">
                             <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div> 
       <div class="row">
        <div class="col-md-12" style="text-align: right;">
            <?php  if($data[0]['Status']=="1") { ?>
                <label>Submitted<br><?php echo  date("M d, Y",strtotime($data[0]['StatusOn']));?></label>
            <?php }  ?>
        </div>
    </div>
     </form>
     <?php } ?>
</div> 

<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
        <div class="modal-content" >
        <div id="xconfrimation_text"></div>
        </div>
      </div>
    </div>
<script>
function is_valid_bank_account_number(acnumber) {
        if (acnumber.length<6) {
            return false;
        }
        var reg = /^[\w.]+$/i
        if (acnumber.match(reg)) {
            return true
        }
        return false;
    }

    function is_valid_bank_account_name(acname) {
        if (acname.length<3) {
            return false;
        }
        var reg = /^[a-z0-9\-\s]+$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
function isIfscCodeValid(ifscode) {
        var reg = /^[A-Za-z]{4}[0-9]{6,7}$/
        var reg = /^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/
        if (ifscode.match(reg)) {
            return true
        }
        return false;
    }
$(document).ready(function(){
       
        $("#IFSCode").blur(function() {
            $('#ErrIFSCode').html("");
            var ifsc = $('#IFSCode').val().trim();
            if (ifsc.length==0) {
                $('#ErrIFSCode').html("Please Enter IFSCode");
            } else {
                if(!(isIfscCodeValid($('#IFSCode').val()))) {
                    $('#ErrIFSCode').html("IFSCode is invalid");
                }
            }
        });
        
        $("#AccountName").blur(function() {
            $('#ErrAccountName').html("");   
            var ac_name = $('#AccountName').val().trim();
            if (ac_name.length==0) {
                $('#ErrAccountName').html("Please enter Account Name"); 
            } else {
                if (!(is_valid_bank_account_name(ac_name))) {
                    $('#ErrAccountName').html("Account name is invalid");
                }
            }
        });
        
        $("#AccountNumber").blur(function() {
            $('#ErrAccountNumber').html("");
            var ac_number = $('#AccountNumber').val().trim();
            if (ac_number.length==0) {
                $('#ErrAccountNumber').html("Please enter Account Number");
            } else {
                if (!(is_valid_bank_account_number(ac_number))) {
                    $('#ErrAccountNumber').html("Account number is invalid");
                }
            }
        });
    });
    
function getIFSCode() {
    
    $('#ErrIFSCode').html("");
    $('#result_div').html("");
    var ifsc_code = $('#IFSCode').val().trim();
    if (ifsc_code.length==0) {
        $('#ErrIFSCode').html("Please enter IFS Code");
        return false; 
    }
    
    if (isIfscCodeValid($('#IFSCode').val())) {
        $.post( "webservice.php?action=getIFSCode&IFSCode="+$('#IFSCode').val().toUpperCase(),"",function( rdata ) {
            var obj = JSON.parse(rdata);
            var objData = obj.data;
            if (obj.status=="success") {
                var resHtml= '<div style="background:#fcfcfc;border-radius:5px;padding:10px 15px;font-size:12px;margin-top:10px;"><div class="row"><div class="col-12"><b>'+objData.BANK+'</b></div><div class="col-12"><b>Branch:</b> '+objData.BRANCH+'</div><div class="col-12"><b>City: </b>'+objData.CITY+'</div><div class="col-12"><b>District: </b>'+objData.DISTRICT+'</div><div class="col-12"><b>State: </b>'+objData.STATE+'</div></div></div>';   
                $('#result_div').html(resHtml);
                valid_ifscode = 1;
            } else {                                                  
                $('#ErrIFSCode').html("IFSCode is invalid");
                //$('#result_div').html(obj.message);
                valid_ifscode=0;
            }
        });
    } else {
        $('#ErrIFSCode').html("IFSCode is invalid");
        return false;
    }
}

 function CallBlockConfirmation(){
            var txt ='<div class="modal-header">'
                        +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" class="white-text">&times;</span>'
                        +'</button>'
                    +'</div>'
                    +'<div class="modal-body">'                                                                     
                        +'<div class="form-group row">'                                                          
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'Are you sure want to block?'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="modal-footer flex-right">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="BlockMember()" >Yes, Confirm</button>'
                    +'</div>';
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
   
}
function BlockMember() {
    $("#BlockBtn" ).trigger( "click" );
}
function CallUnblockConfirmation(){
            var txt ='<div class="modal-header">'
                        +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" class="white-text">&times;</span>'
                        +'</button>'
                    +'</div>'
                    +'<div class="modal-body">'                                                                     
                        +'<div class="form-group row">'                                                          
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'Are you sure want to un block?'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="modal-footer flex-right">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UnBlockMember()" >Yes, Confirm</button>'
                    +'</div>';
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
   
}
function UnBlockMember() {
    $("#UnblockBtn" ).trigger( "click" );
}
function CallRemovePancardConfirmation(){
            var txt ='<div class="modal-header">'
                        +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" class="white-text">&times;</span>'
                        +'</button>'
                    +'</div>'
                    +'<div class="modal-body">'                                                                     
                        +'<div class="form-group row">'                                                          
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'Are you sure want to remove pancard?'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="modal-footer flex-right">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="RemovePancardFile()" >Yes, Confirm</button>'
                    +'</div>';
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
   
}
function RemovePancardFile() {
    $("#RemovePancardFile" ).trigger( "click" );
}
function CallRemoveProfileThumbConfirmation(){
            var txt ='<div class="modal-header">'
                        +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" class="white-text">&times;</span>'
                        +'</button>'
                    +'</div>'
                    +'<div class="modal-body">'                                                                     
                        +'<div class="form-group row">'                                                          
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'Are you sure want to remove profile photo?'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="modal-footer flex-right">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="RemoveProfileThumb()" >Yes, Confirm</button>'
                    +'</div>';
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
   
}
function RemoveProfileThumb() {
    $("#RemoveProfileThumb" ).trigger( "click" );
}
$(document).ready(function(){
            GetDistrictname('<?php echo $data[0]['StateNameID'] ;?>','<?php echo $data[0]['DistrictNameID'];?>');
         });
</script>