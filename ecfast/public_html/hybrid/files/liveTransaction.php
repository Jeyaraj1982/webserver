<h2>Live Transaction</h2>
<?php
if (!(isset($_SESSION['USER']) && $_SESSION['USER']['userid']>0)) {
    echo "<script>location.href=index.php;</script>";
}
if ($_SESSION['USER']['balance']==0) {     
    $liveTransactions= $mysql->select("select * from _tbltransaction where userid='".$_SESSION['USER']['userid']."' order by txnid desc limit 0,50");
    $pending=true;
} else {
    $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid=".$_SESSION['USER']['userid']." order by txnid desc limit 0,50");
    $pending=false;       
}
if (isset($_POST['restart']) && $_POST['restart']==1) {
    echo "<script>alert('System Checked, No issues found. So system restart request not accept at this time.');</script>";
}
?>
<?php if ($_SESSION['USER']['balance']==0) { ?>
<script>
    function lapuRestartAll() {
       var r = confirm("Are you want to restart all lapu machines ?");
       if (r == true) {
           document.getElementById("restartfrm").submit();
        } 
        return;
    }
</script>
<!--<div style="text-align:right;">
<form action="" method="post" id="restartfrm">
    <input type="hidden" value="1" name="restart">
</form>
   <a href="javascript:void(0)" onclick="lapuRestartAll()"><img src="images/restart.jpg" width="48" title="Restart All lapu machines"></a>
</div>-->
<?php } ?>  
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
         <?php   if ($pending) { ?>
         <td>IF PENDING</td>
         <?php } ?>
    </tr>
    <?php foreach($liveTransactions as $t) {
        $bgcolor="white";
        
        if ($t['txnstatus']=="SUCCESS" && $t['operatorid']=='0') {
            $bgcolor="#fcecbd";
        } 
        
        if ($t['txnstatus']=="REVERSED") {
            $bgcolor="blue;color:#fff";
        }
        if ($t['txnstatus']=="SUCCESS" && $t['rechargeno']=='BALANCEUPDATE') {
                $bgcolor="#bde3fc";
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
        
         <?php   if ($pending) { ?>
         <td>
         <?php
       
         if ($t['txnstatus']=='SUCCESS' && $t['operatorid']=='0') {
             
             $resultData = txnStatus($t['txnid'],$_SESSION['USER']);
         
            if (isset($resultData->errorcode) && $resultData->errormessage=="INVALID TXN ID" ) {
                echo "PENDING"; //failure
            } else {
                echo "operatorid:".$resultData->operatorid;
            }
         
         }
            
         ?>
         </td>
         <?php } ?>
        

    </tr>
    <?php } ?>
</table>

<script>
    //setTimeout("location.href='dashboard.php?action=liveTransaction';",60000);
</script>