<?php 
$data=$mysql->select("select * from _tbl_orders where OrderID='".$_GET['id']."'");
?>
 <?php
     
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/view">Orders</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/view">View Orders</a></li>
        </ul>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>View Orders</h4>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Member Code</label>
                                <div style="color:#999"><?php echo $data[0]['MemberCode'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Member Name</label>
                                <div style="color:#999"><?php echo $data[0]['MemberName'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Invoice Number</label>
                                <div style="color:#999"><?php echo $data[0]['InvoiceNumber'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Invoice Amount</label>
                                <div style="color:#999"><?php echo number_format($data[0]['InvoiceAmount'],2);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Invoice Date</label>
                                <div style="color:#999"><?php echo date("d M,Y", strtotime($data[0]['InvoiceDate']));?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order On</label>
                                <div style="color:#999"><?php echo $data[0]['OrderOn'];?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
     <div class="row"> 
        <div class="col-md-12" style="text-align: right;"> 
             <button type="button" onclick="location.href='dashboard.php?action=SupportingCenter/ManageOrders&id=<?php echo $data[0]['StoreID'];?>&filter=All'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
        </div>
    </div>
 