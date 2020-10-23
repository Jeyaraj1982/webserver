<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate"><?php echo EPINS;?></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Generate <?php echo EPINS;?></a></li>
        </ul>
    </div>
    <?php
         $data = $_SESSION['tmp'];
         if (isset($_POST['btnGenerate'])) {
              $message = "Your ".EPINS." generation code is ". $data['otp'];
              MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],$message,0,$_SESSION['User']['AdminID']);
              echo "<script>location.href='dashboard.php?action=EPins/Verification';</script>";
         }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Generate <?php echo EPINS;?></div>
                </div>
                <div class="card-body">
                    <form action="" method="post" >
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Package Information</label>
                                <input type="text" value="<?php echo $data["package"]['PackageName'];?>" disabled="disabled" class="form-control">  
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Member Information</label>
                                <input type="text" disabled="disabled" value="<?php echo $data["member"]['MemberName'];?>" class="form-control">  
                                <input type="text" disabled="disabled" value="<?php echo $data["member"]['MemberCode'];?>" class="form-control">  
                                <input type="text" disabled="disabled" value="<?php echo $data["member"]['MobileNumber'];?>" class="form-control">  
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Number of <?php echo EPINS;?></label>
                                <input type="text" disabled="disabled" value="<?php echo $data["pins"];?>" class="form-control">  
                            </div>
                        </div> 
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <div class="help-block" style="font-size:12px;color:#666">Next screen we will sent otp to your register mobile</div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right form-group">
                                <a class="btn btn-outline-primary block-default" href="dashboard.php?action=Epins/Generate">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>                                                  
</div>             