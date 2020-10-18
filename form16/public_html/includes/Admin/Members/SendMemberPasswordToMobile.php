<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="float: left;">Send Password To Member Mobile</div>
                        </div>
                        <?php 
                        $sql= $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
                        if (strlen(trim($sql[0]['Password']))>0) {
                        if (isset($_POST['sendBtn'])) {
                            MobileSMS::sendSMS($sql[0]['MobileNumber'],"Dear Applicant, Your form16.online password is ".$sql[0]['Password'],$sql[0]['MemberID']);
                            echo "Password sent."; 
                        }
                        ?>
                        <div class="card-body">   
                            <div class="form-group form-show-validation row">
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberName'];?></div>
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
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Are you want to confirm send password to member's mobile number?</label>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12" style="text-align: right;">
                                    <form action="" method="post">
                                        <a href="dashboard.php?action=ViewMember&MCode=<?php echo $_GET['MCode'];?>" class="btn btn-outline-danger">Cancel</a>
                                        <button type="submit" class="btn btn-warning" name="sendBtn">Send Password</button>
                                    </form>
                                </div>                                        
                            </div>
                        </div>
                        <?php } else { ?>
                         <div class="card-body">   
                            <div class="form-group form-show-validation row">
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Member Password is empty. Please update password then try to send mobile again.</label>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12" style="text-align: right;">
                                   
                                        <a href="dashboard.php?action=ViewMember&MCode=<?php echo $_GET['MCode'];?>" class="btn btn-outline-warning">Continue</a>
                                       
                                    </form>
                                </div>                                        
                            </div>
                        </div>
                        <?php } ?>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>