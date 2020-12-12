<?php

if (isset($_POST['PancardBtn'])) {
        $target_path = "assets/uploads/";
        $filename = strtolower(time()."_".$_FILES['Pancard']['name']);
        
        if(move_uploaded_file($_FILES['Pancard']['tmp_name'], $target_path.$filename)) {  
            $mysql->execute("update `_tbl_Members` set `PanCardFile`='".$filename."' where `MemberCode`='".$_GET['MCode']."'");  ?>
            <script>
              $(document).ready(function() {
                swal("Pancard Image Updated Successfully", {
                    icon : "success" 
                });
            });
            </script>
            <?php  }  else{ ?>
             <script>
                  $(document).ready(function() {
                        swal("Pancard Image upload failed", {
                            icon : "error" 
                        });
                     });
                </script>
           <?php  }                                                                                                           
    }
 if (isset($_POST['BankFileBtn'])) {
        $target_path = "assets/uploads/";
        $filename = strtolower(time()."_".$_FILES['BankFile']['name']);
        
        if(move_uploaded_file($_FILES['BankFile']['tmp_name'], $target_path.$filename)) {  
            $data = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_GET['MCode']."'");
            if(sizeof($data)!=0){
                   $mysql->execute("update `_tbl_bank_info` set BankFile ='".$filename."' where MemberCode='".$_GET['MCode']."'"); 
            }else {
                $mysql->insert("_tbl_bank_info",array("BankFile"      => $filename,
                                                      "MemberCode"    =>  $_GET['MCode']));
            }
            ?>
              <script>
                 $(document).ready(function() {
                swal("Bank File Updated Successfully", {
                    icon : "success" 
                });
            });
                </script>
            <?php  } else{   ?>
             <script>
                  $(document).ready(function() {
                        swal("Bank File Image upload failed", {
                            icon : "error" 
                        });
                     });
                </script>
           <?php }  
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
         
        if ($error==0) {
            $dob = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
            $mysql->execute("update _tbl_Members set MemberEmail    = '".$_POST['MemberEmail']."',
                                                     MobileNumber   = '".$_POST['MobileNumber']."',
                                                     MemberName     = '".$_POST['MemberName']."',
                                                     Sex            = '".$_POST['Sex']."',
                                                     CityName       = '".$_POST['City']."',
                                                     AddressLine1   = '".$_POST['AddressLine1']."',
                                                     AddressLine2   = '".$_POST['AddressLine2']."',
                                                     DateofBirth    = '".$_POST['DateofBirth']."',
                                                     MemberTxnPassword    = '".$_POST['TransactionPassword']."',
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
if(isset($_POST['SubmitKycDetailsBtn'])) {
        $error=0;
       if ($_POST['PanCardNumber']=="") {
            $error++;
            $errormsg = "Please Enter Pancard Number";  
        }
        $pancard_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')");    
        if ($pancard_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['PanCardNumber']))>0)  {
            if (!(strlen(trim($_POST['PanCardNumber']))>5)) {
                $error++;
                $errorMsg = "Please enter valid Pancard Number.";
                $errorPanCardNumber ="Please enter valid Pancard Number.";
            }
            
            $pancard_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicatePanCard')");    
            if ($pancard_allowduplicate[0]['ParamValue']==0) {
                $dupPancard = $mysql->select("select * from _tbl_Members where MemberID<>'".$_GET['MCode']."' and PanCard='".trim($_POST['PanCardNumber'])."'");
                if (sizeof($dupPancard)>0) {
                    $error++;
                    $errorMsg = "Please enter valid Pancard Number.";
                    $errorPanCardNumber ="Pancard already used.";
                }
            } 
        }
        if ($error==0) {
           $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");   
           if(sizeof($data)!=0){
                $mysql->execute("update `_tbl_Members` set `PanCard`='".$_POST['PanCardNumber']."' where `MemberCode`='".$_GET['MCode']."'"); 
           }else{
                $mysql->insert("_tbl_bank_info",array("PanCard" => $_POST['PanCardNumber'],
                                                      "MemberCode"        =>  $_GET['MCode']));     
           }  ?>
           <script>
                   $(document).ready(function() {
                        swal("Kyc Information Updated Successfully", {
                            icon : "success" 
                        });
                    });
           </script>
           <?php   }  else {   ?>
           <script>
                  $(document).ready(function() {
                        swal("<?php echo $errormsg;?>", {
                            icon : "error" 
                        });
                     });
           </script>
           <?php   }   
    }
    
