<h2 style="text-align: left;font-family: arial;">Withdrawal Request</h2>
<div style="border-bottom:1px solid #D4E3F6;"></div><br>
 <a href="sendrequest">New Request</a>
 <br>  <br> 
 <table width="100%" cellpadding="3" cellspacing="0" style="font-family: arial;font-size:12px;">
    <tr bgcolor="#f5f5f5"  style="font-weight: bold;text-align: center;">
        <td width="60" style="border: 1px solid #ccc;">ID</td>
        <td width="120" style="border:1px solid #ccc">Date</td>
        <td width="180" style="border:1px solid #ccc">Request Title</td>
        <td style="border:1px solid #ccc">Description</td>
         
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    
    <tr bgcolor="#f5f5f5">
        <td colspan="4"  style="font-weight: bold;border:1px solid #ccc">Open Request(s)</td>
    </tr>
    
 <?php
    $data = $mysql->select("select * from _servicerequest where requeststats='open' and clientid=".$_SESSION['user']['id']." order by id desc limit 0,10");
    
?>
<?php
    foreach($data as $d) {
        ?>
       <tr>
        <td valign="top"><?php echo $d['id'];?></td>
        <td valign="top"><?php echo $d['postedon'];?></td> 
        <td valign="top"><div><?php echo $d['requesttitle'];?></div></td>
        <td valign="top"><div><?php echo $d['description'];?></div></td>  
       </tr> 
        <?php
    }
?>
<?php
    if (sizeof($data)==0) {
        ?>
        <tr >
        <td colspan="4" align="center">No Records Found</td>
    </tr>
        <?php
    }
?>
<tr bgcolor="#f5f5f5">
 <td colspan="4" style="font-weight: bold;border:1px solid #ccc">Closed Request(s)</td>
  </tr> 
<?php
    $data = $mysql->select("select * from _servicerequest where requeststats='closed' and clientid=".$_SESSION['user']['id']." order by id desc limit 0,5");
?>


<?php
    foreach($data as $d) {
        ?>
       <tr>
        <td valign="top"><?php echo $d['id'];?></td>
        <td valign="top"><?php echo $d['postedon'];?></td> 
        <td valign="top"><div><?php echo $d['requesttitle'];?></div></td>
        <td valign="top"><div><?php echo $d['description'];?></div></td>  
       </tr> 
        <?php
    }
?>
<?php
    if (sizeof($data)==0) {
        ?>
        <tr >
        <td colspan="4" align="center">No Records Found</td>
    </tr>
        <?php
    }
?>
</table>
<br>      
<div style="border-bottom:1px solid #D4E3F6;"></div>