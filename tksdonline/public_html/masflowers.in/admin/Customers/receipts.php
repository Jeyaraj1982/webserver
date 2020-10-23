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
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CustomerName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Shop Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ShopName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($data[0]['IsActive']=="1"){ echo "Yes";}else { echo "No";} ?>
                                            </div>
                                        </div>
                                        <br>
                                        <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Receipt No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th>Receipt Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $receipts = $mysql->select("SELECT * FROM receipt where user_id='".$data[0]['CustomerID']."'");?>
                                        <?php foreach($receipts as $receipt){
                                              $invoiceList = $mysql->select("SELECT * FROM invoice_order WHERE order_id = '".$receipt['order_id']."'");
                                              $receiptDate = date("d/M/Y, H:i:s", strtotime($receipt["receipt_date"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $receipt["ReceiptID"];?></td>
                                                <td><?php echo $receiptDate;?></td>
                                                <td><?php echo $invoiceList[0]["order_receiver_name"];?></td>
                                                <td><?php echo $receipt["receipt_amount"];?></td>
                                                <td>
                                                    <a href="dashboard.php?action=Invoice/viewreceipt&receipt_id=<?php echo md5($receipt["ReceiptID"]);?>" title="Print Invoice">View</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">                                  
                                                    <a href="dashboard.php?action=Customers/list" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
        <?php include_once("footer.php");?>