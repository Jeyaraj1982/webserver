<?php
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
    $bank = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_GET['MCode']."'");
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$data[0]['CurrentPackageID']."'"); 
    
    $url_array['']="MInfo";
    $url_array['Wallet/Transactions']="Wallet";
    $url_array['Wallet/Requests']="Wallet";
    $url_array['Team/DirectReferrals']="Team";
    $url_array['Team/Downlines']="Team";
    $url_array['Team/TreeView']="Team";
    $url_array['Members/GenealogyTree']="GTree";
    $url_array['Members/MemberInfo']="MemInfo";
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
                    </li>
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
                    <div class="card-title">Member Information
                    
                    <a style="float:right;font-size:13px;color:#1572E8;margin-top:10px" href="dashboard.php?action=Members/EditMember&MCode=<?php echo $_GET['MCode'];?>">Edit Profile</a>
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<!--<img src="assets/img/<?php echo $package[0]['FileName'];?>" style="height:48px;">-->
                                    <?php echo $package[0]['PackageName'];?></small>
                                    </div>
                                </div>
                                <!--<div class="form-group form-show-validation row" style="text-align: right;">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                    <img src="assets/img/<?php //echo $package[0]['FileName'];?>" style="height:48px;">
                                    <?php //echo $package[0]['PackageName'];?>
                                </div> -->
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Sponsor ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['SponsorCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Upline ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['UplineCode'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Placement</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Placement'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>  -->
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberName'];?></small>
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Sex'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Date of Birth</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d, Y",strtotime($data[0]['DateofBirth']));?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;+91-<?php echo $data[0]['MobileNumber'];?></small>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberEmail'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line1</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine1'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line2</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine2'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <!--<div class="row"> 
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
                        </div>-->
                       <!-- <div class="row"> 
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PinCode'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div> -->
                        <!--<div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Aadhaar Card</label>
                                    <div class="col-lg-4 col-md-8 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AdhaarCard'];?></small>
                                    </div>
                                </div>  
                            </div> 
                        </div> --> 
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">City Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CityName'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pin/Zip Code</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PinCode'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Txn Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberTxnPassword'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                      <!--   <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>
                                    </div>
                                </div>
                            </div>    -->
                           
                       <div class="row"> 
                            <div class="col-md-12 text-left">
                                <?php if($data[0]['ProfileInfoSubmit']==1) {?>
                                    <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;"> Submitted &nbsp;&nbsp;<?php echo $data[0]['PISubmittedOn'];?></span><br>
                                <?php }  if($data[0]['ProfileInfoSubmit']==2) {?>
                                    <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;"> Approved &nbsp;&nbsp;<?php echo $data[0]['PIApprovedOn'];?></span><br>
                                <?php } ?>
                                <?php  if($data[0]['ProfileInfoSubmit']==3) {?>
                                    <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;"> Rejected &nbsp;&nbsp;<?php echo $data[0]['PIRejectedOn'];?></span><br>
                                <?php } ?>
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
                    <div class="card-title">KYC Information</div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard Number</label>
                                <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                    <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>
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
                                        <?php } else { ?>
                                         not attached
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                             <!--<div class="col-md-6">
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
                                           not attached 
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>-->
                        </div>  <br>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <?php if($data[0]['KycSubmit']==1) {?>
                                    <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;"> Submitted &nbsp;&nbsp;<?php echo $data[0]['KycSubmittedOn'];?></span><br>
                                <?php }  if($data[0]['KycSubmit']==2) {?>
                                    <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;"> Approved &nbsp;&nbsp;<?php echo $data[0]['KycApprovedOn'];?></span>
                                <?php } ?>
                                <?php   if($data[0]['KycSubmit']==3) {?>
                                    <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;"> Rejected &nbsp;&nbsp;<?php echo $data[0]['KycRejectedOn'];?></span>
                                <?php } ?>
                               
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
     </div> <div class="row">
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Account Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['AccountHolderName'];?></small>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Account Number</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                       <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['AccountNumber'];?></small>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">IFSCode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['IFSCode'];?></small>
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
                                        <?php }else { echo "not attached";} ?>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <?php if($bank[0]['IsSubmit']==1) {?>
                                    <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;"> Submitted &nbsp;&nbsp;<?php echo $bank[0]['SubmittedOn'];?></span><br>
                                <?php }  if($bank[0]['IsSubmit']==2) {?>
                                    <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;"> Approved &nbsp;&nbsp;<?php echo $bank[0]['ApprovedOn'];?></span>
                                <?php } if($bank[0]['IsSubmit']==3) {?>
                                    <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;"> Rejected &nbsp;&nbsp;<?php echo $bank[0]['RejectedOn'];?></span>
                                <?php } ?>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
     </div>
     <?php } ?>
     
</div> 