<div style="overflow:hidden;background:#fff;float:left;width:370px;height:450px;border:7px solid #F9D49D;margin-right:<?php echo ($c==0) ? '18px' : '0px'; ?>;margin-bottom: <?php echo ($c==0) ? '5px' : '0px'; ?>;" >
       <?php
            $currency = ($item['productfrom']=="India") ? 'RS' : 'RM'; 
            $currflag = ($item['productfrom']=="India") ? '../images/india_flag_icon.png' : '../images/malaysian.gif'; 
        ?>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="70%" style="padding-left:5px">
                    <div style="color:#666666;font-family: arial;font-size:18px;height:44px">
                        <a target="_self" href="tba/<?php echo $item['itemid'];?>" class="_mnu"><?php echo $item['itemname'];?></a>
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
                <td colspan="2">
                    <table cellspacing="1" cellpadding="0" align="right">
                        <tr>
                            <td><div id="cBox" style="width:58px;height:26px;padding-top:10px;font-weight:Bold;">Closed In</div></td>
                            <td><div id="cBox"><span id="daysBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                            <td><div id="cBox"><span id="hoursBox_<?php echo $item['itemid'];?>" class="timeresult"></span><br><span id="hhBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                            <td><div id="cBox"><span id="minsBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                            <td><div id="cBox"><span id="secsBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td> 
                        </tr>
                        <tr>
                            <td colspan="5">
                                <a href="buynow/<?php echo $item['itemid']; ?>" style="text-decoration:none;">
                                <div style="border:0px solid #DD13D0;background-image:url(images/bg.png);width:217px;border-radius:5px;padding:2px;margin-bottom: 5px;">
                                    <table width="100%">
                                        <tr>    
                                            <td style="width: 85px;"><div style="border:1px solid #ffffff;background:#ffffff;width:115px;border-radius:5px;;font-family: arial;font-size:16px;padding:5px;text-align:center;color:#666666"><?php echo $currency;?>. <?php echo $item['bidamount'];?> / Bid</div></td>
                                            <td><div style="color:#ffffff;font-family: arial;font-size:16px;padding:5px;font-weight:bold;text-align:center">Buy Now</td>
                                        </tr>
                                    </table>
                                </div>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="background:#f1f1f1;padding:5px;height:40px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">Current Lowest Unique bidder:
                <?php
                    echo $dealmaass->GetLowestBidUserName($item['itemid']);
                ?>
                 
                  </td>
            </tr>       
        </table>
        <script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $item['itemid'];?>');</script>
    </div>