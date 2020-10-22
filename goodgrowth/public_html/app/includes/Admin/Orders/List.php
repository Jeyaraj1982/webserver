
<?php 
if (isset($_GET['f']) && $_GET['f']=="all") {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
} elseif (isset($_GET['f']) && $_GET['f']=="all") {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
} else {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
}
?>
<a href="dashboard.php?action=Orders/List&f=all">All</a> | 
<a href="dashboard.php?action=Orders/List&f=delivered">Delivered</a> | 
<table style="width: 1000px;" cellspacing="0" cellpadding="5">
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
    <?php foreach($Orders as $Order) {?>
    <tr>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['OrderID'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['OrderDate'];?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo number_format($Order['OrderValue'],2);?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo $Order['EarnedPoint'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['IsPaid']==1 ? "Paid" : "Not Paid";?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['IsPaid']==1 ? ($Order['AdminReceviedMoney']==1 ? "Admin" : "Member") : "";?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['OrderDelivered']==1 ? $Order['OrderDeliveredon']  : "No";?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:left"><?php echo strlen($Order['PaymentStatus'])==1 ? "Not Confirmed" : $Order['PaymentStatus'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><a href="dashboard.php?action=Orders/View&Order=<?php echo $Order['OrderID'];?>">View</a></td>
    </tr>
    <?php } ?>
</table> 