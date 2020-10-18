<?php 
    $sql= $mysql->select("select * from `_tbl_orders` where `OrderNumber`='".$_GET['Code']."'");
    $member = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$sql[0]['MemberCode']."'");
    $items = $mysql->select("select * from `_tbl_orders_items` where `OrderID`='".$sql[0]['OrderID']."'")
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="page-pretitle">Payments</h6>
                            <h4 class="page-title">Order #<?php echo $sql[0]['OrderNumber'];?></h4>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-warning" style="color: white;">
                                <i class="fas fa-cloud-download-alt"></i>   Download
                            </a>
                            <!-- 
                            <a href="#" class="btn btn-warning ml-2">
                                Pay
                            </a>
                            -->
                        </div>
                    </div>
                    <div class="page-divider"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-invoice">
                                <div class="card-header">
                                    <div class="invoice-header">
                                        <h3 class="invoice-title">Order</h3>
                                        <div class="invoice-logo">
                                            <img src="assets/logo.jpeg" style="width:60%;margin-right:0px !important;margin:0px auto;">
                                        </div>
                                    </div>
                                    <div class="invoice-desc">
                                        No 182E/4/14 SPP Building,<br/>
                                        SN High Road,<br>
                                        Tirunelveli 627001
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="separator-solid"></div>
                                    <div class="row">
                                        <div class="col-md-4 info-invoice">
                                            <h5 class="sub">Date</h5>
                                            <p><?php echo printDateTime($sql[0]['OrderDate']);?></p>
                                        </div>
                                        <div class="col-md-4 info-invoice">
                                            <h5 class="sub">Order ID</h5>
                                            <p>#<?php echo $sql[0]['OrderNumber'];?></p>
                                        </div>
                                        <div class="col-md-4 info-invoice">
                                            <h5 class="sub">Order To</h5>
                                            <p><?php echo $member[0]['MemberName'];?><br/><?php echo $member[0]['MobileNumber'];?><br/><?php echo $member[0]['EmailID'];?><br/><?php echo $member[0]['Pincode'];?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="invoice-detail">
                                                <div class="invoice-top">
                                                    <h3 class="title"><strong>Order Summary</strong></h3>
                                                </div>
                                                <div class="invoice-item">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td><strong>Item</strong></td>
                                                                    <td class="text-center"><strong>Price</strong></td>
                                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                                    <td class="text-right"><strong>Totals</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach($items as $item){?>
                                                                <tr>
                                                                    <td><?php echo $item['Particulars'];?></td>
                                                                    <td class="text-center"><?php echo number_format($item['Amount'],2);?></td>
                                                                    <td class="text-center"><?php echo $item['Qty'];?></td>
                                                                    <td class="text-right"><?php echo number_format($item['SubAmount'],2);?></td>
                                                                </tr>
                                                            <?php } ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong>Total</strong></td>
                                                                    <td class="text-right"><?php echo number_format($sql[0]['OrderValue'],2);?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="separator-solid  mb-3"></div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">
                                            <h5 class="sub">Payment method</h5>
                                            <p class="text-muted mb-0"><?php if($sql[0]['IsPaid']==1){ echo "Paid"; } else { echo "Not Paid";}?></p>
                                        </div>
                                        <div class="col-sm-5 col-md-7 transfer-total">
                                            <h5 class="sub">Total Amount</h5>
                                            <div class="price"><?php echo number_format($sql[0]['OrderValue'],2);?></div>
                                                <span>Taxes Included</span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script> 