<?php
    $orderconfirm = false;
 
    if (isset($_POST['btnConfirm'])) {
        
        $Order = $mysqldb->select("select * from `_tbl_Member_Orders` where `OrderID`='".$_POST['OrderID']."'");
        
        if ($_SESSION['rnd']==0) {
            echo '<script>location.href="dashboard.php?action=Orders/OrderExpired";</script>';
            
        } else {
            
            if ($_POST['otp']==$_SESSION['rnd']) {
                
                $_SESSION['rnd']=0;
                
                if ($_POST['PaymentStatus']=="Cash on delivery") {
                    $mysqldb->execute("update _tbl_Member_Orders set IsPaid='0', PaymentStatus='".$_POST['PaymentStatus']."' where OrderID='".$_POST['OrderID']."'");
                    $_SESSION['rnd']=0;
                    echo '<script>location.href="dashboard.php?action=Orders/OrderPlaced";</script>';
                }
                  
                if ($_POST['PaymentStatus']=="Wallet payment") {
                    
                    if (getGGCashWalletBalance($_SESSION['User']['MemberID'])<$Order[0]['OrderValue']) {
                        $mysqldb->execute("update _tbl_Member_Orders set  IsPaid='0', PaymentStatus='Order Cancelled. Insufficiant Fund' where OrderID='".$_POST['OrderID']."'");
                        echo '<script>location.href="dashboard.php?action=Orders/InsufficiantFund";</script>';
                    } else {
                        ///getAvailableBalance($_SESSION['User']['MemberID'])
                        $bal = getGGCashWalletBalance($_SESSION['User']['MemberID'])-$Order[0]['OrderValue'];
                         $ACTransactionID = $mysqldb->insert("_tbl_wallet_earnings",array("MemberID"   => $_SESSION['User']['MemberID'],
                                                                                              "TxnDate"       => date("Y-m-d H:i:s"),
                                                                                              "Particulars"   => "Order ID ".$Order[0]['OrderID'],
                                                                                              "Credits"       => "0",
                                                                                              "Debits"        => $Order[0]['OrderValue'],
                                                                                              "AvailableBalance" => $bal)); 
                        $mysqldb->insert("_tbl_Member_Points",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                                  "MemberCode"  => $_SESSION['User']['MemberCode'],
                                                                  "EarnPoint"   => $Order[0]['EarnedPoint'],
                                                                  "Remarks"     => "Order ID ".$Order[0]['OrderID']));
                       
                        $mysqldb->execute("update _tbl_Member_Orders set  IsPaid='1', PaymentStatus='".$_POST['PaymentStatus']."' where OrderID='".$_POST['OrderID']."'");
                        $sms_response=MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberCode']," Rs. ".$Order[0]['OrderValue']." has been debited from Your GGCash Wallet due to Order Number: ".$_POST['OrderID'].". Your GGCash Wallet Balance Rs. ".$bal,$_SESSION['User']['MemberID']);
                        echo '<script>location.href="dashboard.php?action=Orders/OrderPlaced";</script>';
                   }
                }
            } else {
                echo "<div style='width:800px;margin:0px auto;background:red;color:#fff;text-align:center;padding:10px;'>Invalid OTP</div>";
            }
        }
    }
    
    if (!($orderconfirm)) {
        $Order = $mysqldb->select("select * from `_tbl_Member_Orders` where `OrderID`='".$_POST['OrderID']."'");
        $OrderItems = $mysqldb->select("select * from `_tbl_Member_Orders_Items` where `OrderID`='".$Order[0]['OrderID']."'");
        $i=1;
?>
<form action="dashboard.php?action=Orders/Confirm" method="post">
    <div style="width:830px;margin:0px auto;border:1px solid #ccc;padding:10px;background:#fff">
        <input type="hidden" value="<?php echo $Order[0]['OrderID'];?>" name="OrderID">
        <?php
            if (isset($_POST['btnCashOnDelivery'])) {
                $status="Cash on delivery";
            }
              if (isset($_POST['btnSubmit'])) {
                   $status="Wallet payment";
            }
            if (!(isset($_POST['PaymentStatus']))) {
                $_POST['PaymentStatus']=$status;    
            }
        ?>
        <input type="hidden" value="<?php echo $_POST['PaymentStatus'];?>" name="PaymentStatus">
        <table style="width:100%;clear:both;background:#fff">
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
                        <tr><td>Payment Mode</td><td>:&nbsp;<?php echo $_POST['PaymentStatus'];?></td></tr>
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
                <td colspan="5" style="border-bottom:1px solid #ccc;text-align:left"></td>
                <td style="border-bottom:1px solid #ccc;text-align:right">Total</td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo number_format($Order[0]['OrderValue'],2);?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $Order[0]['EarnedPoint']; ?></td>    
            </tr>
        </table>
    </div>
    <div style="width:800px;margin:0px auto;padding:10px;">
        <?php
            if (isset($_SESSION['rnd']) && $_SESSION['rnd']>0) {
                
            } else {
                $rnd = rand(1111,9999);
                
                $_SESSION['rnd']= $rnd;
                $smstxt= "Your Order #: ".$Order[0]['OrderID']." confirmation code ".$rnd;
                MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],$smstxt,$_SESSION['User']['MemberID']);
            }
            //echo $_SESSION['rnd'];
        ?>
        <table style="clear:both;" align="center">
            <tr>
                <td>We have sent an OTP Please enter otp bellow box to confirm your order</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="otp" value="" maxlength="4">
                    <input type="submit"   class="btn btn-primary" value="Confirm Order" name="btnConfirm">
                </td>
            </tr>                                           
        </table>
    </div>
</form>
<?php } ?>