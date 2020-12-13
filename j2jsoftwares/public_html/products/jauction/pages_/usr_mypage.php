<script>getMenuItems('mypage');</script>  
<?php
      if ($_SESSION['USER']['userid']>0) {
    } else {
        echo '<script>location.href="../";</script>';
    }
?>
<div style="font-family:arial;font-size:14px;color:#333">
Dear <?php echo $_SESSION['USER']['personname'];?>, 

<br> <br> <br> <br> <br>
<table width="100%" cellpadding="20" cellspacing="5">
    <tr>
        <td style="border-left:1px dashed #ccc">     
            <b style="font-size:13px;color:#E22380">Shipping Address:</b><br><br>
            <div style="font-family:arial;font-size:13px;margin-left:30px;color:#444">
            <?php echo $_SESSION['USER']['personname'];?>,<br>
            <?php echo $_SESSION['USER']['address1'];?>,<br>
            <?php echo $_SESSION['USER']['address2'];?>,<br>
            <?php echo $_SESSION['USER']['country'];?>,&nbsp;&nbsp;Pin Code : <?php echo $_SESSION['USER']['pincode'];?>.<br><br>
            <b style="font-size:12px;">Email:</b> <?php echo $_SESSION['USER']['emailid'];?> <br>
            <b style="font-size:12px;">Mobile No:</b>  <?php echo $_SESSION['USER']['mobileno'];?>  
            </div>
        </td>
        <td style="border-left:1px dashed #ccc">
            <b style="font-size:13px;color:#E22380">Billing Address:</b><br><br>
            <div style="font-family:arial;font-size:13px;margin-left:30px;color:#444">
            <?php echo $_SESSION['USER']['personname'];?>,<br>
            <?php echo $_SESSION['USER']['address1'];?>,<br>
            <?php echo $_SESSION['USER']['address2'];?>,<br>
            <?php echo $_SESSION['USER']['country'];?>,&nbsp;&nbsp;Pin Code : <?php echo $_SESSION['USER']['pincode'];?>.<br><br>
            <b style="font-size:12px;">Email:</b> <?php echo $_SESSION['USER']['emailid'];?> <br>
            <b style="font-size:12px;">Mobile No:</b>  <?php echo $_SESSION['USER']['mobileno'];?>  
            </div>
        </td>
    </tr>
</table>
</div>