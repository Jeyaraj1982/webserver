<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sales_admin where md5(AdminID)='".$_GET['id']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View User</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">User Code</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AdminCode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">User Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AdminName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Login Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['UserName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Password'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($data[0]['IsActive']=="1"){ echo "Yes";}else { echo "No";} ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CreatedOn'];?></div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                                         
                                            <div class="col-md-12">                                  
                                                    <a href="dashboard.php?action=Users/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>