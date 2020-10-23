
<?php

    $data = $mysql->select("select * from _tbl_admin_credits where AdminID='".$_SESSION['User']['AdminID']."' and CreditID='".$_GET['paynow']."'");
   if (true) {  
    if (isset($_POST['submitRequest'])) {
        
        $error=0;
            if ($data[0]['PayableAmount']<=0) {
                $error++;
                $result['status']="failure";
                $result['message']="Incorrect";
            }
            if ($error==0) {
                
                $balance = $mysql->select("select count(PaidAmount) as pa where _tbl_admin_credit_txn where CreditID='".$_GET['paynow']."'");
                $abalance = isset($balance[0]['pa']) ? $balance[0]['pa'] : 0;
                $credit= $mysql->select("select * from  _tbl_admin_credits where CreditID='".$_GET['paynow']."'");
                $BalanceAmount = $credit[0]['PayableAmount']-($abalance + $_POST['Amount']);
                $mysql->insert("_tbl_admin_credit_txn",array("CreditID"         =>$_GET['paynow'],
                                                              "PaidOn"          =>date("Y-m-d H:i:s"),                
                                                              "PaidAmount"      =>$_POST['Amount'],                
                                                              "BalanceAmount"   =>$BalanceAmount));
                $mysql->execute("update _tbl_admin_credits set PayableAmount='".$BalanceAmount."', PaidOn='".date("Y-m-d H:i:s")."' where CreditID='".$_GET['paynow']."'");
                if ($BalanceAmount==0) {
                    $mysql->execute("update _tbl_admin_credits set IsPaid='1', PaidOn='".date("Y-m-d H:i:s")."' where CreditID='".$_GET['paynow']."'");
                    $mysql->execute("update _tbl_transactions set IsCreditSale='2'  where Credit_noteid='".$_GET['paynow']."'");
                }
            }                     
            $result['status']="success";
          if ($result['status']=="success") {    
            ?>
            <script>
                swal("Rs. <?php echo number_format($_POST['Amount'],2); ?> has been Credited.<br><?php if ($BalanceAmount==0) {  ?>Credit Cleared. <?php } else {?>Payable Balance Rs. <?php echo number_format($BalanceAmount,2); ?>.<?php } ?>", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Wallets/CreditSales'
                });
            </script>
        <?php } else { ?>
             <script>
              $(document).ready(function() {
                    swal("Transaction failed<br><?php echo $result['message']; ?>", {
                        icon : "error" 
                        confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href='dashboard.php?action=Wallets/CreditSales'
                    });
            </script>
            <?php
        }
    }
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Credit_Sales_Paynow">Wallets</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Credit_Sales_Paynow">Update Payments</a></li>
        </ul>
    </div>
        
       <style>
       .btn-light{border:1px solid #ccc !important}
       </style> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
   
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Update Payments</div>
            </div>
            <div class="card-body">
                <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return doCreditSalesPaynow()">
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <label>Nick Name</label>
                            <br>
                            <input type="text" onKeyDown="return doValidate(event)" value="<?php echo $data[0]['NickName'];?>" class="form-control" disabled="disabled" >
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <label>Summary <span style="font-weight:normal">(<?php echo $data[0]['CreditUpdated'];?>)</span></label>
                            <br>
                            <input type="text" value="<?php echo $data[0]['summary']."/Rs. ".number_format($data[0]['TxnAmount'],2);?>" class="form-control" disabled="disabled" >
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <label>Payable Amount</label>
                            <br>
                            <input type="text" onKeyDown="return doValidate(event)" value="<?php echo number_format($data[0]['PayableAmount'],2);?>" class="form-control" disabled="disabled">
                        </div>
                    </div> 
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <label>Amount</label>
                            <br>
                            <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" required="">
                        </div>
                    </div> 
                    
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="submitRequest" id="submitRequest" class="btn btn-primary" >Pay Now</button>
                        </div>
                    </div>
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
        </div>
        </div>
    </div>  
    <?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $data[0]['InactiveMessage'];?></div>
</div>
<?php } ?>          
<?php include_once("footer.php"); ?>
