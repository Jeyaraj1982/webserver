 
<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">New Order</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="container-fluid">
               <div class="row">
<div class="col-12">
<div class="card">
  <div class="card-body">  
<?php

if (isset($_POST['btnSubmit'])) {
    
     $products = $mysqldb->select("select * from _tbl_Members_Products");
$totalAmt=0;
$totalPnt=0;
$totalSave=0;
  $i=1;
                                 
  $OrderID = $mysqldb->insert("_tbl_Member_Orders", array("MemberID"=>$_SESSION['User']['MemberID'],
                                                        "OrderDate"=>date("Y-m-d H:i:s"),
                                                        "OrderNumber"=>"0",
                                                        "OrderValue"=>"0",
                                                        "EarnedPoint"=>"0",
                                                        "IsPaid"=>"0",
                                                        "PaymentID"=>"0",
                                                        "TotalSave"=>"0",
                                                        "PaymentStatus"=>"0",
                                                        "OrderDelivered"=>$_SESSION['User']['MemberName'],
                                                        "DeliveryAddress_1"=>$_SESSION['User']['AddressLine1'],
                                                        "DeliveryAddress_2"=>$_SESSION['User']['AddressLine2'].",".$_SESSION['User']['AddressLine3'].",".$_SESSION['UserData']['StateName'],
                                                        "DeliveryAddress_3"=>$_SESSION['User']['PinCode'],
                                                        "DeliveryAddress_4"=> $_SESSION['User']['PinCode'],
                                                        "DeliveryPincode"=>"",
                                                        "DeliveryMobileNumber"=>$_SESSION['User']['MobileNumber'],
                                                        "BillingTo"=>$_SESSION['User']['MemberName'],
                                                        "BillingAddress_1"=>$_SESSION['User']['AddressLine1'],
                                                        "BillingAddress_2"=>$_SESSION['User']['AddressLine2'].",".$_SESSION['User']['AddressLine3'].",".$_SESSION['UserData']['StateName'],
                                                        "BillingAddress_3"=>$_SESSION['User']['PinCode'],
                                                        "BillingAddress_4"=>"",
                                                        "BillingMobileNumber"=>$_SESSION['User']['MobileNumber'],
                                                        "BillingEmailID"=>$_SESSION['User']['MemberEmail']));
   foreach($products as $p) {
       
       if (isset($_POST['Qty_'.$p['ProductID']]) && $_POST['Qty_'.$p['ProductID']]>0) {
           
           $mysqldb->insert("_tbl_Member_Orders_Items",array("ProductID"=>$p['ProductID'],
            
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
   $mysqldb->execute("update `_tbl_Member_Orders` set `OrderValue`='".$totalAmt."', `EarnedPoint`='".$totalPnt."', `TotalSave`='".$totalSave."' where `OrderID`='".$OrderID."'");
}

$Order = $mysqldb->select("select * from `_tbl_Member_Orders` where `OrderID`='".$OrderID."'");
$OrderItems = $mysqldb->select("select * from `_tbl_Member_Orders_Items` where `OrderID`='".$OrderID."'");

?>

<form action="dashboard.php?action=Orders/Confirm" method="post">
    <input type="hidden" value="<?php echo $OrderID;?>" name="OrderID">
    <table style="width:800px;">
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
                    <tr><td>Order ID: <?php echo $Order[0]['OrderID'];?></td></tr>
                    <tr><td> Order Date :<?php echo $Order[0]['OrderDate'];?></td></tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table align="left" cellpadding="5" cellspacing="0" style="width: 800px;">
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
        <?php } ?>
        <tr>
            <td colspan="5" style="border-bottom:1px solid #ccc;text-align:left"></td>
            <td style="border-bottom:1px solid #ccc;text-align:right">Total</td>
            <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo number_format($Order[0]['OrderValue'],2);?></td>
            <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $Order[0]['EarnedPoint']; ?></td>    
        </tr>
        <tr>
            <td colspan="2" style="text-align:left">You saved Rs. <?php echo number_format($Order[0]['TotalSave'],2);?></td>
            <td colspan="6" style="text-align: right;">
                <input type="submit" class="btn btn-secondary block-default"  value="Cash on delivery" name="btnCashOnDelivery">
                <input type="submit" class="btn btn-primary block-default" value="Pay Now (Rs. <?php echo number_format($totalAmt);?>)" name="btnSubmit">
            </td>
        </tr>                        
    </table>
</form>                                     

  </div>
     </div>
     </div>
     </div>
     </div>
  