<?php
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
                $dupMobile = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
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
                $dupEmail = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and MemberEmail='".trim($_POST['MemberEmail'])."'");
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
                $dupPancard = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and PanCard='".trim($_POST['PanCard'])."'");
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
  //  $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
?>
<?php
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
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
    <div class="row">              
    
        <div class="col-md-12">
        
            <div class="card">
           
                <div class="card-header">
                    <div class="card-title">Edit Member Information
                    
                    <a style="float:right;font-size:13px;color:#1572E8;margin-top:10px" href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>">View Profile</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CreatedOn'];?></small>
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
                                        <div class="row">
                                        <?php
                                            $d = date("d",strtotime($data[0]['DateofBirth']));
                                            $m = date("m",strtotime($data[0]['DateofBirth']));
                                            $y = date("Y",strtotime($data[0]['DateofBirth']));
                                        ?>
                                         <div class="col-md-4" class="form-control">
                                        <select name="date"  class="form-control">
                                            <?php for($i=1;$i<=31;$i++) { ?>
                                            <option value="<?php echo $i;?>" <?php echo ($d==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4">
                                        <?php $month_array = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC"); ?>
                                        <select name="month" class="form-control"  style="padding-left:5px;text-align:center">
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
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MobileNumber'];?></small>-->
                                        <input type="text" name="MobileNumber" value="<?php echo $data[0]['MobileNumber'];?>" class="form-control">
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CountryName'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">State Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['StateName'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">District</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DistrictName'];?></small>
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
                           
                        </div>
                          <div class="row"> 
                            <div class="col-md-12 text-right">
                                <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                                 <input type="submit" value="Update Information" name="updateBtn" class="btn btn-primary waves-effect waves-light">
                                 
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
                                            <img src="assets/uploads/<?php echo $data[0]['PanCardFile'];?>" style="height:200px;"><br>
                                            Verified : <?php echo $data[0]['KYCVerified']==1 ? " verified on ".$data[0]['KYCVerifiedOn'] : " verification pending"; ?>
                                        <?php } else { ?>
                                            <input type="file" name="Pancard">
                                            <input type="submit" value="Update"  class="btn btn-primary waves-effect waves-light" ame="PancardBtn">
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
                                            <img src="assets/uploads/<?php echo $data[0]['Thumb'];?>" style="height:200px;"><br>
                                        <?php } else { ?>
                                            <input type="file" name="profile">
                                            <input type="submit" value="Update"  class="btn btn-primary waves-effect waves-light"name="PhotoBtn">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
     <?php } ?>
</div> 