<?php 
    $form= $mysql->select("Select * from _tbl_form_16 where id='".$_GET['FCode']."'");
    $member= $mysql->select("Select * from _tbl_Members where MemberCode='".$form[0]['FormByCode']."'");
    
    if (isset($_POST['BtnSaveProfile'])) {
   
    $id=$mysql->insert("_tbl_formlogs",array("ActionPerformed" => date("Y-m-d H:i:s"),
                                             "FormID"          => $_GET['FCode'],
                                             "MemberID"        => $member[0]['MemberID'],
                                             "ActionTitle"     => $_POST['RemarksSubject'],
                                             "UserRemarks"     => $_POST['UserRemarksss'],
                                             "AdminRemarks"    => $_POST['AdminRemarksss'],     
                                             "UpdatedStaffID"  => $_SESSION['User']['AdminID'],    
                                             "UpdatedStaffName"    => $_SESSION['User']['AdminName']));     
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } 
    }     
    
    if (isset($_POST['Observation'])) {
    $id=$mysql->execute("update `_tbl_form_16` set `InProccess`  ='1',
                                                   `InProccessOn`='".date("Y-m-d H:i:s")."' 
                                                    where `id`   ='".$form[0]['id']."'");
    $id=$mysql->insert("_tbl_formlogs",array("ActionPerformed" => date("Y-m-d H:i:s"),
                                             "FormID"          => $_GET['FCode'],
                                             "MemberID"        => $member[0]['MemberID'],
                                             "UserRemarks"     => $_POST['UserRemarks'],
                                             "AdminRemarks"    => $_POST['AdminRemarks'],     
                                             "ActionTitle"     => "Form Accepted",     
                                             "UpdatedStaffID"  => $_SESSION['User']['AdminID'],    
                                             "UpdatedStaffName"    => $_SESSION['User']['AdminName']));    
    MobileSMS::sendSMS($member[0]['MobileNumber'],"Your form has been accepted. Thanks Form16.online",$id);
                           $message = "Your form has been accepted";
                           
                            $mparam['MailTo']=$member[0]['EmailID'];                                                   
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Form16 Accept";
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } 
    }                                                                                                        
 
    if (isset($_POST['Approve'])) {
    $id=$mysql->execute("update `_tbl_form_16` set  `IsApproved`          ='1', 
                                                    `InProccess`          ='2',
                                                   `VerifiedOn`          ='".date("Y-m-d H:i:s")."'
                                                   where `id`           ='".$form[0]['id']."'");
    
    $staff=$mysql->select("select * from _tbl_Admin where IsAdmin='0' and AdminCode='".$_POST['AssignToStaff']."'");
    
    $mysql->insert("_tbl_AssignedForms",array("StaffID"     => $staff[0]['AdminID'],
                                              "StaffCode"   => $staff[0]['AdminCode'],
                                              "StaffName"   => $staff[0]['AdminName'],
                                              "FormID"      => $form[0]['id'],
                                              "AssignedOn"  => date("Y-m-d H:i:s")));    
    $id=$mysql->insert("_tbl_formlogs",array("ActionPerformed" => date("Y-m-d H:i:s"),
                                             "FormID"          => $_GET['FCode'],
                                             "MemberID"        => $member[0]['MemberID'],
                                             "UserRemarks"     => $_POST['UserRemarks'],                                      
                                             "AdminRemarks"    => $_POST['AdminRemarks'],     
                                             "ActionTitle"     => "Assigned job to ".$_SESSION['User']['AdminName'],     
                                             "UpdatedStaffID"  => $_SESSION['User']['AdminID'],    
                                             "UpdatedStaffName"    => $_SESSION['User']['AdminName']));            

    $id=$mysql->insert("_tbl_formlogs",array("ActionPerformed" => date("Y-m-d H:i:s"),
                                             "FormID"          => $_GET['FCode'],
                                             "MemberID"        => $member[0]['MemberID'],
                                             "UserRemarks"     => $_POST['UserRemarks'],
                                             "AdminRemarks"    => $_POST['AdminRemarks'],     
                                             "ActionTitle"     => "Form is Inproccess",     
                                             "UpdatedStaffID"  => $_SESSION['User']['AdminID'],    
                                             "UpdatedStaffName"    => $_SESSION['User']['AdminName']));            

                                                                            
    MobileSMS::sendSMS($member[0]['MobileNumber'],"Your form has been inprocessing. Thanks Form16.online",$id);
                           $message = "Your form has been inpocessed";
                           
                            $mparam['MailTo']=$member[0]['EmailID'];
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Form16 Inprocess";
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } }
 
    if (isset($_POST['Reject'])) {
    $id=$mysql->execute("update `_tbl_form_16` set `IsRejected`          ='1', 
                                                   `InProccess`          ='2',
                                                   `VerifiedOn`          ='".date("Y-m-d H:i:s")."'
                                                    where `id`           ='".$form[0]['id']."'");
    
    $id=$mysql->insert("_tbl_formlogs",array("ActionPerformed" => date("Y-m-d H:i:s"),
                                             "FormID"          => $_GET['FCode'],
                                             "MemberID"        => $member[0]['MemberID'],
                                             "UserRemarks"     => $_POST['UserRemarks'],
                                             "AdminRemarks"    => $_POST['AdminRemarks'],     
                                             "ActionTitle"     => "Form Rejected",     
                                             "UpdatedStaffID"  => $_SESSION['User']['AdminID'],    
                                             "UpdatedStaffName"    => $_SESSION['User']['AdminName']));  
    //refund money to member
    
    // posted by agent or member
      if ($form[0]['AgentID']>0) {
          //Refund Agent
           $mysql->insert("_wallet_member",array("AgentID"       => $form[0]['AgentID'],
                                                 "TxnDate"        => date("Y-m-d H:i:s"),
                                                 "Particulars"    => "Refund/".$_GET['FCode'],
                                                 "ActualAmount"   => 99,
                                                 "CreditAmount"   => "0",
                                                 "DebitAmount"    => 99,
                                                 "Balance"        => AgentWalletBalance($form[0]['AgentID'])-99,
                                                 "Ledger"         => "5"));
      }
      
      if ($form[0]['AgentID']==0 && $form[0]['StaffID']==0) {
          //Refund Member
          
           $mysql->insert("_wallet_member",array("MemberID"       => $member[0]['MemberID'],
                                                 "TxnDate"        => date("Y-m-d H:i:s"),
                                                 "Particulars"    => "Refund/".$_GET['FCode'],
                                                 "ActualAmount"   => 99,
                                                 "CreditAmount"   => "0",
                                                 "DebitAmount"    => 99,
                                                 "Balance"        => MemberWalletBalance($member[0]['MemberID'])-99,
                                                 "Ledger"         => "4"));
      }
    
    MobileSMS::sendSMS($member[0]['MobileNumber'],"Your form has been rejected. Thanks Form16.online",$id);
                           $message = "Your form has been rejected";
                           
                            $mparam['MailTo']=$member[0]['EmailID'];
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Form16 Reject";
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);
    if(sizeof($id)>0){   ?>                                                                                                 
        <script>location.href=location.href;</script>
    <?php } } 
    if (isset($_POST['Complete'])) {  
        
             //if (!is_dir('uploads/Form16/'.$form[0]['FormByCode'].'/Acknowledgement_')) {
                     //   mkdir('uploads/Form16/'.$form[0]['FormByCode'].'/Acknowledgement_', 0777, true);
                   // }
                    
                    $_POST['File']= "";
                    $err=0;
                    if (isset($_FILES["File"]["name"]) && strlen(trim($_FILES["File"]["name"]))>0 ) {
                        $Acknowledgement = strtolower("Acknowledgement_".time().$_FILES["File"]["name"]);
                        if (!(move_uploaded_file($_FILES["File"]["tmp_name"], 'uploads/Form16/'.$form[0]['FormByCode'].'/'.$form[0]['id'].'/' . $Acknowledgement))) {
                           $err++;
                           echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    
                    if ($err==0) {
                        $_POST['File']= $Acknowledgement;
                        $id=$mysql->execute("update `_tbl_form_16` set `Acknowledgement`     ='".$Acknowledgement."',
                                                                       `Completed`          ='1',
                                                                       `InProccess`          ='2',
                                                                       `InProcessCompleteOn` ='".date("Y-m-d H:i:s")."'
                                                                        where `id`           ='".$form[0]['id']."'");
                        $id=$mysql->insert("_tbl_formlogs",array("ActionPerformed" => date("Y-m-d H:i:s"),
                                                                 "FormID"          => $_GET['FCode'],
                                                                 "MemberID"        => $member[0]['MemberID'],
                                                                 "UserRemarks"     => $_POST['UserRemarks'],
                                                                 "AdminRemarks"    => $_POST['AdminRemarks'],     
                                                                 "ActionTitle"     => "Form Completed",     
                                                                 "UpdatedStaffID"  => $_SESSION['User']['AdminID'],    
                                                                 "UpdatedStaffName"    => $_SESSION['User']['AdminName']));   
                        MobileSMS::sendSMS($member[0]['MobileNumber'],"Your form has been completed. Thanks Form16.online",$id);
                           $message = "Your form has been completed";
                           
                            $mparam['MailTo']=$member[0]['EmailID'];
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Form16 Completed";
                            $mparam['Message']=$message;
                            $mparam['attachment']='uploads/Form16/'.$form[0]['FormByCode'].'/'.$form[0]['id'].'/' . $Acknowledgement;
                            
                            MailController::Send($mparam,$mailError);
                            
                            $mparam['MailTo']=$form[0]['EmailID'];
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Form16 Completed";
                            $mparam['Message']=$message;
                            $mparam['attachment']='uploads/Form16/'.$form[0]['FormByCode'].'/'.$form[0]['id'].'/' . $Acknowledgement;
                            
                            MailController::Send($mparam,$mailError);
                    }   
    
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } }?>  
    
 <script>
$(document).ready(function () {
  $("#File").change(function() {                                                                  
            if ($("#File").val()=="") {
                $("#ErrFile").html("Please select Acknowledgement"); 
                ErrorCount++; 
            }else{
                $("#ErrFile").html("");  
            }
    });
});
   
 function SubmitAccount() {                                                                                                
                         ErrorCount=0;       
                         $('#ErrFile').html("");            
                         
                      if ($("#File").val()=="") {
                            $("#ErrFile").html("Please select Acknowledgement");  
                            ErrorCount++;
                        }else{
                            $("#ErrFile").html("");  
                        }
                       
                        return (ErrorCount==0) ? true : false;
                 }
</script>        
            
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    
                    <form method="POST" action="" onsubmit="return SubmitAccount();" enctype="multipart/form-data" id="frmfrAd_<?php echo $form[0]['id'];?>">
                     <input type="hidden" value="" name="RemarksSubject" id="Remarks_Subject_<?php echo $form[0]['id'];?>">
                     <input type="hidden" value="" name="AdminRemarksss" id="Admin_Remarks_<?php echo $form[0]['id'];?>">
                     <input type="hidden" value="" name="UserRemarksss" id="User_Remarks_<?php echo $form[0]['id'];?>">
                        <div class="card-body">
                        <?php $member= $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$form[0]['FormByCode']."'"); ?>
                         <?php // if($form[0]['StaffID']<>0 || $form[0]['AgentID']<>0) { ?>  
                            <div class="row">                                                                          
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title"><?php echo ($member[0]['IsCustomer']==1) ? 'Customer Details' : 'Member Details';?></div>
                                        </div>
                                        <div class="card-body"> 
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal"><?php echo ($member[0]['IsCustomer']==1) ? 'Customer Name' : 'Member Name';?></label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MemberName'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal"><?php echo ($member[0]['IsCustomer']==1) ? 'Customer Mobile Number' : 'Member Mobile Number';?>  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MobileNumber'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal"><?php echo ($member[0]['IsCustomer']==1) ? 'Customer Email ID' : 'Member Email ID';?></label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['EmailID'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php // } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="Finacial Year" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Financial Year  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['FinancialYear'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AssestmentYear" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Assessment Year  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AssestmentYear'];?></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                        <div class="row">                            
                                                    <div class="col-md-4">
                                                        <label for="Form16" class="text-left"  style="font-weight:normal">Form16</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                         <?php 
                                                            $t = pathinfo(strtolower(basename($form[0]['Form16'])));
                                                                $filename = ($t['extension']=="pdf") ?  "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Form16'];
                                                            ?>
                                                            <img src="<?php echo $filename; ?>" style="height:100px;max-width:110px">
                                                            <br>
                                                            <div style="text-align:center;">
                                                                <a target="blank_" href="download.php?file=<?php echo $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Form16'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="AadhaarCard" class="text-left"  style="font-weight:normal">Aadhaar Card  </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <?php  if (strlen(trim($form[0]['AadhaarNumber']))>0) {?>    
                                                <?php echo $form[0]['AadhaarNumber'];?>
                                            <?php } else { ?>
                                                        <?php 
                                                             $t = pathinfo(strtolower(basename($form[0]['AadhaarCard'])));
                                                                $filename = ($t['extension']=="pdf")  ? "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['AadhaarCard'];
                                                             ?>                                 
                                                            <img src="<?php echo $filename; ?>" style="height:100px;max-width:110px">
                                                            <br>
                                                            <div style="text-align:center;">
                                                                <a target="blank_" href="download.php?file=<?php echo  $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['AadhaarCard'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="Pancard" class="text-left"  style="font-weight:normal">PanCard  </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                         <?php  if (strlen(trim($form[0]['PanCardNumber']))>0) {?>
                                                <?php echo $form[0]['PanCardNumber'];?>
                                            <?php } else { ?>
                                                         <?php 
                                                $t = pathinfo(strtolower(basename($form[0]['PanCard'])));
                                                $filename = ($t['extension']=="pdf") ? "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['PanCard'];
                                            ?>               
                                                            <img src="<?php echo $filename; ?>" style="height:100px;max-width:110px">
                                                            <br>
                                                            <div style="text-align:center;">
                                                                <a target="blank_" href="download.php?file=<?php echo $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['PanCard'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    
                                                 </div>
                                                 <div class="row">                            
                                    <div class="col-md-4">
                                        <br>
                                       <a target="blank_" href="download.php?file=<?php echo $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['zip_file'];?>">Download All</a>
                                    </div>
                                  </div>
                                           <!-- <div class="row">                                                                                                                                                  
                                                <div class="col-md-4">
                                                    <label for="Form16" class="text-left"  style="font-weight:normal">Form16</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/Form16/<?php echo $form[0]['Form16'];?>" style="height:200px;width:150px"></div>
                                                    <label for="Form16" class="text-left"><button class="btn btn-info" style="padding: 3px 9px 3px 9px;"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="AadhaarCard" class="text-left"  style="font-weight:normal">Aadhaar Card  </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/AadhaarCard/<?php echo $form[0]['AadhaarCard'];?>" style="height:200px;width:150px"></div>
                                                    <label for="AadhaarCard" class="text-left"><button class="btn btn-info" style="padding: 3px 9px 3px 9px;"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="Pancard" class="text-left"  style="font-weight:normal">PanCard  </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/PanCard/<?php echo $form[0]['PanCard'];?>" style="height:200px;width:150px"></div>
                                                    <label for="Pancard" class="text-left"><button class="btn btn-info" style="padding: 3px 9px 3px 9px;"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></label>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>        
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Bank Details</div>
                                        </div>
                                        <div class="card-body">        
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Account Name  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AccountName'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Account Number  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AccountNumber'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">IFSC Code </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['IFSCode'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Personal Details</div>
                                        </div>
                                        <div class="card-body"> 
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Name </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['Name'];?><br>
                                                :&nbsp;<?php echo $form[0]['FormFor'];?>&nbsp;<?php echo $form[0]['FormForName'];?>
                                                </div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Gender </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8" style="padding-top:8px;">:&nbsp;<?php echo $form[0]['Gender'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Date of Birth </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8" style="padding-top:8px;">:&nbsp;<?php echo $form[0]['DateofBirth'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Mobile Number </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8" style="padding-top:8px;">:&nbsp;<?php echo $form[0]['MobileNumber'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Email </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['EmailID'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">AddressLine1</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AddressLine1'];?>,<?php echo $form[0]['AddressLine2'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px;">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">City Name</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['CityName'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Pincode</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['Pincode'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Remarks</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['Remarks'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php if($form[0]['Completed']==0){?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">&nbsp; </div>
                                        </div>
                                        <div class="card-body">        
                                            <div class="form-group form-show-validation row">
                                                <label for="MemberRemarks" class="col-sm-3 text-left" style="font-weight:normal">Member Remarks </label>
                                                <div class="col-sm-4">
                                                    <textarea class="form-control" id="UserRemarks" name="UserRemarks"><?php echo (isset($_POST['UserRemarks']) ? $_POST['UserRemarks'] :"");?></textarea>
                                                    <span class="errorstring" id="ErrUserRemarks"><?php echo isset($ErrUserRemarks)? $ErrUserRemarks : "";?></span>
                                                </div>
                                            </div>
                                            <div class="form-group form-show-validation row">
                                                <label for="AdminRemarks" class="col-sm-3 text-left" style="font-weight:normal">Admin Remarks </label>
                                                <div class="col-sm-4">
                                                    <textarea class="form-control" id="AdminRemarks" name="AdminRemarks"><?php echo (isset($_POST['AdminRemarks']) ? $_POST['AdminRemarks'] :"");?></textarea>
                                                    <span class="errorstring" id="ErrAdminRemarks"><?php echo isset($ErrAdminRemarks)? $ErrAdminRemarks : "";?></span>
                                                </div>
                                            </div>
                                            <?php if($form[0]['Completed']==0){?>
                                            <?php if($form[0]['IsApproved']==1 || $form[0]['IsRejected']==1){?>
                                                <div class="form-group form-show-validation row"  style="padding:0px">
                                                    <label for="File" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Acknowledgment<span class="required-label">*</span></label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><input type="file" name="File" id="File"><br>
                                                    <span class="errorstring" id="ErrFile"><?php echo isset($ErrFile)? $ErrFile : "";?></span> 
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php } ?>
                                            <?php if($form[0]['InProccess']==1){?>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="File" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Assign to Staff<span class="required-label">*</span></label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <select name="AssignToStaff" id="AssignToStaff" class="form-control">
                                                        <option value="0">Select Staff</option>
                                                        <?php $Staffs = $mysql->select("Select * from _tbl_Admin where IsAdmin='0'");  ?>
                                                        <?php foreach($Staffs as $Staff) { ?>
                                                            <option value="<?php echo $Staff['AdminCode'];?>" <?php echo ($_POST[ 'AssignToStaff']) ?  " selected='selected' " : "" ;?>> <?php echo $Staff['AdminName'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                <span class="errorstring" id="ErrAssignToStaff"><?php echo isset($ErrAssignToStaff)? $ErrAssignToStaff : "";?></span> 
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php if($form[0]['InProccess']==1){?>
                                                        <button type="submit" name="Approve" id="Approve" class="btn btn-warning">InProcess</button>
                                                        <button type="submit" name="Reject" id="Reject" class="btn btn-danger">Reject</button>
                                                    <?php }   ?>
                                                    <?php if($form[0]['Completed']==0){?>
                                                    <?php if($form[0]['IsApproved']==1 || $form[0]['IsRejected']==1){?>
                                                        <button type="submit" name="Complete" id="Complete" class="btn btn-warning">Complete</button>
                                                    <?php }  } ?>
                                                    <?php if($form[0]['InProccess']==0){?>
                                                        <button type="submit" name="Reject" id="Reject"  class="btn btn-outline-danger">Reject</button>
                                                        <button type="submit" name="Observation" id="Observation" class="btn btn-warning">Accept</button>
                                                    <?php } ?>
                                                </div>                                        
                                            </div>                                                                             
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <?php } ?>
                             <?php if($form[0]['Completed']==1){?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Acknowledgement</div>
                                        </div>
                                        <div class="card-body">   
                                            <div class="row">
                                                <div class="col-sm-4">
                                                <?php 
                                            $t = pathinfo(strtolower(basename($form[0]['Acknowledgement'])));
                                            $filename = ($t['extension']=="pdf") ? "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Acknowledgement'];
                                        ?>
                                                    <img src="<?php echo $filename;?>"  style="height:100px;max-width:110px">
                                                    <br>
                                                    <div>
                                                        <a target="blank_" href="download.php?file=<?php echo  $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Acknowledgement'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                    </div>
                                                </div>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!--<div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">        
                                            <div class="form-group form-show-validation row">                                                                  
                                                <label class="col-sm-12 text-left">
                                                    Submitted<br>
                                                    <?php echo $form[0]['CreatedOn'];?>
                                                </label>
                                            </div>
                                            <?php if($form[0]['InProccess']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Accepted<br>
                                                        <?php echo $form[0]['InProccessOn'];?>
                                                    </label>
                                                </div> 
                                            <?php } ?>
                                            <?php if($form[0]['Completed']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Accepted<br>
                                                        <?php echo $form[0]['InProccessOn'];?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                            <?php if($form[0]['IsApproved']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        In Process<br>
                                                        <?php echo $form[0]['VerifiedOn'];?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                            <?php if($form[0]['IsRejected']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Rejected<br>
                                                        <?php echo $form[0]['VerifiedOn'];?>
                                                    </label>
                                                </div> 
                                            <?php } ?>
                                            
                                            <?php if($form[0]['Completed']==1){?>
                                            <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Completed<br>
                                                        <?php echo $form[0]['InProcessCompleteOn'];?>
                                                    </label>
                                                </div> 
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="AadhaarCard" class="text-left"  style="font-weight:normal">Acknowledgement</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/<?php echo $form[0]['FormByCode'];?>/Acknowledgement_<?php echo $form[0]['Acknowledgement'];?>" style="height:200px;width:150px"></div>
                                                </div>
                                            </div>  <br><br>
                                            <?php } ?>
                                            
                                        <a href="javascript:void(0)" onclick="AddRemarks('<?php echo $form[0]['id'];?>')" class="btn btn-warning " id="alert_demo_5">Add Remarks</a> 
                                        <input type="submit" name="BtnSaveProfile" id="BtnSaveProfile" style="display: none;">
                                        <?php $remarks = $mysql->select("select * from _tbl_formlogs where FormID='".$form[0]['id']."'")?>
                                        <?php if(sizeof($remarks)>0){?>
                                       <br>
                                       <br>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Remarked On</th>
                                                            <th>User Remarks</th>                                                                                           
                                                            <th>Admin Remarks</th>
                                                            <th>Remarked By</th>
                                                        </tr>
                                                    </thead>                                                                         
                                                    <tbody>                                                                 
                                                    <?php  foreach($remarks as $remark){ ?>
                                                        <tr>
                                                            <td><?php echo date("d M, Y H:i",strtotime($remark['ActionPerformed']));?></td>
                                                            <td><?php echo $remark['UserRemarks'];?></td>
                                                            <td><?php echo $remark['AdminRemarks'];?></td>
                                                            <td><?php echo $remark['UpdatedStaffName'];?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="row">
                        <div class="col-md-12">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title">Activity
                                        <a href="javascript:void(0)" onclick="AddRemarks('<?php echo $form[0]['id'];?>')" class="btn btn-warning " style="float:right;color:#fff">Add Remarks</a> 
                                        <input type="submit" name="BtnSaveProfile" id="BtnSaveProfile" style="display: none;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ol class="activity-feed">
                                    <?php
                                    $feed = $mysql->select("select * from _tbl_formlogs where FormID='".$_GET['FCode']."' order by FormLogID desc");
                                    ?>
                                    <?php foreach($feed as $f) {?>
                                     <?php
                                    $admin = $mysql->select("select * from _tbl_Admin where AdminID='".$f['UpdatedStaffID']."'");
                                    ?>
                                          <li class="feed-item feed-item-secondary">
                                            <time class="date" datetime="<?php echo printDateTime($f['ActionPerformed']);?>"><?php echo printDateTime($f['ActionPerformed']);?></time>
                                            <span class="text"><?php echo $f['ActionTitle'];?> <!--<a href="#">"Volunteer opportunity"</a> --></span> <br>
                                            <span class="text">User Remarks  &nbsp;&nbsp;&nbsp;: <?php echo $f['UserRemarks'];?></span>  <br>
                                            <span class="text">Admin Remarks : <?php echo $f['AdminRemarks'];?></span> <br>
                                            <span class="text">Activity Done By : <?php echo ($admin[0]['IsAdmin']==1) ? 'Admin' : 'Staff';?></span> <br>
                                            <span class="text"><?php echo ($admin[0]['IsAdmin']==1) ? 'Admin Name' : 'Staff Name';?>&nbsp;&nbsp;&nbsp;:<?php echo $f['UpdatedStaffName'];?></span> <br>
                                        </li>
                                    <?php } ?>
                                       <!-- <li class="feed-item feed-item-secondary">                                                   
                                            <time class="date" datetime="9-25">Sep 25</time>
                                            <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-success">
                                            <time class="date" datetime="9-24">Sep 24</time>
                                            <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-info">
                                            <time class="date" datetime="9-23">Sep 23</time>
                                            <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-warning">
                                            <time class="date" datetime="9-21">Sep 21</time>
                                            <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-danger">
                                            <time class="date" datetime="9-18">Sep 18</time>
                                            <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item">
                                            <time class="date" datetime="9-17">Sep 17</time>
                                            <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                                        </li>  -->
                                    </ol>
                                    
                                    <!--
                                        <?php $remarks = $mysql->select("select * from _tbl_formlogs where FormID='".$form[0]['id']."'")?>
                                        <?php if(sizeof($remarks)>0){?>
                                       <br>
                                       <br>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Remarked On</th>
                                                            <th>User Remarks</th>                                                                                           
                                                            <th>Admin Remarks</th>
                                                            <th>Remarked By</th>
                                                        </tr>
                                                    </thead>                                                                         
                                                    <tbody>                                                                 
                                                    <?php  foreach($remarks as $remark){ ?>
                                                        <tr>
                                                            <td><?php echo date("d M, Y H:i",strtotime($remark['ActionPerformed']));?></td>
                                                            <td><?php echo $remark['UserRemarks'];?></td>
                                                            <td><?php echo $remark['AdminRemarks'];?></td>
                                                            <td><?php echo $remark['UpdatedStaffName'];?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                       <?php } ?> -->
                                </div>
                            </div>
                        </div>
                         
                    </div>
                        </form>
                    </div>                                                                                             
                </div>
            </div>
         
    </div>
    <div class="modal" id="PubplishNow" data-backdrop="static" >
        <div class="modal-dialog" >
            <div class="modal-content" id="Publish_body"  style="max-height: 514px;min-height: 514px;" >
        
            </div>
        </div>
    </div>
    <script>
  function AddRemarks(FromID) {
    $('#PubplishNow').modal('show'); 
      var content = '<div class="modal-header">'
                        + '<h4 class="modal-title">Add Remarks</h4>'
                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                    + '</div>'
                    + '<div class="modal-body">'
                        + '<div class="form-group row" style="margin:0px;">'
                           + '<div class="col-sm-8">'                                                              
                                + 'Subject<br>'
                                + '<input type="text" class="form-control" id="Remarks_Subject">'
                                +'<div class="col-sm-12" id="frmremarks_subjecterror" style="color:red;text-align:center"></div><br>'
                                + 'Admin Remarks<br>'
                                + '<textarea class="form-control" rows="2" cols="3" id="Admin_Remarks"></textarea>'
                                +'<div class="col-sm-12" id="frmadminremarks_error" style="color:red;text-align:center"></div><br>'
                                + 'Member Remarks<br>'
                                + '<textarea class="form-control" rows="2" cols="3" id="User_Remarks"></textarea>'
                                +'<div class="col-sm-12" id="frmmemberremarks_error" style="color:red;text-align:center"></div>'
                            + '</div>'
                        +  '</div>'                    
                    + '</div>' 
                    + '<div class="modal-footer">'
                        + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                        + '<button type="button" class="btn btn-primary" name="Create" class="btn btn-primary" onclick="SaveRemarks(\''+FromID+'\')" style="font-family:roboto">Add Remarks</button>'
                    + '</div>';
            $('#Publish_body').html(content);
     
}
function SaveRemarks(FromID) {
        if ($("#Remarks_Subject").val().trim()=="") {
             $("#frmremarks_subjecterror").html("Please enter subject");
             return false;
         }
         if ($("#Admin_Remarks").val().trim()=="") {
             $("#frmadminremarks_error").html("Please enter admin remarks");
             return false;
         }
         if ($("#User_Remarks").val().trim()=="") {
             $("#frmmemberremarks_error").html("Please enter member remarks");
             return false;                                                                                    
         }
        $("#Remarks_Subject_"+FromID).val($("#Remarks_Subject").val());
        $("#Admin_Remarks_"+FromID).val($("#Admin_Remarks").val());
        $("#User_Remarks_"+FromID).val($("#User_Remarks").val());
        $( "#BtnSaveProfile" ).trigger( "click");          
    }

    </script>
    
<iframe style="height:0px;width:0px;" name="blank_"></iframe>