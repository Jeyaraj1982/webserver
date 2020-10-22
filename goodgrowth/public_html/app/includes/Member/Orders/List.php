<?php $Orders = $mysql->select("select * from `_tbl_Member_Orders` where `MemberID`='".$userData['MemberID']."' order by `OrderID` desc"); ?>
  <div class="heading1">
    <span>Manage Orders</span>
</div>
       <br> 
<table style="width: 1000px;" cellspacing="0" cellpadding="5">
    <tr style="background:#ccc;">
        <td style="width:50px;">Order ID</td>
        <td style="width:130px;">Order Date</td>
        <td style="width:100px;text-align:right">Order Value</td>
        <td style="width:100px;text-align:right">Earned Point</td>
        <td style="width:100px;text-align:center">Is Paid</td>
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
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['IsDelivered']==1 ? "Yes" : "No";?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:left"><?php echo strlen($Order['PaymentStatus'])==1 ? "Not Confirmed" : $Order['PaymentStatus'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><a href="dashboard.php?action=Orders/View&Order=<?php echo $Order['OrderID'];?>">View</a></td>
    </tr>
      
    <?php } ?>
    
    <?php if (sizeof($Orders)==0) {?>
    <tr>
        <td colspan="8" style="text-align: center;border-bottom:1px solid #ccc">No orders found</td>
    </tr>
    <?php } ?>
</table> 