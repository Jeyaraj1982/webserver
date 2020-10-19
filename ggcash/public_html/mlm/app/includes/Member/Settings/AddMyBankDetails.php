<?php
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
    $bank = $mysql->select("select * from `_tbl_Members_bank_info` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
  /*  if (isset($_POST['BankFileBtn'])) {
        $target_path = "assets/uploads/";
        $filename = strtolower(time()."_".$_FILES['BankFile']['name']);
        
        if(move_uploaded_file($_FILES['BankFile']['tmp_name'], $target_path.$filename)) {  
            $data = $mysql->select("select * from `_tbl_Members_bank_info` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
            if(sizeof($data)!=0){
                   $mysql->execute("update `_tbl_Members_bank_info` set BankFile ='".$filename."' where MemberCode='".$_SESSION['User']['MemberCode']."'"); 
            }else {
                $mysql->insert("_tbl_Members_bank_info",array("BankFile"      => $filename,
                                                      "MemberCode"    =>  $_SESSION['User']['MemberCode']));
            }
            ?>
              <script>
                  $(document).ready(function() {        
                         swal({
                              title: "Bank File Updated Successfully",
                              icon: "success",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true
                            }).then((value) => {
                            location.href="dashboard.php?action=Settings/AddMyBankDetails"
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
    }     */
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
           $data = $mysql->select("select * from `_tbl_Members_bank_info` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");   
           if(sizeof($data)!=0){
                $mysql->execute("update `_tbl_Members_bank_info` set `AccountHolderName`='".$_POST['AccountHolderName']."',
                                                             `AccountNumber`='".$_POST['AccountNumber']."',
                                                             `IFSCode`='".$_POST['IFSCode']."'
                                                             where `MemberCode`='".$_SESSION['User']['MemberCode']."'"); 
           }else{
                $mysql->insert("_tbl_Members_bank_info",array("AccountHolderName" => $_POST['AccountHolderName'],
                                                      "AccountNumber"     => $_POST['AccountNumber'],
                                                      "IFSCode"           => $_POST['IFSCode'],
                                                      "MemberCode"        =>  $_SESSION['User']['MemberCode']));     
           }  ?>
           <script>
                   $(document).ready(function() {        
                         swal({
                              title: "Bank Information Updated Successfully",
                              icon: "success",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true
                            }).then((value) => {
                            location.href="dashboard.php?action=Settings/AddMyBankDetails"
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
?>

<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">My Profile</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/AddMyBankDetails">Bank Information</a></li>
        </ul>
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
                                    <label for="email" class="col-md-5 text-right" style="padding-top: 10px;margin-right: -23px;">Account Holder's Name</label>
                                    <div class="col-md-7">
                                        <?php if(sizeof($bank)==0) {   ?>
                                            <input type="text" class="form-control input-full" name="AccountHolderName" value="<?php echo $bank[0]['AccountHolderName'];?>" Placceholder="Account Holder Name">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                        <?php } else { ?>
                                        <label class="text-muted" style="padding-top: 10px;font-weight: normal;">:&nbsp;<?php echo $bank[0]['AccountHolderName'];?></label>
                                        <?php } ?> 
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right" style="padding-top: 10px;margin-right: -23px;">Account Number</label>
                                    <div class="col-md-7 ">
                                        <?php if(sizeof($bank)==0) {   ?>
                                            <input type="text" class="form-control input-full" name="AccountNumber" value="<?php echo $bank[0]['AccountNumber'];?>" Placceholder="Account Number">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                        <?php } else { ?>
                                            <label class="text-muted" style="padding-top: 10px;font-weight: normal;">:&nbsp;<?php echo $bank[0]['AccountNumber'];?></label>
                                        <?php } ?> 
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right" style="padding-top: 10px;margin-right: -23px;">IFSCode</label>
                                    <div class="col-md-7">
                                        <?php if(sizeof($bank)==0) {  ?>
                                            <input type="text" class="form-control input-full" name="IFSCode" value="<?php echo $bank[0]['IFSCode'];?>" Placceholder="IFS Code">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                        <?php } else { ?>
                                            <label class="text-muted" style="padding-top: 10px;font-weight: normal;">:&nbsp;<?php echo $bank[0]['IFSCode'];?></label>
                                        <?php } ?> 
                                    </div>
                                </div>
                            </div>     
                            <?php // if($data[0]['BankInfoSubmit']==0 || $data[0]['BankInfoSubmit']==1 || $data[0]['BankInfoSubmit']==3) {?>                                      
                         <!--   <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="text-left">Scan Copy of Passbook / Cheque Slip</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <?php //if (strlen(trim($bank[0]['BankFile'])>5)) { ?>
                                        <img src="assets/uploads/<?php echo $bank[0]['BankFile'];?>" style="height:200px;"><br>
                                        <?php //} ?>
                                        <?php //if($bank[0]['IsSubmit']==0  || $bank[0]['IsSubmit'] ==3 ){ ?>
                                            <input type="file" name="BankFile">
                                            <input type="submit" value="Update" name="BankFileBtn">
                                        <?php //} ?>
                                    </div>
                                </div>
                            </div> -->  
                            <?php //} ?>                                                       
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
                                
                                <?php if(sizeof($bank)==0) {   ?>
                                    <br><input type="submit" value="Submit" name="SubmitBankDetailsBtn" class="btn btn-primary waves-effect waves-light">
                                <?php } ?>
                            </div>                                             
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
