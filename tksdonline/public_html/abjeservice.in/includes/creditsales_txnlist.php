<h3 style="text-align: center;padding:10px;">Account Summary</h3>
<?php
    $backurl  = isset($_GET['back']) ? $_GET['back'] : "creditsales";
    $data = $mysql->select("select * from _tbl_user_credits where MemberID='".$_SESSION['User']['MemberID']."' and CreditID='".$_GET['txn']."'");  
    $summary = $mysql->select("select * from `_tbl_credit_txn` where CreditID='".$data[0]['CreditID']."' order by CreditTxnID desc");
?>
<div class="form-group">
    <label class="text-bold-600" for="exampleInputEmail1">Nick Name</label>
    <input type="text" value="<?php echo $data[0]['NickName'];?>" class="form-control" disabled="disabled" >
</div>
<div class="form-group">
    <label class="text-bold-600" for="exampleInputEmail1">Summary</label>
    <input type="text" value="<?php echo $data[0]['summary']."/Rs. ".number_format($data[0]['TxnAmount'],2);?>" class="form-control" disabled="disabled" >
</div>
<div class="form-group">
    <label class="text-bold-600" for="exampleInputEmail1">Payable Amount</label>
    <input type="text" onKeyDown="return doValidate(event)" value="<?php echo number_format($data[0]['PayableAmount'],2);?>" class="form-control" disabled="disabled">
</div>
<?php if (sizeof($summary)>0) { ?>
<table class="table table-striped">
    <tr>
        <td style="padding:5px !important;">Date</td>
        <td style="padding:5px !important;text-align:right">Paid</td>
        <td style="padding:5px !important;text-align:Right">Balance</td>
    </tr>
    <?php foreach($summary as $s) { ?>
    <tr>
        <td style="font-size:12px;padding:5px !important">
            <?php echo date("Y-m-d",strtotime($s['PaidOn']));?><br>
            <?php echo date("H:i",strtotime($s['PaidOn']));?>
        </td>
        <td style="font-size:12px;padding:5px !important;text-align:right">
            <?php echo number_format($s['PaidAmount'],2);?>
        </td>
        <td style="font-size:12px;padding:5px !important;text-align:right">
            <?php echo number_format($s['BalanceAmount'],2);?>
        </td>
    </tr>
    <?php } ?>
</table>                        
<?php } ?>
<br>
<a href="dashboard.php?action=<?php echo $backurl;?>" class="btn btn-outline-success  glow position-relative" style="width: 120px !important;">back</a>
<?php if ($data[0]['PayableAmount']>0) {?>
<a href="dashboard.php?action=credit_sales_paynow&paynow=<?php echo $data[0]['CreditID'];?>" class="btn btn-success  glow position-relative" style="width: 120px !important;">Paynow</a>
<?php }?>