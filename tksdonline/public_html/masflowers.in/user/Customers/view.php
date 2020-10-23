<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sales_customers where md5(CustomerID)='".$_GET['id']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Customer</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Code</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CustomerCode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Name (In English)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CustomerName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Name (In Tamil)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CustomerNameTamil'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Shop Name (In English)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ShopName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Shop Name (In Tamil)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ShopNameTamil'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">EmailID</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EmailID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Maximum Credit Limit</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MaximumCreditLimit'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php echo $data[0]['AddressLine1'];?>
                                                <?php if(strlen($data[0]['AddressLine2'])>0){ echo "<br>". $data[0]['AddressLine2']; } ?>
                                                <?php if(strlen($data[0]['AddressLine3'])>0){ echo "<br>". $data[0]['AddressLine3']; } ?>
                                            </div>
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
                                                    <a href="dashboard.php?action=Customers/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>