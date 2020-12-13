    <div style="overflow:hidden;background:#fff;float:left;width:350px;height:450px;border:7px solid #F9D49D;margin-right:<?php echo ($c==0) ? '18px' : '0px'; ?>;margin-bottom: <?php echo ($c==0) ? '5px' : '0px'; ?>;" >
        <?php
            $currency = ($item['productfrom']=="India") ? 'RS' : 'RM'; 
            $currflag = ($item['productfrom']=="India") ? '../images/india_flag_icon.png' : '../images/malaysian.gif'; 
        ?>
        <table width="100%" cellpadding="0" cellspacing="0">
           <tr>
                <td style="padding-left:5px">
                    <div style="color:#666666;font-family: arial;font-size:18px;height:44px">
                        <a target="_self" href="bba/<?php echo $item['itemid'];?>" class="_mnu"><?php echo $item['itemname'];?></a>
                    </div>
                </td>
                <td align="right" valign="top">
                    <div style='background:#F9D49D;color:#333;font-family: arial;font-size:12px;padding:5px;text-align:left;font-weight:bold;width:120px;'>
                        <table style="width:100%">
                            <tr>
                                <td width="20"><img src="<?php echo $currflag;?>" style="height:16px" align="absmiddle"></td>
                                <td style="text-align: right"><?php echo $currency;?>. <?php echo number_format($item['price'],2);?>/-</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
           
            <tr>
                <td colspan="2"><div style="text-align: center;"><img src="productimages/<?php echo $item['productimage']; ?>" width="320" height="265"></div></td>
            </tr>
            <tr>
                <td colspan="2"><div style="height:35px">&nbsp;</div></td>
            </tr>
             <tr>
                <td style="text-align: right;padding:5px;" colspan="2">
                     <a href="buynow/<?php echo $item['itemid']; ?>" style="text-decoration:none;">
                        <div style="float:right;border:0px solid #DD13D0;background-image:url(images/bg_gray.png);width:234px;border-radius:5px;padding:2px;margin-bottom: 5px;">
                        <table width="100%">
                            <tr>    
                                <td style="width: 85px;"><div style="border:1px solid #ffffff;background:#ffffff;width:115px;border-radius:5px;;font-family: arial;font-size:14px;padding:5px;text-align:center;color:#666666"><?php echo $currency;?>. <?php echo $item['bidamount'];?> / Seat</div></td>
                                <td><div style="color:#ffffff;font-family: arial;font-size:16px;padding:5px;font-weight:bold;text-align:center">Book Now</td>
                            </tr>
                        </table>
                        </div>
                   </a>
                </td>
            </tr>
             
            <tr>
                <td colspan="2" style="background:#f1f1f1;padding:5px;height:40px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">  </td>
            </tr>
        </table>
        <br> 
    </div> 