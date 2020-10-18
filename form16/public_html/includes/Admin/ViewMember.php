
<?php 
  $sql= $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
 /* if (isset($_POST['ApprovePan'])) {
    $id=$mysql->execute("update `_tbl_Attachments` set `IsVerified`='1',
                                                   `Verifiedon`='".date("Y-m-d H:i:s")."' 
                                                   where `MemberCode`='".$sql[0]['MemberCode']."' and AttachmentType='PanCard'");
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } 
  }
  if (isset($_POST['RejectPan'])) {
    $id=$mysql->execute("update `_tbl_Attachments` set `IsVerified`='2',
                                                   `Verifiedon`='".date("Y-m-d H:i:s")."' 
                                                   where `MemberCode`='".$sql[0]['MemberCode']."' and AttachmentType='PanCard'");
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } 
  }
  if (isset($_POST['ApproveAadhaar'])) {
    $id=$mysql->execute("update `_tbl_Attachments` set `IsVerified`='1',
                                                   `Verifiedon`='".date("Y-m-d H:i:s")."' 
                                                   where `MemberCode`='".$sql[0]['MemberCode']."' and AttachmentType='AadhaarCard'");
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } 
  }
  if (isset($_POST['RejectAadhaar'])) {
    $id=$mysql->execute("update `_tbl_Attachments` set `IsVerified`='2',
                                                   `Verifiedon`='".date("Y-m-d H:i:s")."' 
                                                   where `MemberCode`='".$sql[0]['MemberCode']."' and AttachmentType='AadhaarCard'");
    if(sizeof($id)>0){   ?>
        <script>location.href=location.href;</script>
    <?php } 
  }  */
?>
 
        
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title" style="float: left;">View Member Information</div>
                                    <div class="dropdown dropdown-kanban" style="float: right;padding-top:10px;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=EditMember&MCode=<?php echo $_GET['MCode'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=CreateMemberForm16&MCode=<?php echo $_GET['MCode'];?>" draggable="false">Create Form</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ManageForm16ByMember&MCode=<?php echo $_GET['MCode'];?>&Status=All" draggable="false">View Forms</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberSMSLog&MCode=<?php echo $_GET['MCode'];?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberEmailLog&MCode=<?php echo $_GET['MCode'];?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberLoginLog&MCode=<?php echo $_GET['MCode'];?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberInvoices&MCode=<?php echo $_GET['MCode'];?>" draggable="false">Invoices</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberReceipts&MCode=<?php echo $_GET['MCode'];?>" draggable="false">Receipts</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Members/SendMemberPasswordToMobile&MCode=<?php echo $_GET['MCode'];?>" draggable="false">Send Password</a>
                                                    </div>
                                                </div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gender </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Sex'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['EmailID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line 1 </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['AddressLine1'];?> <?php echo $sql[0]['AddressLine2'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Pincode'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Password'];?></div>
                                        </div>
                                           <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Status </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><span class="<?php echo ($sql[0]['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $sql[0]['IsActive']==1 ? "Active" : "Deactivated";?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['CreatedOn'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created By</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($sql[0]['IsCustomer']==0){
                                                      echo "Member";
                                                      }if($sql[0]['IsCustomer']==1){
                                                      echo "Agent";
                                                      }
                                                      if($sql[0]['IsCustomer']==2){
                                                         echo "Staff";
                                                      }
                                                      if($sql[0]['IsCustomer']==3){
                                                         echo "Admin";
                                                      }  ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created By Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($sql[0]['IsCustomer']==0){
                                                            echo $sql[0]['MemberName'];
                                                      }if($sql[0]['IsCustomer']==1){
                                                          $agent = $mysql->select("select * from _tbl_Agents where AgentID='".$sql[0]['AgentID']."'");
                                                          echo $agent[0]['AgentName'];
                                                      }
                                                      if($sql[0]['IsCustomer']==2){
                                                         $staff = $mysql->select("select * from _tbl_Admin where AdminID='".$sql[0]['StaffID']."'");
                                                          echo $staff[0]['AdminName'];
                                                      }
                                                      if($sql[0]['IsCustomer']==3){
                                                         $staff = $mysql->select("select * from _tbl_Admin where AdminID='".$sql[0]['StaffID']."'");
                                                          echo $staff[0]['AdminName'];
                                                      }  ?>
                                            </div>
                                        </div>
                                         
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="dashboard.php?action=ManageMembers&Status=All" id="show-signup" class="link">Back</a>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>

         
     