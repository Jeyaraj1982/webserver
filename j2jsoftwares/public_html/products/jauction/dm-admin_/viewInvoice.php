<?php
 
    include_once("config.php");    
 
    $data = $mysql->select("select * from _tbl_invoice where   invoiceid='".$_POST['invoiceid']."'");
    
    if (sizeof($data)==0) {
        echo "Invalid Access"    ;
    } else {
        $user = $mysql->select("select * from _usertable where userid='".$data[0]['userid']."'");
        ?>
        
         <?php if ($data[0]['transactionid']>0) { ?>
           <div style='background:green;margin:10px;padding:10px;text-align:center'> Paid. Transaction ID : <?php echo $data[0]['transactionid'];?></div>
        <?php } else { ?>
            <div style='background:orange;margin:10px;padding:10px;text-align:center'> Failed  </div>
        <?php } ?>
        
        
         <table width="100%" cellpadding="20" cellspacing="5" style="font-family: arial;" align="center">
    <tr>
        <td style="border-left:1px dashed #ccc">     
            <b style="font-size:13px;color:#E22380">Shipping Address:</b><br><br>
            <div style="font-family:arial;font-size:13px;margin-left:30px;color:#444">
            <?php echo $user[0]['personname'];?>,<br>
            <?php echo $user[0]['address1'];?>,<br>
            <?php echo $user[0]['address2'];?>,<br>
            <?php echo $user[0]['country'];?>,&nbsp;&nbsp;Pin Code : <?php echo $user[0]['pincode'];?>.<br><br>
            <b style="font-size:12px;">Email:</b> <?php echo $user[0]['emailid'];?> <br>
            <b style="font-size:12px;">Mobile No:</b>  <?php echo $user[0]['mobileno'];?>  
            </div>
        </td>
        <td style="border-left:1px dashed #ccc">
            <b style="font-size:13px;color:#E22380">Billing Address:</b><br><br>
            <div style="font-family:arial;font-size:13px;margin-left:30px;color:#444">
            <?php echo $user[0]['personname'];?>,<br>
            <?php echo $user[0]['address1'];?>,<br>
            <?php echo $user[0]['address2'];?>,<br>
            <?php echo $user[0]['country'];?>,&nbsp;&nbsp;Pin Code : <?php echo $user[0]['pincode'];?>.<br><br>
            <b style="font-size:12px;">Email:</b> <?php echo $user[0]['emailid'];?> <br>
            <b style="font-size:12px;">Mobile No:</b>  <?php echo $user[0]['mobileno'];?>  
            </div>
        </td>
    </tr>
</table>

<br> 


 <table align="center" style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0" width="98%" >
        <tr>
            <td colspan="5">
              Invoice No : <?php echo $data[0]['invoiceid'];?><br>
              Invoice Date :  <?php echo $data[0]['invoicedate'];?><br><br> 
            </td>
        </tr>
        <tr style="background:url(../images/bar_menu.gif);font-weight:bold;text-align: center;color:#FFFFFF">
            <td width="40">Slno</td>
            <td>Product Name</td>
            <td width="40">Qty</td>
            <td width="80">Our Price</td>
            <td width="80">Amount</td>
        </tr>
        <?php
           $items = $mysql->select("select * from _tbl_invoice_items as items, _items as i where  items.itemid=i.itemid and items.invoiceid=".$_POST['invoiceid']);
            $subtotal = 0;
            foreach($items as $citem) {
                $c++;
                $subtotal += $citem['ourprice']; 
        ?>
        <tr>
            <td style="border-left:1px solid #ccc;border-right:1px solid #ccc;vertical-align:top;text-align: right"><?php echo $c; ?>.&nbsp;</td>
            <td style="border-right:1px solid #ccc;vertical-align:top">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="60" valign="top"><img src="../productimages/<?php echo $citem['productimage']; ?>"    height="60" width="60" align="left"></td>
                        <td valign="top" style="padding-left:10px;"><?php echo $citem['itemname'];?></td>
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
            <td colspan="5">
              Payment : 
        <?php if ($data[0]['transactionid']>0) { ?>
            Paid. Transaction ID : <?php echo $data[0]['transactionid'];?>
        <?php } else { ?>
            Failed
        <?php } ?>
            </td>
        
        </tr>
        
        </table>
       
         
        <?php
    }
?>