<?php
$data= $mysql->Select("select * from _tbl_customer where md5(CustomerID)='".$_GET['id']."'");

    $log = $mysql->select("select * from _tbl_customers_viewlogs where CustomerID='".$data[0]['CustomerID']."' and AdminID='".$_SESSION['User']['AdminID']."' ");
if (sizeof($log)==0)  {
      $mysql->insert("_tbl_orders_viewlogs",array("CustomerID"=>$data[0]['CustomerID'],
                                                  "ViewedOn"=>date("Y-m-d H:i:s"),
                                                  "AdminID"=>$_SESSION['User']['AdminID']));
}
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
                                    <label for="name">Customer Name</label>
                                    <div class="col-sm-12"><?php echo $data[0]['CustomerName'];?></div> 
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Email ID</label>
                                    <div class="col-sm-12"><?php echo $data[0]['EmailID'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Mobile Number</label>
                                    <div class="col-sm-12"><?php echo $data[0]['MobileNumber'];?></div>
                                </div>  
                                 <div class="form-group form-show-validation row">
                                    <label for="name">Password</label>
                                    <div class="col-sm-12"><?php echo $data[0]['Password'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Is Active</label>
                                    <div class="col-sm-12"><?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Created On</label>
                                    <div class="col-sm-12"><?php echo date("d M Y, H:i", strtotime($data[0]['CreatedOn']));?></div> 
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
