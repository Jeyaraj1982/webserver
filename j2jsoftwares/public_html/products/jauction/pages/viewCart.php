<?php
       
    if (sizeof($_SESSION['cartItem'])==0) { 
        echo "No Items not found";
    } else {  
    
  
?>
    <table align="center" style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0" width="80%" >
        <tr style="background:#ccc;font-weight:bold;text-align: center;">
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
            <td style="border-right:1px solid #ccc;vertical-align:top"><?php echo $citem['itemname'];?><br>
                <form action="" method="post" name="rItemForm_<?php echo $citem['itemid']; ?>"  id="rItemForm_<?php echo $citem['itemid']; ?>" target="_self">
                    <input type="hidden" value="<?php echo $citem['itemid'];?>" name="removeItem" id="reomveItem">
                </form>
                <a href="javascript:void(0)" onclick="$('#rItemForm_<?php echo $citem['itemid']; ?>').submit();"  target="_self">Remove</a>
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
    </table>
<?php } ?>

  <?php if ($_SESSION['USER']['userid']>0) {?> 
  
    <table>
        <tr>
            <td>Payment Mode </td>
            <td><select>
                <option value="">Credit/Debit Cards</option>
                <option value="">Net Banking</option>
                <option value="">Cash Cards</option>
            
            </select></td>
            <td> <input type="Button" value="Pay Now" style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;"></td>
        </tr>
    </table>
  
   
  
  <?php } else { ?>
    
    <br><bR><BR><bR>
        <table align="center" style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="2">
            <tr>
                <td>For New Customer <br><Br>
                   <a href="p/register"><img onmouseover="this.src='images/registerB.png';"  onmouseout="this.src='images/registerG.png';"  src="images/registerG.png"></a>
                </td>
                <td>
                    For Existing Customer<br><br>
                     <a href="p/register"><img  onmouseover="this.src='images/loginB.png';"  onmouseout="this.src='images/loginG.png';" src="images/loginG.png"> </a>
                </td>
            </tr>
        
        </table>
  
  <?php } ?>