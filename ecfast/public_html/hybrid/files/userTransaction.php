<h2>User Transactions</h2>
<?php
    $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid=".$_SESSION['USER']['userid']." order by txnid desc");
?>
<span style="Font-size:11px;">Last Updated: <?php echo date("Y-m-d H:i:s");?> </span>
<table style="font-size:12px;" border="1" cellpadding="3" cellspacing="0">
    <tr>
        <td>TxnId</td>
        <td>DateTime</td>
      
        <td>Operator</td>
        <td>Amount</td>
        <td>OperatorID</td>
        <td>remarks</td>
        <td>Status</td>
        <td>Credit</td>
        <td>Debit</td>
        
        <td>OldBalance</td>
        <td>NewBalance</td>
    </tr>
    <?php foreach($liveTransactions as $t) {
        
         $bgcolor="white";
         if (isset($_REQUEST['filter']) && $_REQUEST['filter']=="ALL")  {
             
             if ($t['txnstatus']=="SUCCESS" && $t['operatorid']=='0') {
                $bgcolor="#fcecbd";
             }
             
             if ($t['txnstatus']=="FAILURE" && $t['operatorid']=='0') {
                $bgcolor="#fcc0bd";
             }
            
             if ($t['txnstatus']=="SUCCESS" && $t['rechargeno']=='BALANCEUPDATE') {
                $bgcolor="#bde3fc";
             }
         }
        ?>
    <tr style="background:<?php echo $bgcolor;?>">
        <td><?php echo $t['txnid'];?></td>
        <td><?php echo $t['txnon'];?></td>
       
        <td><?php echo $t['operator'];?></td>
        <td style="text-align:right"><?php echo number_format($t['rechargeamt'],2);?></td>
        <td><?php echo $t['operatorid'];?></td>
        <td><?php echo $t['apiresponse'];?></td>
        <td><?php echo $t['txnstatus'];?></td>
        <td style="text-align:right"><?php echo number_format($t['creditamt'],2);?></td>
        <td style="text-align:right"><?php echo number_format($t['debitamt'],2);?></td>
        
        <td style="text-align:right"><?php echo number_format($t['oldbalance'],2);?></td>
        <td style="text-align:right"><?php echo number_format($t['newbalance'],2);?></td>
    </tr>
    <?php } ?>
</table>