<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Update Payments</h5>
</div> 
<?php 
$data = $mysql->select("select * from _tbl_user_credits where MemberID='".$_SESSION['User']['MemberID']."' and CreditID='".$_GET['paynow']."'");


if (true) { ?>
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
            $error=0;
            if ($data[0]['PayableAmount']<=0) {
                $error++;
                $result['status']="failure";
                $result['message']="Incorrect";
            }
            if ($error==0) {
                
                $balance = $mysql->select("select count(PaidAmount) as pa from _tbl_credit_txn where CreditID='".$_GET['paynow']."'");
                $abalance = isset($balance[0]['pa']) ? $balance[0]['pa'] : 0;
                $credit= $mysql->select("select * from  _tbl_user_credits where CreditID='".$_GET['paynow']."'");
                $BalanceAmount = $credit[0]['PayableAmount']-($abalance + $_POST['Amount']);
                $mysql->insert("_tbl_credit_txn",array("CreditID"=>$_GET['paynow'],
                                     "PaidOn"=>date("Y-m-d H:i:s"),                
                                     "PaidAmount"=>$_POST['Amount'],                
                                     "BalanceAmount"=>$BalanceAmount));
                $mysql->execute("update _tbl_user_credits set PayableAmount='".$BalanceAmount."', PaidOn='".date("Y-m-d H:i:s")."' where CreditID='".$_GET['paynow']."'");
                if ($BalanceAmount==0) {
                    $mysql->execute("update _tbl_user_credits set IsPaid='1', PaidOn='".date("Y-m-d H:i:s")."' where CreditID='".$_GET['paynow']."'");
                    $mysql->execute("update _tbl_transactions set IsCreditSale='2'  where Credit_noteid='".$_GET['paynow']."'");
                }
            }                     
            $result['status']="success";
             
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success") {
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    Rs. <?php echo number_format($_POST['Amount'],2); ?> has been Credited.
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                   <?php
                       if ($BalanceAmount==0) {
                ?>
                Credit Cleared. 
                <?php    
                } else {
                    ?>
                    Payable Balance Rs. <?php echo number_format($BalanceAmount,2); ?>.
                    <?php
                }
                   ?>
                    
                </div>
                <a href="dashboard.php?action=creditsales" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Transaction failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=creditsales" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php?action=creditsales" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { 
        
        ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return doCreditSalesPaynow()">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Nick Name</label>
                    <input type="text" onKeyDown="return doValidate(event)" value="<?php echo $data[0]['NickName'];?>" class="form-control" disabled="disabled" >
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Summary <span style="font-weight:normal">(<?php echo $data[0]['CreditUpdated'];?>)</span></label>
                    <input type="text" value="<?php echo $data[0]['summary']."/Rs. ".number_format($data[0]['TxnAmount'],2);?>" class="form-control" disabled="disabled" >
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Payable Amount</label>
                    <input type="text" onKeyDown="return doValidate(event)" value="<?php echo number_format($data[0]['PayableAmount'],2);?>" class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Amount</label>
                    <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" required="">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red" id="error_msg" style="font-size:10px !important;">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=creditsales" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
               <!-- <br><br>
                <div style="text-align: center;">
                    <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>" style="color:#555">Transaction History</a>
                </div>
                -->
                <script>
function doCreditSalesPaynow() {
   var paidamount = parseFloat($('#Amount').val()) ;
   var payableamount = parseFloat('<?php echo $data[0]['PayableAmount'];?>');
   if (paidamount<=0) {
       $('#error_msg').html("amount is invalid");
       return false;
   }
   if (!(paidamount<=payableamount)) {
       $('#error_msg').html("Amount invalid. Maximum payable amount Rs. "+payableamount.toFixed(2));
       return false;
   }
   return true;
}

</script>
            </form>         
        </div>
    <?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $data[0]['InactiveMessage'];?></div>
    <a href="dashboard.php?action=creditsales" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
    <a href="dashboard.php?action=creditsales" class="btn btn-success  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
</div>
<?php } ?>
