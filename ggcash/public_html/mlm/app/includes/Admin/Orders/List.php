<?php 
if (isset($_GET['f']) && $_GET['f']=="all") {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
} elseif (isset($_GET['f']) && $_GET['f']=="all") {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
} else {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
}
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/List">Orders</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/List">Manage Orders</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Orders/List&f=all">All</a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=Orders/List&f=delivered">Delivered</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr style="background:#ccc;">
                                    <td style="width:50px;">Order ID</td>
                                    <td style="width:130px;">Order Date</td>
                                    <td style="width:100px;text-align:right">Order Value</td>
                                    <td style="width:100px;text-align:right">Earned Point</td>
                                    <td style="width:100px;text-align:center">Is Paid</td>
                                    <td style="width:100px;text-align:center">Payment Info</td>
                                    <td style="width:100px;text-align:center">Is Delivered</td>
                                    <td>Payment Mode</td>
                                    <td style="width:50px;">&nbsp;</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Orders as $Order) {?>
                                    <tr>
                                        <td style="padding:3px;"><?php echo $Order['OrderID'];?></td>
                                        <td style="padding:3px;"><?php echo $Order['OrderDate'];?></td>
                                        <td style="text-align: right"><?php echo number_format($Order['OrderValue'],2);?></td>
                                        <td style="text-align: right"><?php echo $Order['EarnedPoint'];?></td>
                                        <td style="padding:3px;text-align:center"><?php echo $Order['IsPaid']==1 ? "Paid" : "Not Paid";?></td>
                                        <td style="padding:3px;text-align:center"><?php echo $Order['IsPaid']==1 ? ($Order['AdminReceviedMoney']==1 ? "Admin" : "Member") : "";?></td>
                                        <td style="padding:3px;text-align:center"><?php echo $Order['OrderDelivered']==1 ? $Order['OrderDeliveredon']  : "No";?></td>
                                        <td style="padding:3px;text-align:left"><?php echo strlen($Order['PaymentStatus'])==1 ? "Not Confirmed" : $Order['PaymentStatus'];?></td>
                                        <td style="padding:3px;text-align:center"><a href="dashboard.php?action=Orders/View&Order=<?php echo $Order['OrderID'];?>">View</a></td>
                                    </tr>
                                    <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 /*   $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });  */
</script>