<h2>Operator Wise Transaction </h2>
<?php
  $userdetails = $mysql->select("select * from _users where emailid='".$_REQUEST['user']."'");
  $data = $mysql->select("select * from _operators order by optorder asc");
?>
<table style="font-size:12px;color:#444" cellpadding="2" cellspacing="0">
    <tr style="background:#03AA03;color:#fff;font-weight:bold;">
        <td style="width:150px;padding:5px;">OPERATOR NAME</td>
        <td style="width:80px;padding:5px;">BALANCE</td>
        <td style=";padding-left:20px;padding-right:20px;">ALL</td>
        <td style=";padding-left:20px;padding-right:20px;">PENDING</td>
        <td style=";padding-left:20px;padding-right:20px;">SUCCESS</td>
        <td style=";padding-left:20px;padding-right:20px;">FAILURE</td>
        <td style=";padding-left:20px;padding-right:20px;">REVERSED</td>
    </tr>
    <?php foreach($data as $d) {
    
        $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _tbltransaction WHERE txnusername='".$_REQUEST['user']."' and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _tbltransaction WHERE txnusername='".$_REQUEST['user']."' and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _tbltransaction WHERE txnusername='".$_REQUEST['user']."' and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _tbltransaction WHERE txnusername='".$_REQUEST['user']."' and  txnstatus='REVERSED' AND operator='".$d['operatorname']."'  AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _tbltransaction WHERE txnusername='".$_REQUEST['user']."' and  txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
        
       
     ?>
    <tr>
        <td style="padding-left:5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $d['operatorname'];?></td>
        <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format(getVirtualBalanceOperatorWise($userdetails[0]['userid'],$d['operatorname']),2);?>
        </td>
         <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=utransaction&user=<?php echo $_REQUEST['user'];?>&operator=<?php echo $d['operatorname'];?>&filter=ALL"><?php echo $stats[0]['ALL'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=utransaction&user=<?php echo $_REQUEST['user'];?>&operator=<?php echo $d['operatorname'];?>&filter=PENDING"><?php echo $stats[0]['PENDING'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=utransaction&user=<?php echo $_REQUEST['user'];?>&operator=<?php echo $d['operatorname'];?>&filter=SUCCESS"><?php echo $stats[0]['SUCCESS'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222" href="dashboard.php?action=utransaction&user=<?php echo $_REQUEST['user'];?>&operator=<?php echo $d['operatorname'];?>&filter=FAILURE"><?php echo $stats[0]['FAILURE'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=utransaction&user=<?php echo $_REQUEST['user'];?>&operator=<?php echo $d['operatorname'];?>&filter=REVERSED"><?php echo $stats[0]['REVERSED'];?></a>
        </td>
    </tr>
    <?php } ?>
</table> 