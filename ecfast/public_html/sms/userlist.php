<?php 
    include_once("header.php"); 

    $user = $mysql->select("select * from _user where userunder=".$_SESSION['user']['id']);
?>

<table width="100%" cellpadding="5" border="1" cellspacing="0" style="font-family:arial;font-size:13px;color:#555;">
    <tr style="text-align: center;font-weight:bold;background:#f1f1f1;">
        <td>Person Name</td>
        <td>Mobile Number</td>
        <td>Email ID</td>
        <td>Login Password</td>
        <td>Created On</td>
        <td>Available Credits</td>
        <td>Sender's IDs</td>
        <td>IS API</td>
        <td>IS PANEL</td>
        <td>&nbsp;</td>
    </tr>
  <?php foreach($user as $u) { ?> 
    <tr>
        <td><?php echo $u['personname']; ?></td>
        <td><?php echo $u['phonenumber']; ?></td>
        <td><?php echo $u['emailid']; ?></td>
        <td><?php echo $u['loginpassword']; ?></td>
        <td><?php echo $u['createdon']; ?></td>
        <td style="text-align:right"><?php echo checkCredits($u['id']); ?></td>
        <td>
            <?php
                    $senderids = $mysql->select("select * from _senderid where userid=".$u['id']);
                    foreach($senderids as $id) {
                        if ($id['isapproved']==0) {
                            echo "<span style='color:red'>".$id['senderid']."</span>,";
                        } else {
                            echo $id['senderid'].",";    
                        }
                        
                    }
            ?>
        
        </td>
        <td style="text-align:center"><img src="images/<?php echo ($u['isenableapi']) ? 'check.png' : 'uncheck.png'; ?>"></td>
        <td style="text-align:center"><img src="images/<?php echo ($u['isenablepanel']) ? 'check.png' : 'uncheck.png'; ?>"></td>
        <td><a href="edituser.php?wpage=edituser&id=<?php echo $u['id']; ?>">Edit</a></td>
    </tr>
  <?php } ?>
</table>