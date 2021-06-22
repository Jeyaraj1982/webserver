<?php $txnpage="Datewise";?>
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>Wallet Credit Transaction Report</h3>
<?php
    if (isset($_POST['btnAmtCollected'])) {
        $mysql->execute("update _tbl_member_credit_walletupdate set IsPaid='1', PaidOn='".date("Y-m-d H:i:s")."' where WalletReqID='".$_POST['WalletReqID']."'");
        echo "Payment Updated.";
    }
    $data = $mysql->select("select * from _tbl_member_credit_walletupdate where MemberID in (select MemberID from _tbl_member where MapedTo='".$_SESSION['User']['MemberID']."') order by WalletReqID desc");
?>
<table class="table table-striped ">
<?php foreach($data as $d) {
    $m = $mysql->select("select * from _tbl_member where MemberID='".$d['MemberID']."'");
?>
    <tr>
        <td>
            <?php echo $d['TxnDate'];?><br>
            <?php echo $m[0]['MemberName'];?><br>
            <?php echo $m[0]['MobileNumber'];?><br>
            Rs. <?php echo number_format($d['TransferAmount']);?> 
            <div style="text-align: left;">
            <?php  if ($d['IsPaid']==1) {
                    echo date("M d, Y H:i");
            } else {
            ?>
            <form action="" method="post">
                <input type="hidden" value="<?php echo $d['WalletReqID'];?>" name="WalletReqID">
                <input type="submit" name="btnAmtCollected" value="Amount Collected" class="btn btn-success btn-sm">
            </form>
            <?php } ?>
        </div>
        </td>          
    </tr>
<?php } ?>
</table> 