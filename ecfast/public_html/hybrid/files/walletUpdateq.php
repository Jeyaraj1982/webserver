<h2>Wallet Update</h2>
<?php
 
  if (isset($_POST['QbtnApprove'])) {
    // $req = $mysql->select("select * from _walletupdaterequest  where requestid=".$_POST['requestid']);
     
     $requests = $mysql->select("select * from _walletupdaterequest as w,_operators as o where o.opid=w.opid and  w.requestid=".$_POST['requestid']);
     
     $toID = $mysql->select("select * from _users where userid='".$requests[0]['userid']."'");
    
    //$adminBalance = getVirtualBalance($_SESSION['USER']['userid']);
    //$mysql->insert("_virtualtbltransaction",array("userid"      => $_SESSION['USER']['userid'],
                                                  //"txnon"       => date("Y-m-d H:i:s"),
                                                  //"rechargeno"  => "BALANCEUPDATE",
                                                  //"operator"    => $_POST['operator'],
                                                  //"rechargeamt" => $_POST['rechargeamt'],
                                                  //"operatorid"  => $_POST['narration'],
                                                  //"apiresponse" => "CREDIT To ".$_POST['userid'],
                                                  //"remarks"     => $_POST['adminRef'],
                                                  //"oldbalance"  => $adminBalance,
                                                  //"newbalance"  => $adminBalance-$_POST['rechargeamt'],
                                                  //"txnstatus"   => "SUCCESS",
                                                  //"apiurl"      => " ",
                                                  //"revtxnid"    => " ",
                                                  //"creditamt"   => '0',
                                                  //"debitamt"    => $_POST['rechargeamt'],
                                                  //"usertxnid"   => 0));
      
      //$userBalance = getVirtualBalance($toID[0]['userid']);
      $userBalance = getVirtualBalanceOperatorWise($toID[0]['userid'],trim($requests[0]['operatorname']));
      
      $txnid = $mysql->insert("_tbltransaction",array("userid"      => $toID[0]['userid'],
                                                      "txnon"       => date("Y-m-d H:i:s"),
                                                      "rechargeno"  => "BALANCEUPDATE",
                                                      "operator"    => $requests[0]['operatorname'],
                                                      "rechargeamt" => $requests[0]['amount'],
                                                      "operatorid"  => $requests[0]['bankrefno'],
                                                      "apiresponse" => $requests[0]['bankrefno'],
                                                      "remarks"     => $requests[0]['bankrefno'],
                                                      "oldbalance"  => $userBalance,
                                                      "newbalance"  => $userBalance+$_POST['transferamt'],
                                                      "txnstatus"   => "SUCCESS",
                                                      "apiurl"      => " ",
                                                      "revtxnid"    => " ",
                                                      "creditamt"   => $_POST['transferamt'],
                                                      "debitamt"    => '0',
                                                      "usertxnid"   => 0));
      
      $mysql->execute("update _walletupdaterequest set credited='".$_POST['transferamt']."', approvedon='".date("Y-m-d H:i:s")."', balance='".($userBalance+$_POST['transferamt'])."', txnid='".$txnid."' where requestid=".$_POST['requestid']);
      
                                                  
      echo "Successfully Transfered";
      
  }
 
 $requests = $mysql->select("select * from _walletupdaterequest as w,_operators as o where o.opid=w.opid and w.userid=".$_SESSION['USER']['userid']." order by w.requestid desc");
   
   
?>
 
<table style="font-size:12px;color:#444;width:100%;" cellpadding="2" cellspacing="0">
     <tr style="background:#03AA03;color:#fff;font-weight:bold;">
        <td style="padding:5px">Txn On</td>
        <td style="padding:5px">Operator</td>
        <td style="padding:5px">Amount</td>
        <td style="padding:5px">Bank Ref</td>
         <td style="padding:5px">Requested</td>
        <td style="padding:5px">Approved On</td>
        <td style="padding:5px">Rejected On</td>
        <td style="padding:5px">Balance</td>
        <td style="padding:5px">Txn ID</td>
    </tr> 
    <?php foreach($requests as $r) {?>
     <tr style="background:<?php echo ($r['txnid']>0) ? 'lightgreen' : '#f9f9f9';?>">
        <td style="border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding-left:6px;"><?php echo $r['dateofpayment'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding-left:6px;"><?php echo $r['operatorname'];?></td>
        <td style="text-align:right;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo number_format($r['amount'],2);?>&nbsp;</td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding-left:6px;"><?php echo $r['bankrefno'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['requestedon'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['approvedon'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['rejectedon'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:right"><?php echo number_format($r['balance'],2);?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php
            if ($r['txnid']==0) {?>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $r['requestid'];?>" name="requestid">
                    <input type="text" value="" name="transferamt">
                    <input type="submit" value="Approve" name="QbtnApprove">
                </form>
            <?php } else {        ?>
                      <?php echo $r['txnid']; ?>
            <?php } ?>
        
        
        </td>
    </tr> 
    <?php } ?>
</table>
 