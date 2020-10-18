<h2>Manage Users</h2>
 <?php
     $users = $mysql->select("select * from _users where isunder=".$_SESSION['USER']['userid']);
     $total = 0;
 ?>
 <table style="font-size:12px;color:#333" cellpadding="5" cellspacing="0">
    <tr style="background:#e5e5e5;">
        <td>Customer</td>
        <td>E-Mail ID</td>
        <td>Password</td>
        <td>Phone Number</td>
        <td>Balance</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php foreach($users as $user) {
        $userbal = getVirtualBalance($user['userid']);
        $total +=$userbal; 
        ?>
    <tr>
        <td><?php echo $user['customername'];?></td>
        <td><?php echo $user['emailid'];?></td>
        <td><?php echo $user['password'];?></td>
        <td><?php echo $user['phoneno'];?></td>
        <td style="text-align: right"><?php echo number_format($userbal,2);?></td>
        <td><a href="dashboard.php?action=uoperatorWise&user=<?php echo $user['emailid'];?>">Operator View</a></td>
        <td><a href="dashboard.php?action=uliveTransaction&user=<?php echo $user['emailid'];?>">Live Transaction</a></td>
    </tr>
    <?php } ?>
    <tr style="background:#e5e5e5;font-weight: bold;">
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:right">Total</td>
        <td style="text-align:right;"><?php echo number_format($total,2);?></td>
        <td></td>
        <td></td>
    </tr>
 </table> 