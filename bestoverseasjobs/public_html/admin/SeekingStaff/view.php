<?php
$data=$mysql->select("select * from _tbl_seeking_staffs where SeekingStaffID='".$_GET['id']."'");
?>
 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Seeking Staff Information</div>    <br>
                                 
                            </div>
                        <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">EmployerName</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EmployerName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Email'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">RequiredPosition</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['RequiredPosition'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">RequiredNumbers</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['RequiredNumbers'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Message</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Message'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">SubmittedOn</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SubmittedOn'];?></div>
                                </div>
                                 
                            </div>                                                                        
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <a href="dashboard.php?action=SeekingStaff/list" class="btn btn-warning btn-border">Back</a>
                                         
                                    </div> 
                                                                           
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>