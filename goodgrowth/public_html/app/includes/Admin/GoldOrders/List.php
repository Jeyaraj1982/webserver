
<?php 
if (isset($_GET['f']) && $_GET['f']=="all") {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
} elseif (isset($_GET['f']) && $_GET['f']=="all") {
    $Orders = $mysql->select("select * from `_tbl_Member_Orders` order by `OrderID` desc"); 
} else {
    $Orders = $mysql->select("select * from `_tbl_GoldOrders` order by `GoldOrderID` desc"); 
}
?>
<h2>Gold Order Invoices</h2>

<a class="SubmitBtn"  href="dashboard.php?action=GoldOrders/New">New Invoice</a> &nbsp;&nbsp;
<a class="SubmitBtn" href="dashboard.php?action=GoldOrders/List&f=all">All Invoices</a>
<br><BR><BR>

<table style="width: 1000px;" cellspacing="0" cellpadding="5">
    <tr style="background:#ccc;">
        <td style="width:120px;text-align:left">Created On</td>
        <td style="width:50px;text-align:left">Invoice No</td>
        <td style="width:120px;text-align:left">Invoice Date</td>
        <td style="text-align:left">Invoice To</td>
        <td style="width:100px;text-align:left">Email ID</td>
        <td style="width:75px;text-align:left">Phone No</td>
        <td style="width:70px;text-align:right">Invalie Value</td>
        <td style="width:60px;text-align:center">Is Mail Sent</td>
        <td style="width:40px;">&nbsp;</td>
    </tr>
    <?php foreach($Orders as $Order) {?>
    <tr>    
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['CreatedOn'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['InvoiceNumber'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['InvoiceDate'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['BuyerAddress1'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['BuyerEmail'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['BuyerMobile'];?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo number_format($Order['TotalAmount'],2);?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['IsMailSent']==1 ? "Sent" : "Not Send";?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><a href="dashboard.php?action=GoldOrders/View&Order=<?php echo $Order['GoldOrderID'];?>">View</a>&nbsp;|&nbsp;
        <a href="dashboard.php?action=GoldOrders/Edit&Order=<?php echo $Order['GoldOrderID'];?>">Edit</a>&nbsp;|&nbsp;
        <a target="_blank" href="assets/pdf/<?php echo $Order['InvoiceNumber'];?>.pdf">Download</a></td>
    </tr>
    <?php } ?>
</table> 