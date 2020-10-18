<h2>Operator Wise Transaction </h2>
 
<?php
   
   //print_r($data);
   if (isset($_REQUEST['operator'])) {
       $oper = $mysql->select("select * from _operators where operatorname='".$_REQUEST['operator']."'");
       if ($oper[0]['onoff']==1) {
           $mysql->execute("update _operators set onoff='0' where operatorname='".$_REQUEST['operator']."'");
           echo "<script>alert('".$_REQUEST['operator']." : OFF SUCCESSFULLY');</script>";
       }
       
       if ($oper[0]['onoff']==0) {
           $mysql->execute("update _operators set onoff='1' where operatorname='".$_REQUEST['operator']."'");
           echo "<script>alert('".$_REQUEST['operator']." : ON SUCCESSFULLY');</script>";
       }
       
       if ($oper[0]['onoff']==2) {
            
           echo "<script>alert('".$_REQUEST['operator']." : Not Ready. Please Contact Administrator');</script>";
       }
   }
  
   $total=0;
?>
<table style="font-size:12px;color:#444" cellpadding="2" cellspacing="0">
    <tr style="background:#03AA03;color:#fff;font-weight:bold;text-align:center;">
        <td style="width:250px;padding:5px;">OPERATOR NAME</td>
        <td style="width:80px;padding:5px;">BALANCE</td>
        <?php if ($_SESSION['USER']['isreseller']==1) {?>
        <td style="padding:5px;">ON/OFF</td>
        <?php } ?>
        <td style=";padding-left:20px;padding-right:20px;">ALL</td>
        <td style=";padding-left:20px;padding-right:20px;">PENDING</td>
        <td style=";padding-left:20px;padding-right:20px;">SUCCESS</td>
        <td style=";padding-left:20px;padding-right:20px;">FAILURE</td>
        <td style=";padding-left:20px;padding-right:20px;">REVERSED</td>
    </tr>
  
    <?php $data = $mysql->select("select * from _operators where optgroup=1 order by optorder asc"); ?>  
    <tr><td colspan="8" style="background:#444;font-weight:bold;color:#fff;">Prepaid Operator</td></tr>
    
    <?php foreach($data as $d) { 
        
        if ($_SESSION['USER']['balance']==0) {
    $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
        } else {
              $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
               } 
        $balance =  getVirtualBalanceOperatorWise($_SESSION['USER']['userid'],$d['operatorname']);
        $total += $balance;
        
         if ($_SESSION['USER']['isreseller']==1) {
           $filteruser="";  
         } else {
           $filteruser = "&user=".$_SESSION['USER']['emailid']." ";
         }
         
         
        ?>
    <tr>
        <td style="padding-left:5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $d['operatorname'];?></td>
        <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format($balance,2);?>
        </td>
        <?php if ($_SESSION['USER']['isreseller']==1) {?>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:center">
        
        <?php if ($d['onoff']==1) {?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/on.png" title="Service On. Click to Service Off"></a>
        <?php } elseif ($d['onoff']==0) { ?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/off.png" title="Service is Off. Click to Service On"></a>
        <?php } else { ?>
        <img src="assets/images/off.png" title="Service Not Ready" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);cursor:pointer" onclick="alert('Service Not Ready. Please Contact Administrator')">
        <?php } ?>
        
        </td>
        <?php } ?>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=ALL"><?php echo $stats[0]['ALL'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['PENDING']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=PENDING"><?php echo $stats[0]['PENDING'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['SUCCESS']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=SUCCESS"><?php echo $stats[0]['SUCCESS'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['FAILURE']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=FAILURE"><?php echo $stats[0]['FAILURE'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['REVERSED']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=REVERSED"><?php echo $stats[0]['REVERSED'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>    
    
    
    
    
      <?php
           $data = $mysql->select("select * from _operators where optgroup=2 order by optorder asc");
      ?>  
    <tr>
        <td colspan="8" style="background:#444;font-weight:bold;color:#fff;">DTH Operator</td>
    </tr>
    <?php foreach($data as $d) { 
        
        if ($_SESSION['USER']['balance']==0) {
    $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
        } else {
              $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
               } 
        $balance =  getVirtualBalanceOperatorWise($_SESSION['USER']['userid'],$d['operatorname']);
        $total += $balance;
        
         if ($_SESSION['USER']['isreseller']==1) {
           $filteruser="";  
         } else {
           $filteruser = "&user=".$_SESSION['USER']['emailid']." ";
         }
         
         
        ?>
    <tr>
        <td style="padding-left:5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $d['operatorname'];?></td>
        <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format($balance,2);?>
        </td>
        <?php if ($_SESSION['USER']['isreseller']==1) {?>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:center">
        
        <?php if ($d['onoff']==1) {?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/on.png" title="Service On. Click to Service Off"></a>
        <?php } elseif ($d['onoff']==0) { ?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/off.png" title="Service is Off. Click to Service On"></a>
        <?php } else { ?>
        <img src="assets/images/off.png" title="Service Not Ready" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);cursor:pointer" onclick="alert('Service Not Ready. Please Contact Administrator')">
        <?php } ?>
        
        </td>
        <?php } ?>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=ALL"><?php echo $stats[0]['ALL'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['PENDING']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=PENDING"><?php echo $stats[0]['PENDING'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['SUCCESS']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=SUCCESS"><?php echo $stats[0]['SUCCESS'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['FAILURE']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=FAILURE"><?php echo $stats[0]['FAILURE'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['REVERSED']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=REVERSED"><?php echo $stats[0]['REVERSED'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
    </tr>
    <?php } ?> 
    
    
    
      <?php
           $data = $mysql->select("select * from _operators where optgroup=3 order by optorder asc");
      ?>  
    <tr>
        <td colspan="8" style="background:#444;font-weight:bold;color:#fff;">Postpaid Operator</td>
    </tr>
    <?php foreach($data as $d) { 
        
        if ($_SESSION['USER']['balance']==0) {
    $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
        } else {
              $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
               } 
        $balance =  getVirtualBalanceOperatorWise($_SESSION['USER']['userid'],$d['operatorname']);
        $total += $balance;
        
         if ($_SESSION['USER']['isreseller']==1) {
           $filteruser="";  
         } else {
           $filteruser = "&user=".$_SESSION['USER']['emailid']." ";
         }
         
         
        ?>
    <tr>
        <td style="padding-left:5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $d['operatorname'];?></td>
        <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format($balance,2);?>
        </td>
        <?php if ($_SESSION['USER']['isreseller']==1) {?>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:center">
        
        <?php if ($d['onoff']==1) {?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/on.png" title="Service On. Click to Service Off"></a>
        <?php } elseif ($d['onoff']==0) { ?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/off.png" title="Service is Off. Click to Service On"></a>
        <?php } else { ?>
        <img src="assets/images/off.png" title="Service Not Ready" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);cursor:pointer" onclick="alert('Service Not Ready. Please Contact Administrator')">
        <?php } ?>
        
        </td>
        <?php } ?>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=ALL"><?php echo $stats[0]['ALL'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['PENDING']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=PENDING"><?php echo $stats[0]['PENDING'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['SUCCESS']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=SUCCESS"><?php echo $stats[0]['SUCCESS'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['FAILURE']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=FAILURE"><?php echo $stats[0]['FAILURE'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['REVERSED']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=REVERSED"><?php echo $stats[0]['REVERSED'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>   
    
    <?php
           $data = $mysql->select("select * from _operators where optgroup=4 order by optorder asc");
      ?>  
    <tr>
        <td colspan="8" style="background:#444;font-weight:bold;color:#fff;">Ticket Booking</td>
    </tr>
    <?php foreach($data as $d) { 
        
        if ($_SESSION['USER']['balance']==0) {
    $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
        } else {
              $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
               } 
        $balance =  getVirtualBalanceOperatorWise($_SESSION['USER']['userid'],$d['operatorname']);
        $total += $balance;
        
         if ($_SESSION['USER']['isreseller']==1) {
           $filteruser="";  
         } else {
           $filteruser = "&user=".$_SESSION['USER']['emailid']." ";
         }
         
         
        ?>
    <tr>
        <td style="padding-left:5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $d['operatorname'];?></td>
        <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format($balance,2);?>
        </td>
        <?php if ($_SESSION['USER']['isreseller']==1) {?>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:center">
        
        <?php if ($d['onoff']==1) {?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/on.png" title="Service On. Click to Service Off"></a>
        <?php } elseif ($d['onoff']==0) { ?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/off.png" title="Service is Off. Click to Service On"></a>
        <?php } else { ?>
        <img src="assets/images/off.png" title="Service Not Ready" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);cursor:pointer" onclick="alert('Service Not Ready. Please Contact Administrator')">
        <?php } ?>
        
        </td>
        <?php } ?>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=ALL"><?php echo $stats[0]['ALL'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['PENDING']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=PENDING"><?php echo $stats[0]['PENDING'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['SUCCESS']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=SUCCESS"><?php echo $stats[0]['SUCCESS'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['FAILURE']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=FAILURE"><?php echo $stats[0]['FAILURE'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['REVERSED']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=REVERSED"><?php echo $stats[0]['REVERSED'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>   
  
    <?php
           $data = $mysql->select("select * from _operators where optgroup=5 order by optorder asc");
      ?>  
    <tr>
        <td colspan="8" style="background:#444;font-weight:bold;color:#fff;">Electricity Operators</td>
    </tr>
    <?php foreach($data as $d) { 
        
        if ($_SESSION['USER']['balance']==0) {
    $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _tbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
        } else {
              $stats =     $mysql->select("SELECT * FROM 
(SELECT COUNT(*) AS `ALL` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and operator='".$d['operatorname']."' AND revtxnid=0) AS t1,
(SELECT COUNT(*) AS `SUCCESS` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND operator='".$d['operatorname']."') AS t2,
(SELECT COUNT(*) AS `FAILURE` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='FAILURE' AND operator='".$d['operatorname']."') AS t3,
(SELECT COUNT(*) AS `REVERSED` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and  txnstatus='REVERSED' AND operator='".$d['operatorname']."' AND revtxnid>0) AS t4,
(SELECT COUNT(*) AS `PENDING` FROM _virtualtbltransaction WHERE userid=".$_SESSION['USER']['userid']." and txnstatus='SUCCESS' AND  operatorid='0'  AND operator='".$d['operatorname']."') AS t5");
               } 
        $balance =  getVirtualBalanceOperatorWise($_SESSION['USER']['userid'],$d['operatorname']);
        $total += $balance;
        
         if ($_SESSION['USER']['isreseller']==1) {
           $filteruser="";  
         } else {
           $filteruser = "&user=".$_SESSION['USER']['emailid']." ";
         }
         
         
        ?>
    <tr>
        <td style="padding-left:5px;border-left:1px solid #e5e5e5;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5"><?php echo $d['operatorname'];?></td>
        <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format($balance,2);?>
        </td>
        <?php if ($_SESSION['USER']['isreseller']==1) {?>
        <td style="border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5;text-align:center">
        
        <?php if ($d['onoff']==1) {?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/on.png" title="Service On. Click to Service Off"></a>
        <?php } elseif ($d['onoff']==0) { ?>
        <a href="dashboard.php?action=operatorWise&operator=<?php echo $d['operatorname'];?>"><img src="assets/images/off.png" title="Service is Off. Click to Service On"></a>
        <?php } else { ?>
        <img src="assets/images/off.png" title="Service Not Ready" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);cursor:pointer" onclick="alert('Service Not Ready. Please Contact Administrator')">
        <?php } ?>
        
        </td>
        <?php } ?>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=ALL"><?php echo $stats[0]['ALL'];?></a>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['PENDING']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=PENDING"><?php echo $stats[0]['PENDING'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['SUCCESS']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=SUCCESS"><?php echo $stats[0]['SUCCESS'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['FAILURE']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=FAILURE"><?php echo $stats[0]['FAILURE'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
        <td style="padding-left:15px;padding-right:15px;text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
            <?php if ($stats[0]['REVERSED']>0) {?>
                <a style="color:#222;" href="dashboard.php?action=transaction&operator=<?php echo $d['operatorname'].$filteruser;?>&filter=REVERSED"><?php echo $stats[0]['REVERSED'];?></a>
            <?php } else {?>
                <span style="color:#999">0</span>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>   
    
        
    <tr>
        <td></td>
         <td style="text-align:right;padding-right:5px;border-right:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5">
        <?php echo number_format($total,2);?>
        </td>
    </tr>
</table> 