if(isset($_POST['SubmitBankDetailsBtn'])) {
        $error=0;
       if ($_POST['AccountHolderName']=="") {
            $error++;
            $errormsg = "Please Enter Account Holder Name";  
        }
        if ($_POST['AccountNumber']=="") {
            $error++;
            $errormsg = "Please Enter Account Number";  
        } 
        if ($_POST['IFSCode']=="") {
            $error++;
            $errormsg = "Please Enter IFSCode";  
        }
        if ($error==0) {
           $data = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_GET['MCode']."'");   
           if(sizeof($data)!=0){
                $mysql->execute("update `_tbl_bank_info` set `AccountHolderName`='".$_POST['AccountHolderName']."',
                                                             `AccountNumber`='".$_POST['AccountNumber']."',
                                                             `IFSCode`='".$_POST['IFSCode']."'
                                                             where `MemberCode`='".$_GET['MCode']."'");
                
           }else{
                $mysql->insert("_tbl_bank_info",array("AccountHolderName" => $_POST['AccountHolderName'],
                                                      "AccountNumber"     => $_POST['AccountNumber'],
                                                      "IFSCode"           => $_POST['IFSCode'],
                                                      "MemberCode"        =>  $_GET['MCode']));  
           }  ?>
           <script>
                  $(document).ready(function() {
                    swal("Bank Information Updated Successfully", {
                        icon : "success" 
                    });
                  });
           </script>
           <?php   }  else {   ?>
           <script>
                  $(document).ready(function() {
                        swal("<?php echo $errormsg;?>", {
                            icon : "error" 
                        });
                     });
           </script>
           <?php   }   
    }
  //  $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
