<?php
        $Order = $mysql->select("select * from `_tbl_Member_Orders` where `OrderID`='".$_GET['Order']."'");
        if (isset($_POST['btnPaid'])) {
            $mysql->execute("update _tbl_Member_Orders set `IsPaid`='1', `AdminReceviedMoney`='1', `AdminReceviedOn`='".date("Y-m-d H:i:s")."'  where `OrderID`='".$_GET['Order']."'");
            
            $mysql->insert("_tbl_Member_Points",array("MemberID"    => $Order[0]['MemberID'],
                                                                  "MemberCode"  => $Order[0]['MemberCode'],
                                                                  "EarnPoint"   => $Order[0]['EarnedPoint'],
                                                                  "Remarks"     => "Order ID ".$Order[0]['OrderID']));
                                                                  
            echo "Paymnet Updated";
        }
        
         if (isset($_POST['btnDelivery'])) {
            $mysql->execute("update _tbl_Member_Orders set `OrderDelivered`='1',  `OrderDeliveredon`='".date("Y-m-d H:i:s")."'  where `OrderID`='".$_GET['Order']."'");
            echo "Order Delivered";
        }
        
        $Order = $mysql->select("select * from `_tbl_Member_Orders` where `OrderID`='".$_GET['Order']."'");
        if (sizeof($Order)==1) {
        $OrderItems = $mysql->select("select * from `_tbl_Member_Orders_Items` where `OrderID`='".$Order[0]['OrderID']."'");
        $i=1;
?>
<form action="" method="post">
    <?php if (strlen($Order[0]['PaymentStatus'])==1) {?>
    <div style='width:800px;margin:0px auto;background:red;color:#fff;text-align:center;padding:10px;'>Order Not Confirmed By Member</div>
    <?php } ?>
    <div style="width:800px;margin:0px auto;border:1px solid #ccc;padding:10px;">
        <table style="width:800px;clear:both;">
            <tr>
                <td style="vertical-align:top;width:400px">
                    <table>
                        <tr><td style="font-weight:bold;font-size:20px">Billing Information</td></tr>
                        <tr><td><?php echo $Order[0]['BillingTo'];?></td></tr>
                        <tr><td><?php echo $Order[0]['BillingAddress_1'];?></td></tr>
                        <tr><td><?php echo $Order[0]['BillingAddress_2'];?></td></tr>
                        <tr><td>Pincode:&nbsp;&nbsp;<?php echo $Order[0]['BillingAddress_3'];?></td></tr>
                        <tr><td>Mobile:&nbsp;&nbsp;<?php echo $Order[0]['BillingMobileNumber'];?></td></tr>
                    </table>
                </td>
                <td style="vertical-align:top;">
                    <table align="right">
                        <tr><td style="font-weight:bold;font-size:20px">Order Information</td></tr>
                        <tr><td>Order ID</td><td>:&nbsp;<?php echo $Order[0]['OrderID'];?></td></tr>
                        <tr><td>Order Date</td><td>:&nbsp;<?php echo $Order[0]['OrderDate'];?></td></tr>
                        <tr><td>Payment Mode</td><td>:&nbsp;<?php echo strlen($Order[0]['PaymentStatus'])==1 ? "Not Confirmed" : $Order[0]['PaymentStatus'];?></td></tr>
                        <tr><td>Is Paid</td><td>:&nbsp;<?php echo $Order[0]['IsPaid']==1 ? "Paid" : "Not Paid";?></td></tr>
                        <tr><td>Is Delivered</td><td>:&nbsp;<?php echo $Order[0]['OrderDelivered']==1 ? "Delivered ".$Order[0]['OrderDeliveredon'] : "Not Delivered";?></td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table cellpadding="5" cellspacing="0" style="width: 800px;clear:both;">
            <tr style="font-weight:bold;text-align: center;background:#ccc;">
                <td style="text-align: right;width:25px">&nbsp;</td>
                <td>Product Name</td>
                <td style="text-align: right;width:75px">MRP</td>
                <td style="text-align: right;width:75px">D.Price</td>
                <td style="text-align: right;width:75px">Points</td>
                <td style="text-align: right;width:75px">Qty</td>
                <td style="text-align: right;width:75px">Amount</td>
                <td style="text-align: right;width:75px">Points</td>
            </tr>
            <?php foreach($OrderItems as $item) { ?>
            <tr>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $i;?>.</td>
                <td style="border-bottom:1px solid #ccc"><?php echo $item['ProductName'];?></td>
                <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($item['MRP'],2);?></td>
                <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($item['DPrice'],2);?></td>
                <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo $item['Points'];?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $item['Qty'];?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo number_format($item['Amount'],2);?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $item['EarnedPoints'];?>&nbsp;</td>
            </tr>
            <?php $i++; } ?>
            <tr>
                <td colspan="5" style="border-bottom:1px solid #ccc;text-align:left">You saved Rs. <?php echo number_format($Order[0]['TotalSave']);?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right">Total</td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo number_format($Order[0]['OrderValue'],2);?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $Order[0]['EarnedPoint']; ?></td>    
            </tr>
            <?php if (strlen($Order[0]['PaymentStatus'])>1) {?>
             <tr>
           
            <td colspan="6" style="text-align: right;">
            <?php if ($Order[0]['OrderDelivered']==0 && $Order[0]['IsPaid']==1) { ?>
                <input type="submit" class="SubmitBtn" value="Delivered" name="btnDelivery">
            <?php } ?>
              <?php if ($Order[0]['IsPaid']==0) { ?>    
                <input type="submit" class="SubmitBtn" value="Paid" name="btnPaid">
                  <?php } ?>
            </td>
        </tr> 
        <?php } ?>
        </table>
    </div>
 </form>
<?php } else { ?>
Invalid Access
<?php } ?>