<?php
    $orderconfirm = false;
 
    if (isset($_POST['btnConfirm'])) {
        
        
        $Order = $mysql->select("select * from `_tbl_Member_Orders` where `OrderID`='".$_POST['OrderID']."'");
        $userData = $mysql->select("select * from `_tbl_Members` where `MemberID`='".$Order[0]['MemberID']."'");
            if ($_POST['PaymentStatus']=="Cash on delivery") {
                    $mysql->execute("update _tbl_Member_Orders set IsPaid='0', PaymentStatus='".$_POST['PaymentStatus']."' where OrderID='".$_POST['OrderID']."'");
                    $_SESSION['rnd']=0;
                    echo '<script>location.href="dashboard.php?action=Orders/OrderPlaced&m=c";</script>';
                }
        
           // if ($_POST['otp']==$_SESSION['rnd']) {
                
              //  $_SESSION['rnd']=0;
                
                if ($_POST['PaymentStatus']=="Wallet payment") {
                    if (getUtilityhWalletBalance($userData[0]['MemberID'])<$Order[0]['OrderValue']) {
                        $mysql->execute("update _tbl_Member_Orders set  IsPaid='0', PaymentStatus='Order Cancelled. Insufficiant Fund' where OrderID='".$_POST['OrderID']."'");
                        echo '<script>location.href="dashboard.php?action=Orders/InsufficiantFund";</script>';
                    } else {
                             $ACTransactionID = $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $userData[0]['MemberID'],
                                                                                           "TxnDate"          => date("Y-m-d H:i:s"),
                                                                                           "Particulars"      => "Order Placed/ ID ".$Order[0]['OrderID'],
                                                                                           "ActualAmount"     => $Order[0]['OrderValue'],
                                                                                           "Credits"          => "0",
                                                                                           "Debits"           => $Order[0]['OrderValue'],
                                                                                           "AvailableBalance" => getUtilityhWalletBalance($userData[0]['MemberID'])-$Order[0]['OrderValue'],
                                                                                           "Ledger"           => "30")); 
                        $mysql->insert("_tbl_Member_Points",array("MemberID"    => $userData[0]['MemberID'],
                                                                  "MemberCode"  => $userData[0]['MemberCode'],
                                                                  "EarnPoint"   => $Order[0]['EarnedPoint'],
                                                                  "Remarks"     => "Order ID ".$Order[0]['OrderID']));
                       
                        $mysql->execute("update _tbl_Member_Orders set  IsPaid='1', PaymentStatus='".$_POST['PaymentStatus']."' where OrderID='".$_POST['OrderID']."'");
                        echo '<script>location.href="dashboard.php?action=Orders/OrderPlaced&oid='.$Order[0]['OrderID'].'&m=p";</script>';
                   }
                }
           /* } else {
                $ErrorOtp= "<div style='width:800px;margin:0px auto;background:red;color:#fff;text-align:center;padding:10px;'>Invalid OTP</div>";
            } */
    }
    
    if (!($orderconfirm)) {
        $Order = $mysql->select("select * from `_tbl_Member_Orders` where `OrderID`='".$_POST['OrderID']."'");
        $OrderItems = $mysql->select("select * from `_tbl_Member_Orders_Items` where `OrderID`='".$Order[0]['OrderID']."'");
        $i=1;
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
                <?php if(strlen($ErrorOtp)>1){ echo $ErrorOtp; } ?>
                    <form action="dashboard.php?action=Orders/Confirm" method="post">
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
                                 <div class="row" style="margin-right: 0px;margin-left: 0px;">Payment Mode :<?php echo $_POST['PaymentStatus'];?></div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-12">
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
                                    <td colspan="5"> </td>
                                    <td style="text-align:right">Total</td>
                                    <td style="text-align:right"><?php echo number_format($Order[0]['OrderValue'],2);?></td>
                                    <td style="text-align:right"><?php echo $Order[0]['EarnedPoint']; ?></td>    
                                </tr>
                            </table>
                            </div>
                        </div> 
                        <?php /* if ($_POST['PaymentStatus']=="Wallet payment") { ?>
                        <div class="form-group row" style="text-align: center;">
                        <?php
                                if (isset($_SESSION['rnd']) && $_SESSION['rnd']>0) {
                                                                                                                                                                                  
                                } else {
                                    $rnd = rand(1111,9999);
                                    //$rnd=1111;
                                    $_SESSION['rnd']= $rnd;
                                    $smstxt= "Your Order: ".$Order[0]['OrderID']." confirmation code ".$rnd;
                                    MobileSMS::sendSMS($userData[0]['MobileNumber'],$smstxt);
                                }
                            ?>
                            <div class="col-sm-12 control-label">We have sent an OTP Please enter otp bellow box to confirm your order</div>
                        </div>
                        <?php  } */ ?>
                        <div class="form-group row" >
                            <div class="col-sm-4"></div>
                            <?php /* if ($_POST['PaymentStatus']=="Wallet payment") { ?>
                                <div class="col-sm-2" style="text-align: right;"><input type="text" name="otp" value="" class="form-control" maxlength="4" ></div>
                                <div class="col-sm-2" style="text-align: left;"><input type="submit" class="btn btn-purple" value="Confirm Order" name="btnConfirm" id="btnConfirm"></div>
                            <?php } else{ */?>
                            <div class="col-sm-2" style="text-align: right;margin-right:10px"><input type="submit" class="btn btn-purple" value="Confirm Order" name="btnConfirm" id="btnConfirm" style="display:none;" ><button type="button" class="btn btn-purple" onclick="CallConfirmOrder()">Confirm Order</button>&nbsp;&nbsp;</div>
                            <div class="col-sm-2" style="text-align: left;"><button type="button" class="btn btn-outline-purple" onclick="location.href='dashboard.php?action=Orders/New'" style="background: white;">Cancel Order</button></div>
                            <?php //} ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
function CallConfirmOrder(){
     var txt = '<div class="modal-header" style="padding-bottom:5px">'
                    +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to confirm order?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-purple" data-dismiss="modal" style="background:white">Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-purple" onclick="ConfirmOrder()" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';   
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}    
function ConfirmOrder(){
   $('#btnConfirm').trigger("click"); 
} 
</script>
<?php } ?>
