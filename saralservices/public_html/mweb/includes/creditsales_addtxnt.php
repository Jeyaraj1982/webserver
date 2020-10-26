<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Update Payments</h5>
</div> 
<?php 
$data = $mysql->select("select * from _tbl_transactions where MemberID='".$_SESSION['User']['MemberID']."' and txnid='".$_GET['txn']."'");
$acdata = $mysql->select("select * from _tbl_accounts where AccountID='".$data[0]['ACtxnid']."'");
if (true) { ?>
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
            $error=0;                            
            if ($error==0) {
                $credit_note =    $mysql->insert("_tbl_user_credits",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                           "NickName"=>$_POST['NickName'],
                                                                           "CreditUpdated"=>date("Y-m-d H:i:s"),
                                                                           "Amount"=>$_POST['Amount'],
                                                                           "PayableAmount"=>$_POST['Amount'],
                                                                           "summary"=>$acdata[0]['Particulars'],
                                                                           "txnid"=>$data[0]['txnid'],
                                                                           "TxnAmount"=>$acdata[0]['Debit'],
                                                                           "IsPaid"=>"0"));
                $mysql->execute("update `_tbl_transactions` set `IsCreditSale`='1', `Credit_noteid`='".$credit_note."'  where `txnid`='".$data[0]['txnid']."'");
            }                     
            $result['status']="success";
             
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success") {
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    Added Credit Sales                     
                </div>
                <br>
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
                    <input type="text" value="" class="form-control"  placeholder="NickName" name="NickName" id="NickName">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Summary</label>
                    <input type="text" value="<?php echo $acdata[0]['Particulars'];?>" class="form-control" disabled="disabled" >
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Transaction Amount</label>
                    <input type="text" value="<?php echo number_format($acdata[0]['Debit'],2);?>" class="form-control" disabled="disabled" >
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Amount</label>
                    <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" required="">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red" id="error_msg" style="font-size:10px !important;">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Add to Credit Sale<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=creditsales" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
               <!-- <br><br>
                <div style="text-align: center;">
                    <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>" style="color:#555">Transaction History</a>
                </div>
                -->
                <script>
function doCreditSalesPaynow() {      
    
   var nickname= $('#NickName').val();
   if (!(nickname.length>=3)) {
       $('#error_msg').html("please enter valid nick name");
       return false;
   }
   var paidamount = parseFloat($('#Amount').val()) ;
   var payableamount = parseFloat('<?php echo $acdata[0]['Debit'];?>');
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
