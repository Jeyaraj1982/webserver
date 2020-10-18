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
   $ctotalPaid = 0;
   $ctotalCredited = 0;
   
   $ftotalPaid = 0;
   $ftotalCredited = 0; 
   
   $btotalPaid = 0;
   $btotalCredited = 0;
   
   $unctotalPaid = 0;
   $unctotalCredited = 0;
?>
<div id="qw1" style=";margin-bottom:5px;">

</div>
<b>Requests</b>  
<form action="" method="post">
<table style="font-size:12px;color:#444;width:100%;" cellpadding="2" cellspacing="0">
     <tr style="background:#03AA03;color:#fff;font-weight:bold;">
        <td style="padding:5px;;width:70px">Txn On</td>
        <td style="padding:5px;width:125px">Operator</td>
        <td style="padding:5px;width:70px;">Amount</td>
        <td style="padding:5px;width:125px;">Bank Ref</td>
         <td style="padding:5px;width:105px;">Requested</td>
        <td style="padding:5px;width:105px;">Approved On</td>
        <td style="padding:5px;">Rejected On</td>
        <td style="padding:5px;width:70px;">Balance</td>
        <td style="padding:5px;width:70px;">Credited</td>
        <td style="padding:5px;width:70px;">Txn ID</td>
    </tr> 
    <tr style="background:#666;color:#fff;">
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <input type="text" name="dtxn" value="<?php echo date("Y-m-d");?>" readonly="readonly" style="width:75px">
        </td>
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <select name="opid" style="width:130px">
                  <?php foreach($data as $d) { ?>
                    <option value="<?php echo $d['opid'];?>"><?php echo $d['operatorname'];?></option>
                  <?php }?>
            </select>
        </td>
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
             <input type="text" name="amount" value="" placeholder="Amount" style="width: 75px;">
        </td>
        <td style="border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <input type="text" name="refno" value="" placeholder="Bank Txn/Ref No" style="width:125px;">   
        </td>
        <td colspan="6" style="text-align: right;border-right:1px solid #666;border-bottom:1px solid #e5e5e5">
            <input type="submit" value=" Send Request" name="btnSendRequest" >
        </td>
    </tr> 
    <?php foreach($requests as $r) {
        if ($r['txnid']>0) {
            
            if ($r['bankrefno']=='OldLapuOutStanding') {
                $ftotalPaid+= $r['amount'];
                $ftotalCredited+= $r['credited'];
            }
            
            if ($r['bankrefno']!='OldLapuOutStanding') {
                $ctotalPaid+= $r['amount'];
                $ctotalCredited+= $r['credited'];
            }
        } else {
              $unctotalPaid+= $r['amount'];
              $unctotalPaid+= $r['credited'];
        }

        ?>
     <tr style="background:<?php echo ($r['txnid']>0) ? 'lightgreen' : '#f9f9f9';?>">
        <td style="border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding-left:6px;"><?php echo $r['dateofpayment'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding-left:6px;"><?php echo $r['operatorname'];?></td>
        <td style="text-align:right;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo number_format($r['amount'],2);?>&nbsp;</td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;padding-left:6px;"><?php echo $r['bankrefno'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['requestedon'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['approvedon'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['rejectedon'];?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:right"><?php echo number_format($r['balance'],2);?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:right"><?php echo number_format($r['credited'],2);?></td>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $r['txnid'];?></td>
    </tr> 
    <?php } ?>
  
    
</table>
<div style="display: none;" id="qw">
<b>Statistics</b>   
<table style="font-size:12px;color:#444;width:100%;border:1px solid #03AA03" cellpadding="2" cellspacing="0">
     <tr style="background:#03AA03;color:#fff;font-weight:bold;">
        <td style="padding:5px;;width:195px">Wallet</td>
        <td style="padding:5px;width:70px;">Paid</td>
        <td style="padding:5px;width:125px;">Mode</td>
         <td style="padding:5px;width:105px;">Requested</td>
        <td style="padding:5px;width:105px;">Approved On</td>
        <td style="padding:5px;">Rejected On</td>
        <td style="padding:5px;width:70px;">Balance</td>
        <td style="padding:5px;width:70px;">Credited</td>
        <td style="padding:5px;width:70px;">Profit</td>
    </tr> 
 
    <tr>
        <td>Migrate</td>
        <td style="text-align: right;"><?php echo number_format($ftotalPaid,2);?></td>
        <td>OldLapuOutStanding</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right;"><?php echo number_format($ftotalCredited,2);?></td>  
        <td style="text-align: right;"><?php echo number_format($ftotalCredited-$ftotalPaid,2);?></td>  
    </tr>
    <tr>
        <td>Comm Transfer (Pre/dth/data)</td>
        <td style="text-align: right;"><?php echo number_format($ctotalPaid,2);?></td>
        <td>BANK TRANSFER</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right;"><?php echo number_format($ctotalCredited,2);?></td>  
        <td style="text-align: right;"><?php echo number_format($ctotalCredited-$ctotalPaid,2);?></td>  
    </tr>
    <tr>
        <td>Bill Transfer (postpaid/landline)</td>
        <td style="text-align: right;"><?php echo number_format($btotalPaid,2);?></td>
        <td>BANK TRANSFER</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right;"><?php echo number_format($btotalCredited,2);?></td>  
        <td style="text-align: right;"><?php echo number_format($btotalCredited-$btotalPaid,2);?></td>  
    </tr>    
    <tr>
        <td>UnCleared</td>
        <td style="text-align: right;"><?php echo number_format($unctotalPaid,2);?></td>
        <td>BANK TRANSFER</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right;"></td>  
        <td style="text-align: right;"></td>  
    </tr>
    </table>
</div>
</form>

<script>
setTimeout("qws()",1000);
    function qws () {
        document.getElementById('qw1').innerHTML  = document.getElementById('qw').innerHTML;
    }
</script>
