<?php
       
    if (sizeof($_SESSION['cartItem'])==0) { 
        echo "No Items not found";
    } else {  
    
  
?>
 <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Cart Items</h3> <br> 
 
   <?php if ($_SESSION['USER']['userid']>0) {?>  
                            
    <table width="100%" cellpadding="20" cellspacing="5" style="font-family: arial;" align="center">
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
<br><br>

   <?php } ?>
    <table align="center" style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0" width="98%" >
        <tr style="background:url(images/bar_menu.gif);font-weight:bold;text-align: center;color:#FFFFFF">
            <td width="40">Slno</td>
            <td>Product Name</td>
            <td width="40">Qty</td>
            <td width="80">Our Price</td>
            <td width="80">Amount</td>
        </tr>
        <?php
            $c = 0;
            $subtotal = 0;
            foreach($_SESSION['cartItem'] as $citem) {
                $c++;
                $subtotal += $citem['ourprice']; 
        ?>
        <tr>
            <td style="border-left:1px solid #ccc;border-right:1px solid #ccc;vertical-align:top;text-align: right"><?php echo $c; ?>.&nbsp;</td>
            <td style="border-right:1px solid #ccc;vertical-align:top">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="60" valign="top"><img src="productimages/<?php echo $citem['productimage']; ?>"    height="60" width="60" align="left"></td>
                        <td valign="top" style="padding-left:10px;">
                            <a class="_mnu" target="_self" href="product/<?php echo $citem['itemid'];?>"><?php echo $citem['itemname'];?></a><br>
                            <form action="" method="post" name="rItemForm_<?php echo $citem['itemid']; ?>"  id="rItemForm_<?php echo $citem['itemid']; ?>" target="_self">
                                <input type="hidden" value="<?php echo $citem['itemid'];?>" name="removeItem" id="reomveItem">
                            </form>
                            <a href="javascript:void(0)" onclick="$('#rItemForm_<?php echo $citem['itemid']; ?>').submit();"  target="_self">Remove</a>                        
                        </td>
                    </tr>
                </table>
            
           
            </td>
            <td style="border-right:1px solid #ccc;text-align: center;vertical-align:top">1</td>
            <td style="border-right:1px solid #ccc;text-align: right;vertical-align:top"><?php echo number_format($citem['ourprice'],2);?></td>
            <td style="border-right:1px solid #ccc;text-align: right;vertical-align:top"><?php echo number_format($citem['ourprice'],2);?></td>
        </tr>
        <?php } ?>
        <tr style="font-weight: bold;">
            <td style="border:1px solid #ccc;"></td>
            <td style="border:1px solid #ccc;border-left:none;text-align: center;" colspan="3">Total Payable Amount</td>
            <td style="border:1px solid #ccc;border-left:none;text-align: right"><?php echo number_format($subtotal,2);?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
               <?php if ($_SESSION['USER']['userid']>0) {?> 
               <input type="button" value="  Pay Now  " onclick="location.href='p/paynow';" style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
               <?php } else { ?>
               <a href="p/register" target="_self"><img onmouseover="this.src='images/registerB.png';"  onmouseout="this.src='images/registerG.png';"  src="images/registerG.png"></a>&nbsp;&nbsp;
               <a href="p/register" target="_self"><img  onmouseover="this.src='images/loginB.png';"  onmouseout="this.src='images/loginG.png';" src="images/loginG.png"> </a>
               <?php } ?>
               <div>
               <br><br><img src="images/ebslogo.png"><br>
               <span style='color:#333'>You can buy products using any one of  Credit Cards | Debit Cards | Net Banking  Credentials</span> 
               </div> 
            </td>
        </tr>
    </table>
<?php } ?>

 