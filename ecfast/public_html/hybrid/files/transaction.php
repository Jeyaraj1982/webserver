<h2>Transaction</h2>
<?php
if ($_SESSION['USER']['balance']==0) {
    
    if ($_REQUEST['filter']=="ALL") {
        $liveTransactions= $mysql->select("select * from _tbltransaction where operator='".$_REQUEST['operator']."' and userid='".$_SESSION['USER']['userid']."' order by txnid desc");    
    }

    if ($_REQUEST['filter']=="SUCCESS") {
        $liveTransactions= $mysql->select("select * from _tbltransaction where txnstatus='SUCCESS' and operator='".$_REQUEST['operator']."' and userid='".$_SESSION['USER']['userid']."' order by txnid desc");    
    }
    
    if ($_REQUEST['filter']=="PENDING") {                                                     
        $liveTransactions= $mysql->select("select * from _tbltransaction where  txnstatus='SUCCESS' and operatorid='0' and operator='".$_REQUEST['operator']."' and userid='".$_SESSION['USER']['userid']."' order by txnid desc");    
        $pending=true;
    }
    
    if ($_REQUEST['filter']=="FAILURE") {
        $liveTransactions= $mysql->select("select * from _tbltransaction where txnstatus='FAILURE' and operator='".$_REQUEST['operator']."' and userid='".$_SESSION['USER']['userid']."' order by txnid desc");    
    }
    
    if ($_REQUEST['filter']=="REVERSED") {
        $liveTransactions= $mysql->select("select * from _tbltransaction where txnstatus='REVERSED' and operator='".$_REQUEST['operator']."' and userid='".$_SESSION['USER']['userid']."' order by txnid desc");    
    }
    
} else {
    
    //txnusername='".."' userid
     $users = $mysql->select("select * from _users where emailid='".$_REQUEST['user']."'");
     
    if ($_REQUEST['filter']=="ALL") {
        $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid='".$users[0]['userid']."' and operator='".$_REQUEST['operator']."' and userid=".$_SESSION['USER']['userid']." order by txnid desc");
    }

    if ($_REQUEST['filter']=="SUCCESS") {
        $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid='".$users[0]['userid']."' and txnstatus='SUCCESS' and operator='".$_REQUEST['operator']."' and userid=".$_SESSION['USER']['userid']." order by txnid desc");
    }
    
    if ($_REQUEST['filter']=="PENDING") {
        $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid='".$users[0]['userid']."' and txnstatus='SUCCESS' and operatorid='0' and operator='".$_REQUEST['operator']."' and userid=".$_SESSION['USER']['userid']." order by txnid desc");
        //echo "select * from _virtualtbltransaction where txnusername='".$_REQUEST['user']."' and txnstatus='SUCCESS' and  and operatorid='0' and operator='".$_REQUEST['operator']."' and userid=".$_SESSION['USER']['userid']." order by txnid desc";
    }
    
    if ($_REQUEST['filter']=="FAILURE") {
        $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid='".$users[0]['userid']."' and txnstatus='FAILURE' and operator='".$_REQUEST['operator']."' and userid=".$_SESSION['USER']['userid']." order by txnid desc");
    }
    
    if ($_REQUEST['filter']=="REVERSED") {
        $liveTransactions= $mysql->select("select * from _virtualtbltransaction where userid='".$users[0]['userid']."' and txnstatus='REVERSED' and operator='".$_REQUEST['operator']."' and userid=".$_SESSION['USER']['userid']." order by txnid desc");
    }
    
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
        <?php if ($_SESSION['USER']['balance']==0) { ?>
        <td>User</td>
        <?php } ?>
        <td>OldBalance</td>
        <td>NewBalance</td>
        <?php if ($pending) {?>
         <td> </td>
        <?php } ?>
    </tr>
    <?php foreach($liveTransactions as $t) {
        
         $bgcolor="white";
         if ($_REQUEST['filter']=="ALL")  {
             if ($t['txnstatus']=="SUCCESS" && $t['operatorid']=='0') {
                $bgcolor="#fcecbd";
             }
             
             if ($t['txnstatus']=="FAILURE" && $t['operatorid']=='0') {
                $bgcolor="#fcc0bd";
             }
             if ($t['txnstatus']=="REVERSED") {
                 $bgcolor="blue;color:#fff";
             }
            
             if ($t['txnstatus']=="SUCCESS" && $t['rechargeno']=='BALANCEUPDATE') {
                $bgcolor="#bde3fc";
             }
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
        <?php if ($_SESSION['USER']['balance']==0) { ?>
        <td><?php echo $t['txnusername'];?></td>
        <?php } ?>
        <td style="text-align:right"><?php echo number_format($t['oldbalance'],2);?></td>
        <td style="text-align:right"><?php echo number_format($t['newbalance'],2);?></td>
        
        <?php if ($pending) {?>
         <td>
         <?php
         $resultData = txnStatus($t['txnid'],$_SESSION['USER']);
        // echo $resultData->errormessage;
         if (isset($resultData->errorcode) && $resultData->errormessage=="INVALID TXN ID" ) {
             echo " FAILED";
              $url = "http://hybrid.onlinej2j.com/api/_updatetxnid.php?status=REVERSED&usertxnid=". $t['txnid']."&txnid=".$resultData->txnid;
              echo "<Br>-".file_get_contents($url); 
         } else {
              echo "operatorid:".$resultData->operatorid;
              if (strlen($resultData->operatorid)>5) {
              $url = "http://hybrid.onlinej2j.com/api/_updatetxnid.php?status=SUCCESS&usertxnid=".$t['txnid']."&operatorid=".$resultData->operatorid."&txnid=".$resultData->txnid;
              echo "<Br>-".file_get_contents($url); 
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