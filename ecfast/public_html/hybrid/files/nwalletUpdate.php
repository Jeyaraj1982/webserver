<h2>Wallet Update</h2>
 
 <?php
 
 if (isset($_POST['btnSendRequest'])) {
     $id = $mysql->insert("_walletupdaterequest",array("requestedon"=>date("Y-m-d H:i:s"),
                                                        "userid"=>$_SESSION['USER']['userid'],
                                                        "dateofpayment"=>$_POST['dtxn'],
                                                        "opid"=>$_POST['opid'],
                                                        "amount"=>$_POST['amount'],
                                                        "bankrefno"=>$_POST['refno']));
     if ($id>0) {
         echo successMessage("Request has been Sent");
     }
     

 }
 
  
 
 $requests = $mysql->select("select * from _walletupdaterequest as w,_operators as o where o.opid=w.opid and w.userid=".$_SESSION['USER']['userid']." order by w.requestid desc");
   
  $data = $mysql->select("select * from _operators order by optorder asc"); 
   
?>
<form action="" method="post">
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
    <tr style="background:#666;color:#fff;">
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <input type="text" name="dtxn" value="<?php echo date("Y-m-d");?>" readonly="readonly" style="width:80px">
        </td>
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <select name="opid">
                  <?php foreach($data as $d) { ?>
                    <option value="<?php echo $d['opid'];?>"><?php echo $d['operatorname'];?></option>
                  <?php }?>
            </select>
        </td>
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
             <input type="text" name="amount" value="" placeholder="Amount">
        </td>
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <input type="text" name="refno" value="" placeholder="Bank Txn/Ref No">
        </td>
        <td colspan="5" style="text-align: right;border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <input type="submit" value=" Send Request" name="btnSendRequest" >
        </td>
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
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['txnid'];?></td>
    </tr> 
    <?php } ?>
</table>
</form>