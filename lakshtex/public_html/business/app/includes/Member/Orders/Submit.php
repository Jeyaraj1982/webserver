<?php
if (isset($_POST['btnSubmit'])) {
    
     $products = $mysql->select("select * from _tbl_Members_Products");
$totalAmt=0;
$totalPnt=0;
$totalSave=0;
  $i=1;
  
  $OrderID = $mysql->insert("_tbl_Member_Orders", array("MemberID"=>$_SESSION['User']['MemberID'],
                                                        "OrderDate"=>date("Y-m-d H:i:s"),
                                                        "OrderNumber"=>"0",
                                                        "OrderValue"=>"0",
                                                        "EarnedPoint"=>"0",
                                                        "IsPaid"=>"0",
                                                        "PaymentID"=>"0",
                                                        "TotalSave"=>"0",
                                                        "PaymentStatus"=>"0",
                                                        "OrderDelivered"=>$_SESSION['User']['FirstName'],
                                                        "DeliveryAddress_1"=>$_SESSION['User']['Address'],
                                                        "DeliveryAddress_2"=>$_SESSION['User']['DistrictName'].",".$_SESSION['User']['StateName'].",".$_SESSION['User']['CountryName'],
                                                        "DeliveryAddress_3"=>$_SESSION['User']['PinCode'],
                                                        "DeliveryAddress_4"=> $_SESSION['User']['PinCode'],
                                                        "DeliveryPincode"=>"",
                                                        "DeliveryMobileNumber"=>$_SESSION['User']['MobileNumber'],
                                                        "BillingTo"=>$_SESSION['User']['MemberName'],
                                                        "BillingAddress_1"=>$_SESSION['User']['AddressLine1'],
                                                        "BillingAddress_2"=>$_SESSION['User']['DistrictName'].",".$_SESSION['User']['StateName'].",".$_SESSION['User']['CountryName'],
                                                        "BillingAddress_3"=>$_SESSION['User']['PinCode'],
                                                        "BillingAddress_4"=>"",
                                                        "BillingMobileNumber"=>$_SESSION['User']['MobileNumber'],
                                                        "BillingEmailID"=>$_SESSION['User']['EmailID']));
   foreach($products as $p) {
       
       if (isset($_POST['Qty_'.$p['ProductID']]) && $_POST['Qty_'.$p['ProductID']]>0) {
           
           $mysql->insert("_tbl_Member_Orders_Items",array("ProductID"=>$p['ProductID'],
            
                                                           "OrderID"=>$OrderID,
                                                           "ProductName"=>$p['ProductName'],
                                                           "MRP"=>$p['MRP'],
                                                           "DPrice"=>$p['DPrice'],
                                                           "Points"=>$p['Points'],
                                                           "Qty"=>$_POST['Qty_'.$p['ProductID']],
                                                           "Amount"=>$_POST['Qty_'.$p['ProductID']]*$p['DPrice'],
                                                           "EarnedPoints"=>$_POST['Qty_'.$p['ProductID']]*$p['Points']));
           $totalAmt  += $_POST['Qty_'.$p['ProductID']]*$p['DPrice'];
           $totalPnt  += $_POST['Qty_'.$p['ProductID']]*$p['Points'];
           $totalSave += ($_POST['Qty_'.$p['ProductID']]*$p['MRP'] - $_POST['Qty_'.$p['ProductID']]*$p['DPrice']);
       }  
   }
   $mysql->execute("update `_tbl_Member_Orders` set `OrderValue`='".$totalAmt."', `EarnedPoint`='".$totalPnt."', `TotalSave`='".$totalSave."' where `OrderID`='".$OrderID."'");
}

$Order = $mysql->select("select * from `_tbl_Member_Orders` where `OrderID`='".$OrderID."'");
$OrderItems = $mysql->select("select * from `_tbl_Member_Orders_Items` where `OrderID`='".$OrderID."'");
?>
<style>
.btn-outline-purple:hover{
    color:#9B0976;
}
</style>

<div style="padding:25px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="dashboard.php?action=Orders/Confirm" method="post">
                        <input type="hidden" value="<?php echo $OrderID;?>" name="OrderID">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="row" style="margin-right: 0px;margin-left: 0px;"><h4 class="font-light m-b-xs" style="font-size:20px"><b>Billing Information</b></h4></div>
                                <div class="row" style="margin-right: 0px;margin-left: 0px;"><?php echo $Order[0]['BillingTo'];?></div>
                                <div class="row" style="margin-right: 0px;margin-left: 0px;"><?php echo $Order[0]['BillingAddress_1'];?></div>
                                <div class="row" style="margin-right: 0px;margin-left: 0px;"><?php echo $Order[0]['BillingAddress_2'];?></div>
                                <div class="row" style="margin-right: 0px;margin-left: 0px;">Pincode:&nbsp;&nbsp;<?php echo $Order[0]['BillingAddress_3'];?></div>
                                <div class="row" style="margin-right: 0px;margin-left: 0px;">Mobile:&nbsp;&nbsp;<?php echo $Order[0]['BillingMobileNumber'];?></div>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                 <div class="row" style="margin-right: 0px;margin-left: 0px;"><h4 class="font-light m-b-xs"  style="font-size:20px"><b>Order Information</b></h4></div>
                                 <div class="row" style="margin-right: 0px;margin-left: 0px;">Order ID: <?php echo $Order[0]['OrderID'];?></div>
                                 <div class="row" style="margin-right: 0px;margin-left: 0px;">Order Date :<?php echo date("M d, Y H:i",strtotime($Order[0]['OrderDate']));?></div>
                            </div>
                            </div>
                        <br>
                        <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                            <tr>
                                <td style="text-align: right;">&nbsp;</td>
                                <td>Product Name</td>
                                <td style="text-align: right;">MRP</td>
                                <td style="text-align: right;">D.Price</td>
                                <td style="text-align: right;">Points</td>
                                <td style="text-align: right;">Qty</td>
                                <td style="text-align: right;">Amount</td>
                                <td style="text-align: right;">Points</td>
                            </tr>
                            <?php foreach($OrderItems as $item) { ?>
                            <tr>
                                <td><?php echo $i;?>.</td>
                                <td><?php echo $item['ProductName'];?></td>
                                <td style="text-align: right;"><?php echo number_format($item['MRP'],2);?></td>
                                <td style="text-align: right;"><?php echo number_format($item['DPrice'],2);?></td>
                                <td style="text-align: right;"><?php echo $item['Points'];?></td>
                                <td style="text-align: right;"><?php echo $item['Qty'];?></td>
                                <td style="text-align: right;"><?php echo number_format($item['Amount'],2);?></td>
                                <td style="text-align: right;"><?php echo $item['EarnedPoints'];?>&nbsp;</td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="5"></td>
                                <td style="text-align:right">Total</td>
                                <td style="text-align:right"><?php echo number_format($Order[0]['OrderValue'],2);?></td>
                                <td style="text-align:right"><?php echo $Order[0]['EarnedPoint']; ?></td>    
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">You saved Rs. <?php echo number_format($Order[0]['TotalSave'],2);?></td>
                                <td colspan="6" style="text-align: right;">
                                    <a href="dashboard.php?action=Orders/New">Cancel Order</a>&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-outline-purple" value="Cash on delivery" name="btnCashOnDelivery" style="background: white;">&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-purple" value="Pay Now (Rs. <?php echo number_format($totalAmt);?>)" name="btnSubmit">&nbsp;&nbsp;
                                </td>
                            </tr>                        
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
