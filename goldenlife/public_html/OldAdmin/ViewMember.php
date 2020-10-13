<?php include_once("header.php"); ?> 
<?php
$myprofile = $mysql->select("Select * from _tbl_member where MemberCode='".$_GET['code']."'");
?>
<?php
                                             
     if (isset($_POST['ApproveKyc'])) {
         $mysql->execute("update _tbl_member set KycVerified='1',KycVerifiedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['code']."'");
         $mysql->execute("update _tbl_member_kycinformation set KycVerified='1',KycVerifiedOn='".date("Y-m-d H:i:s")."' where KYCID='".$_POST['KYCID']."' and  MemberCode='".$_GET['code']."'");
         echo "KYC Approved successfully";
     ?>
          <script>location.href='ViewMember.php?code=<?php echo $myprofile[0]['MemberCode'];?>';</script>
         <?php
         exit;
     }
                                         
                                            
?>
<?php
                                             
     if (isset($_POST['ApproveNominee'])) {
         $mysql->execute("update _tbl_member set NomineeVerified='1',NomineeVerifiedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['code']."'");
         $mysql->execute("update _tbl_member_nominiinformation set NomineeVerified='1',NomineeVerifiedOn='".date("Y-m-d H:i:s")."' where NominationID='".$_POST['NominationID']."' and MemberCode='".$_GET['code']."'");
         echo "Nominee Approved successfully";
     ?>
          <script>location.href='ViewMember.php?code=<?php echo $myprofile[0]['MemberCode'];?>';</script>
         <?php
         exit;
     }
                                         
                                            
?>
<?php
              
     if (isset($_POST['ApproveBankAccount'])) {
         $mysql->execute("update _tbl_member set BankAccountVerified='1',BankAccountVerifiedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['code']."'");
         $mysql->execute("update _tbl_member_banknames set BankAccountVerified='1',BankAccountVerifiedOn='".date("Y-m-d H:i:s")."' where BankID='".$_POST['BankID']."' and MemberCode='".$_GET['code']."'");
         echo "Bank Account Approved successfully";
       
     ?>
         <Script>
             setTimeout(function(){
              location.href=location.href;
              },1000); 
              </script>
         <?php
         exit;
     }
                                         
                                            
?> 

<div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Member Information
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Member Information</h5> 
                                            <div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Member Name</div>
                                                   <div class="col-sm-3">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberName'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Member ID</div>
                                                    <div class="col-sm-3">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberCode'];?>">
                                                    </div>
                                                    <div class="col-sm-3"  style="text-align:right">Earning Balance</div>
                                                    <div class="col-sm-3">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff;text-align:right" class="form-control" value="<?php echo number_format(getOverallBalance($_GET['code']),2);?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                            <div class="col-sm-3">Father's Name<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" disabled="disabled" style="background:#fff;border:1px solid #fff;"  name="MemberFatherName" id="MemberFatherName" placeholder="Father's Name" class="form-control" value="<?php echo $myprofile[0]['MemberFatherName'];?>"></div>
                                        </div> 
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Sur Name</div>
                                                    <div class="col-sm-3">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff;" class="form-control" value="<?php echo $myprofile[0]['MemberSurname'];?>">
                                                    </div>
                                                    <div class="col-sm-3" style="text-align:right">WithDraw Balance</div>
                                                    <div class="col-sm-3">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff;text-align:right" class="form-control" value="<?php echo number_format(getWithdrawableBalance($_GET['code']),2);?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Date of Birth</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['DateOfBirth'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Created On</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['CreatedOn'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Sex</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['Sex'];?>">
                                                    </div>
                                                </div>                            
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Education Details</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['EduDetails'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Mobile Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberMobileNumber'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Email ID</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['EmailID'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Address Line 1</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['AddressLine1'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Address Line 2</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['AddressLine2'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">City Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['City'];?>">
                                                    </div>
                                                </div>
                                                  <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">State Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['State'];?>">
                                                    </div>
                                                </div>
                                                  <div class="form-group row" style="margin-bottom:0px" >
                                                   <div class="col-sm-3">Pin Code</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['PinCode'];?>">
                                                    </div>
                                                </div>
                                                
                                                  <div class="form-group row">
                                            <div class="col-sm-3">Money Order Village Name<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" disabled='disabled'  style="background:#fff;border:1px solid #fff;"  name="MOVillage" id="MOVillage" placeholder="Money Order Village Name" class="form-control" value="<?php echo $myprofile[0]['MOVillage'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Money Order A/C & Mobile Number<span id="star">*</span></div>
                                            <div class="col-sm-9"><input type="text" disabled='disabled'  style="background:#fff;border:1px solid #fff;"  name="MOAccount" id="MOAccount" placeholder="Money Order A/C & Mobile Number" class="form-control" value="<?php echo $myprofile[0]['MOAccount'];?>">
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Kyc Information</h5>
                                        
                                        <?php $kycInformations = $mysql->select("Select * from _tbl_member_kycinformation where MemberCode='".$_GET['code']."'  order by KYCID desc ");?>
                                                    <?php if(sizeof($kycInformations)>0){?>
                                        <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Aadhaar Number</th>
                                                        <th>Pancard Number</th>
                                                        <th>VoterID Number</th>
                                                        <th>Last Updated</th>
                                                        <th></th>                            
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($kycInformations as $kycInformation){?>
                                                    <tr>                 
                                                        <td><?php echo $kycInformation['AadhaarNumber'];?></td>
                                                        <td><?php echo $kycInformation['PanCardNumber'];?></td>
                                                        <td><?php echo $kycInformation['VoterIDNumber']?></td>
                                                        <td><?php echo $kycInformation['AddedOn'];?></td>
                                                        <td style="text-align: center;">
                                                        <form method="post" action="">
                                                            <input type="hidden" value="<?php echo $kycInformation['KYCID'];?>" name="KYCID">
                                                           <?php if($kycInformation['KycVerified']==0){?>
                                                                 <button type="submit" name="ApproveKyc" class="mb-2 mr-2 btn btn-gradient-primary">Approve</button>
                                                           <?php }?>
                                                           <?php if($kycInformation['KycVerified']==1){?>
                                                                 <?php echo "Approved";?> &nbsp;<?php echo $kycInformation['KycVerifiedOn']?>
                                                            <?php }?>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } else {?>
                                            <div class="form-group row" style="margin-bottom:0px"  style="text-align:center;">
                                                   <div class="col-sm-12" style="text-align:center">Kyc information not Updated</div>
                                                </div>
                                         <?php } ?>
                                         
                                          <div class="form-group row" style="margin-bottom:0px"  style="text-align:right;">
                                            <div class="col-sm-12" style="text-align:right"><a href="AddKYCInformation.php?code=<?php echo $myprofile[0]['MemberCode'];?>">Add</a></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                                               
                    </div>
                    <div class="tab-content">                            
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Nominee Information</h5>
                                       
                                         <?php $nominiInformations = $mysql->select("Select * from _tbl_member_nominiinformation where MemberCode='".$_GET['code']."'  order by NominationID desc"); ?> 
                                                    <?php if(sizeof($nominiInformations)>0){?>
                                        <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Nominee Name</th>
                                                        <th>Date of Birth</th>
                                                        <th>Relation</th>
                                                        <th>Last Updated</th>
                                                        <th></th>                            
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($nominiInformations as $nominiInformation){?>
                                                    <tr>                 
                                                        <td><span class="<?php echo ($nominiInformation['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $nominiInformation['NominiName'];?></td>
                                                        <td><?php echo $nominiInformation['NominiDateOfBirth'];?></td>
                                                        <td><?php echo $nominiInformation['NominiRelation']?></td>
                                                        <td><?php echo $nominiInformation['AddedOn'];?></td>
                                                        <td style="text-align: center;">
                                                         <form method="post" action="">
                                                            <input type="hidden" name="NominationID" value="<?php echo $nominiInformation['NominationID'];?>">
                                                           <?php if($nominiInformation['NomineeVerified']==0){?>
                                                                  <button type="submit" name="ApproveNominee" class="mb-2 mr-2 btn btn-gradient-primary">Approve</button>
                                                           <?php }?>
                                                           <?php if($nominiInformation['NomineeVerified']==1){?>
                                                                   <?php echo "Approved";?> &nbsp;<?php echo $nominiInformation['NomineeVerifiedOn']?>
                                                            <?php }?>
                                                             </form>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                         <?php } else {?>
                                            <div class="form-group row" style="margin-bottom:0px"  style="text-align:center;">
                                                   <div class="col-sm-12" style="text-align:center">Nominee information not Updated</div>
                                                </div>
                                         <?php } ?>
                                        
                                          <div class="form-group row" style="margin-bottom:0px"  style="text-align:right;">
                                            <div class="col-sm-12" style="text-align:right"><a href="AddNomineeInformation.php?code=<?php echo $myprofile[0]['MemberCode'];?>">Add</a></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Bank Account Information</h5>
                                          
                                         <?php $bankInformations = $mysql->select("Select * from _tbl_member_banknames where MemberCode='".$_GET['code']."'  order by BankID desc"); ?> 
                                                   <?php if(sizeof($bankInformations)>0){?>
                                        <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>A/c holder Name</th>
                                                        <th>Account Number</th>
                                                        <th>A/c Type</th>
                                                        <th>Bank Name</th>
                                                        <th>IFS Code</th>                            
                                                        <th>Last Updated</th>                            
                                                        <th></th>                            
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($bankInformations as $bankInformation){?>
                                                    <tr>                 
                                                        <td><span class="<?php echo ($bankInformation['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $bankInformation['AccountHolderName'];?></td>
                                                        <td><?php echo $bankInformation['AccountNumber'];?></td>
                                                        <td><?php echo $bankInformation['AccountType']?></td>
                                                        <td><?php echo $bankInformation['BankName'];?></td>
                                                        <td><?php echo $bankInformation['IFSCode'];?></td>
                                                        <td><?php echo $bankInformation['Added'];?></td>
                                                        <td style="text-align: center;">
                                                            <form action=""  method="post">
                                                            <input type="hidden" name="BankID" value="<?php echo $bankInformation['BankID'];?>">
                                                           <?php if($bankInformation['BankAccountVerified']==0){?>
                                                                  <button type="submit" name="ApproveBankAccount" class="mb-2 mr-2 btn btn-gradient-primary">Approve</button>
                                                           <?php }?>
                                                           <?php if($bankInformation['BankAccountVerified']==1){?>
                                                                   <?php echo "Approved";?> &nbsp;<?php echo $bankInformation['BankAccountVerifiedOn']?>
                                                            <?php }?>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                         <?php } else {?>
                                            <div class="form-group row" style="margin-bottom:0px"  style="text-align:center;">
                                                   <div class="col-sm-12" style="text-align:center">Bank information not Updated</div>
                                                </div>
                                         <?php } ?>
                                   
                                           <div class="form-group row" style="margin-bottom:0px"  style="text-align:right;">
                                            <div class="col-sm-12" style="text-align:right"><a href="AddBankInformation.php?code=<?php echo $myprofile[0]['MemberCode'];?>">Add</a></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                                                   
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>              