?>
<?php
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$data[0]['CurrentPackageID']."'"); 
    $bank = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_GET['MCode']."'");
    $url_array['']="MInfo";
    $url_array['Members/MemberInfo']="MemInfo";
    $url_array['Wallet/Transactions']="Wallet";
    $url_array['Wallet/Requests']="Wallet";
    $url_array['Team/DirectReferrals']="Team";
    $url_array['Team/Downlines']="Team";
    $url_array['Team/TreeView']="Team";
    $url_array['Members/GenealogyTree']="GTree";
    $url_array['Packages/Package']="Packages";
    $url_array['Packages/PackageDetails']="Packages";
    $url_array['Reports/BinaryPayout']="Reports";
    $url_array['Reports/BinaryIncome']="Reports";
    $url_array['Reports/ReferralIncome']="Reports";
    $url_array['Reports/RoiIncome']="Reports";
    $url_array['Reports/BankTransfer']="Reports";
    $url_array['Reports/Ledger']="Reports";
    $url_array['Logs/MemberLogin']="Logs";
    $url_array['Logs/MobileSMS']="Logs";
    $url_array['Logs/Email']="Logs";
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
                   <!-- <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="MInfo" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Member Info</a>
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
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Reports" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/BinaryPayout&MCode=<?php echo $_GET['MCode'];?>">Reports</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Loglogin" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MemberLogin&MCode=<?php echo $_GET['MCode'];?>" >Login Logs</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="LogSMS" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MobileSMS&MCode=<?php echo $_GET['MCode'];?>">SMS Logs</a>
                    </li>
                    
                    <li class="nav-item submenu">
            <a class="nav-link <?php echo $url_array[$_GET['cp']]=="LogEmail" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/Email&MCode=<?php echo $_GET['MCode'];?>">Email Logs</a>
        </li>          -->
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="MemInfo" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Members/MemberInfo&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Member Info</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="MInfo" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Profile Info</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Wallet" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Wallet/Transactions&MCode=<?php echo $_GET['MCode'];?>">Wallet</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Team" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Team/DirectReferrals&MCode=<?php echo $_GET['MCode'];?>">Team</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="GTree" ? 'active show ' : '';?>" id="pills-contact-tab"  href="dashboard.php?action=Members/ViewMember&cp=Members/GenealogyTree&MCode=<?php echo $_GET['MCode'];?>">GTree</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Packages" ? 'active show ' : '';?>" id="pills-contact-tab"  href="dashboard.php?action=Members/ViewMember&cp=Packages/Package&MCode=<?php echo $_GET['MCode'];?>">Packages</a>
                    </li
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Reports" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/BinaryPayout&MCode=<?php echo $_GET['MCode'];?>">Reports</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $url_array[$_GET['cp']]=="Logs" ? 'active show ' : '';?>" id="pills-contact-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MemberLogin&MCode=<?php echo $_GET['MCode'];?>" >Logs</a>
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                   <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 "> 
                                        <!--<img src="assets/img/<?php echo $package[0]['FileName'];?>" style="height:48px;">-->
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $package[0]['PackageName'];?></small>
                                   </div>
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></small>
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
                                        <div class="input-group">
                                            <input type="text" class="form-control success" id="DateofBirth" name="DateofBirth" value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : $data[0]['DateofBirth'];?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar-check"></i>
                                                </span>
                                            </div>
                                        </div> 
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DateofBirth'];?></small>
                                        <div class="row">
                                        <?php
                                          /*  $d = date("d",strtotime($data[0]['DateofBirth']));
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
                                            <?php } */?>
                                        </select>
                                        </div>
                                        </div>  -->
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
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input type="text" class="form-control success" id="MobileNumber" name="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>">    
                                        </div>
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">City</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="City" value="<?php echo $data[0]['CityName'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pin/Zip Code</label>
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>-->
                                        <input type="text" name="MemberPassword" value="<?php echo $data[0]['MemberPassword'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Txn Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>-->
                                        <input type="text" name="TransactionPassword" value="<?php echo isset($_POST['TransactionPassword']) ? $_POST['TransactionPassword'] : $data[0]['MemberTxnPassword'];?>" class="form-control">
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
                    </form>                       
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">KYC Information</div>
                </div>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <!--<small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>-->
                                        <input type="text" name="PanCardNumber" value="<?php echo $data[0]['PanCard'];?>" class="form-control">
                                        <div class="help-block" style="color:red"><?php echo $errorPanCardNumber;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                               <div class="row">
                                    <div class="col-md-12">     
                                        <?php if (strlen(trim($data[0]['PanCardFile'])>5)) { ?>
                                        <img src="assets/uploads/<?php echo $data[0]['PanCardFile'];?>" style="height:200px;"><br>
                                        <?php }  ?>
                                        <input type="file" name="Pancard">
                                            <input type="submit" value="Update" name="PancardBtn">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <br>
                        <div class="row"> 
                            <div class="col-md-12 text-right">
                                <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                                 <input type="submit" value="Update Information" name="SubmitKycDetailsBtn" class="btn btn-primary waves-effect waves-light">
                            </div>
                        </div>
                    </form>  
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Account Name</label>
                                    <div class="col-md-7">
                                            <input type="text" class="form-control input-full" name="AccountHolderName" value="<?php echo $bank[0]['AccountHolderName'];?>" Placceholder="Account Holder Name">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Account Number</label>
                                    <div class="col-md-7 ">
                                            <input type="text" class="form-control input-full" name="AccountNumber" value="<?php echo $bank[0]['AccountNumber'];?>" Placceholder="Account Number">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">IFSCode</label>
                                    <div class="col-md-7">
                                            <input type="text" class="form-control input-full" name="IFSCode" value="<?php echo $bank[0]['IFSCode'];?>" Placceholder="IFS Code">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                    </div>
                                </div>
                            </div>     
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="text-left">Scan Copy of Passbook / Cheque Slip</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <?php if (strlen(trim($bank[0]['BankFile'])>5)) { ?>
                                        <img src="assets/uploads/<?php echo $bank[0]['BankFile'];?>" style="height:200px;"><br>
                                        <?php } ?>
                                            <input type="file" name="BankFile">
                                            <input type="submit" value="Update" name="BankFileBtn">      
                                    </div>
                                </div>
                            </div>
                        </div> <br>
                        <div class="row"> 
                                <div class="col-md-12 text-right">
                                    <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $_GET['MCode'];?>"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                                     <input type="submit" value="Update Information" name="SubmitBankDetailsBtn" class="btn btn-primary waves-effect waves-light">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
     <?php } ?>
</div> 