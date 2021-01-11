<?php
$data= $mysql->Select("select * from _tbl_customer where md5(CustomerID)='".$_GET['id']."'");
?>
  <style>
.form-group{
    padding:0px !important;
}
.form-text {
    display: block;
    margin-top: 0px;
}
</style>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Customer</div>
                            <span style="font-size:12px">Created <?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></span>
                        </div>
                            <div class="card-body">
                                <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group form-show-validation row"> 
                                        <label for="email" class="col-md-2 mt-sm-2 text-right">Customer Name</label>
                                        <label class="col-md-10 mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CustomerName'];?></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                        <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MobileNumber'];?></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6">
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                        <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['EmailID'];?></small>
                                        </label>
                                    </div>  
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group form-show-validation row"> 
                                        <label for="email" class="col-md-2 mt-sm-2 text-right">Is Active</label>
                                        <label class="col-md-10 mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></small>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="dashboard.php?action=Customer/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
