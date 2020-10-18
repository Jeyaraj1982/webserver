<h2>Live Transaction</h2>
<?php

 $userdetails = $mysql->select("select * from _users where emailid='".$_REQUEST['user']."'");
 
if ($userdetails[0]['balance']==0) {
    $liveTransactions= $mysql->select("select * from _tbltransaction where userid='".$userdetails[0]['userid']."' order by txnid desc limit 0,50");
} else {
    $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid=".$userdetails[0]['userid']." order by txnid desc limit 0,50");
}
    
    
?>
<span style="Font-size:11px;">Last Updated: <?php echo date("Y-m-d H:i:s");?> </span>
<table style="font-size:12px;" border="1" cellpadding="3" cellspacing="0">
    <tr>
        <td>TxnId</td>
        <td>DateTime</td>
        <td>Recharge No</td>
        <td>Operator</td>
        <td>Amount</td>
        <td>OperatorID</td>
        <td>Status</td>
        <td>Credit</td>
        <td>Debit</td>
        <td>OldBalance</td>
        <td>NewBalance</td>
        <?php if ($_SESSION['USER']['balance']==0) { ?>
        <td>User</td>
        <?php } ?>
    </tr>
    <?php foreach($liveTransactions as $t) {
        $bgcolor="white";
        if ($t['txnstatus']=="SUCCESS" && $t['operatorid']=='0') {
            $bgcolor="#fcecbd";
        } 
        
        if ($t['txnstatus']=="SUCCESS" && $t['rechargeno']=='BALANCEUPDATE') {
                $bgcolor="#bde3fc";
             } 
        
        if ($t['txnstatus']=="REVERSED") {
            $bgcolor="blue;color:#fff";
        }
        if ($t['txnstatus']=="FAILURE") {
            $bgcolor="#fcc0bd";
        }
        ?>
    <tr style="background:<?php echo $bgcolor;?>">
        <td><?php echo $t['txnid'];?></td>
        <td><?php echo $t['txnon'];?></td>
        <td><?php echo $t['rechargeno'];?></td>
        <td><?php echo $t['operator'];?></td>
        <td style="text-align:right"><?php echo number_format($t['rechargeamt'],2);?></td>
        <td><?php echo $t['operatorid'];?></td>
        <td><?php echo $t['txnstatus'];?></td>
        <td style="text-align:right"><?php echo number_format($t['creditamt'],2);?></td>
        <td style="text-align:right"><?php echo number_format($t['debitamt'],2);?></td>
        <td style="text-align:right"><?php echo number_format($t['oldbalance'],2);?></td>
        <td style="text-align:right"><?php echo number_format($t['newbalance'],2);?></td>
        <?php if ($_SESSION['USER']['balance']==0) { ?>
        <td><?php echo $t['txnusername'];?></td>
        <?php } ?>

    </tr>
    <?php } ?>
</table>

<script>
    //setTimeout("location.href='dashboard.php?action=liveTransaction';",60000);
</script>