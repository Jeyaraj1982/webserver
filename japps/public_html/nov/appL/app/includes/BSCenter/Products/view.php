<?php 
$data=$mysql->select("select * from _tbl_products where ProductID='".$_GET['id']."'");
?>
 <?php
     
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/view">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/view">View Products</a></li>
        </ul>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>View Products</h4>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Product Name</label>
                                <div style="color:#999"><?php echo $data[0]['ProductName'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Product Image</label>
                                <div>
                                    <img src="assets/products/<?php echo $data[0]['ProductImage'];?>" style="height:150px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Regular Product Price</label>
                                <div style="color:#999"><?php echo number_format($data[0]['ProductPrice'],2);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Wintogether Offer Price</label>
                                <div style="color:#999"><?php echo number_format($data[0]['OfferPrice'],2);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Short Description</label>
                                <div style="color:#999"><?php echo $data[0]['ProductShortDesc'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Created On</label>
                                <div style="color:#999"><?php echo $data[0]['AddedOn'];?></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Status</label>
                                <div style="color:#999">
                                    <?php if($data[0]['IsBlock']==0){ ?>
                                        <?php echo $data[0]['IsActive']==1 ? "Active" : "Deactivated";?>
                                    <?php } else { echo "Blocked" ;} ?>        
                                </div>
                            </div>
                        </div>
                        <?php if($data[0]['IsBlock']==1){ ?>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Blocked Remarks</label>
                                        <div style="color:#999"><?php echo $data[0]['BlockedRemarks'];?></div>
                                    </div>
                                </div>
                            </div>    
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
     <div class="row"> 
        <div class="col-md-12" style="text-align: right;"> 
             <button type="button" onclick="location.href='dashboard.php?action=Products/list&filter=all'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
        </div>
    </div>
 