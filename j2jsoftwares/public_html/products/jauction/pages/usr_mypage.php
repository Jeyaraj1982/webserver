<script>getMenuItems('mypage');</script>  
 <div style="border:5px solid #F9D49D;background:#FFF8EF;">
    <div style="background:#F9D49D;color:#444;font-size:13px;font-weight:bold;font-family:arial;padding:8px;text-transform: capitalize">My Page</div>
     <script> var printLowAmount = "Please Pay Rs. 50 and More";</script>
    <div style="margin:10px;font-size:13px;font-family:arial;line-height:23px;">
    
        <table cellpadding="3" cellspacing="0" align="center" style="font-family:arial;font-size:12px;">
            <tr>
                <td>Account ID</td>
                <td>:&nbsp;<?php echo $_SESSION['USER']['userid'];?></td>
                <td width="150"></td>
                <td>Available Amount</td>
                <td>:&nbsp;Rs. <?php echo $dealmaass->getBalance(); ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:&nbsp;<?php echo $_SESSION['USER']['personname'];?></td>
                <td></td>
                <td>Add Amount</td>
               
                <td>
                
                <!--<form target="_self" action="http://www.dealmaass.com/paymentgateway.php" method="post" onsubmit="($('#amt').val()>=50) ? $(this).submit() : alert(printLowAmount);return false;">:&nbsp; Rs. <input type="text" size="7" name="amt" id="amt"><input type="hidden" value="<?php echo $_SESSION['USER']['userid']; ?>" id="inUserid" name="inUserid"><input type="hidden" value="1" name="bids" id="bids">&nbsp;&nbsp;<input type="submit" value="Add Amount" style="cursor:pointer;border:none;padding:2px;background:#FC6C05;color:#ffffff;font-weight:bold;font-family: arial;padding-left:10px;padding-right:10px;"></form>-->
                <a target="_self" href="http://www.wincashdeal.com/p/requesttowalletupdate">Wallet Update</a>
                </td>
            </tr>
            <tr>
                <td>Mobile No</td>
                <td>:&nbsp;<?php echo $_SESSION['USER']['mobileno'];?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>E-Mail ID</td>
                <td>:&nbsp;<?php echo $_SESSION['USER']['emailid'];?></td>
            </tr>
        </table>
        <br><br>
        <b>Shipping Address:</b><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['USER']['personname'];?>,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['USER']['address1'];?>,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['USER']['address2'];?>,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pin Code : <?php echo $_SESSION['USER']['pincode'];?>,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['USER']['country'];?>,
    </div>
 </div>
 


 