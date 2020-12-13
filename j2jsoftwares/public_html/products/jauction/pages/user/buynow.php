<?php
    $psrsarray = array("00","01","02","03","04","05","06","07","08","09");
    for($i=10;$i<=99;$i++) {
        $psrsarray[]=$i;
    }
    function getRsPs($name,$others) {
        global $psrsarray;
        
        $t = "<select name='".$name."' id='".$name."' ".$others." >";
        foreach($psrsarray as $p) {
            $t .= "<option value='".$p."'>".$p."</p>";
        }
        $t .= "</select>";
        return $t;
        
    }
?>
<div style="font-size:12px;font-family:arial;border:1px solid #cccccc;">
    <?php                                                 
        
        $item = $mysql->select("select * from _items where itemid='".$_REQUEST['buynow']."'");
    
        if ($item[0]['auctiontype']=='tba') {
            $item = $mysql->select("select * from _items where itemid='".$_REQUEST['buynow']."' and date('".date("Y-m-d H:i:s")."')<=date(endon)");        
        } 
        $item = $item[0];
    ?>
    <div style="background:#3093CC;color:#fff;font-size:13px;font-weight:bold;font-family:arial;padding:8px;text-transform: capitalize"><?php echo $item['itemname'];?></div>
    <br><Br>
    
    <table width="96%" align="center">
        <tr>
            <td valign="top">
                <br><img src="productimages/<?php echo $item['productimage']; ?>"    height="230" width="230"><br><br><br>
                <a href="p/<?php echo $item['itemid']; ?>"  target="_blank"><img src="../images/see-product.jpg"></a>
            </td>
            <td valign="top" width="400">
        
            <?php if (isset($_POST['doAction'])) {
                
                $bidAmt = 0;
                for($i=1;$i<=6;$i++) {
                    
                    if (($_POST['rs'][$i]>0) && ($_POST['ps'][$i]>=0)) {
                        $bidAmt   += $item['bidamount'];  
                    } 
                }   
            
             ?>
            
            
            <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>
                <form action="p/usr_postbids" method="post" target="_self">
                <?php } ?>
                
                    <?php if  ($item['auctiontype']!='m2w') { ?>
                    <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td>Bid Rate</td><td>Bid Amount</td><td></td></tr>
                        <?php
                            $t   = 0;
                            $qry = "";
                            for($i=1;$i<=6;$i++) {
                                
                                
                                if (($_POST['rs'][$i]>0) && ($_POST['ps'][$i]>=0)) {
                                    $qry .= "insert into _bids values (Null,'".$_POST['productid']."','".$_SESSION['USER']['userid']."','".$item['bidamount']."','".$_POST['rs'][$i].".".$_POST['ps'][$i]."','".date("Y-m-d H:i:s")."',' '); ";
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','Buy Bids : ".$_POST['productid']."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0'); ";
                                    $t   += $item['bidamount'];  
                                    $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE";
                        ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40"><?php echo $i;?>.</td>
                            <td width="200">Rs.&nbsp;&nbsp;<? echo $_POST['rs'][$i];?>.<?php echo $_POST['ps'][$i];?></td>
                            <td>Rs. <?php echo number_format($item['bidamount'],2);?></td>
                            <td>&nbsp;</td>  
                        </tr>
                        <?php   } 
                            }
                        ?>
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                            <td>&nbsp;</td>
                            <td>Total Amount</td>
                            <td>Rs. <?php echo number_format($t,2); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                              
                                <textarea style='display:none' name="licenceKey"><?php echo base64_encode($qry);?></textarea></td>
                            </tr>
                        <tr>
                        <td colspan="4" style="padding-left:0px;">
                            <input type="button" value="  Back  ">&nbsp;&nbsp;
                            <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>   
                            <input type="submit" value=" Buy Bids ">
                            <?php } else {
                                ?>
                                     <input type="submit" value=" You don't have balance " disabled="disabled">
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                <?php } else { ?>
                
                <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td>Lucky Number</td><td>Bid Amount</td><td></td></tr>
                        <?php
                            $t   = 0;
                            $qry = "";
                            for($i=1;$i<=6;$i++) {
                                if (($_POST['rs'][$i]>0)) {
                                    $qry .= "insert into _bids values (Null,'".$_POST['productid']."','".$_SESSION['USER']['userid']."','".$item['bidamount']."','".$_POST['rs'][$i]."','".date("Y-m-d H:i:s")."',' '); ";
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','Buy Bids Match2Win : ".$_POST['productid']."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0'); ";
                                    $t   += $item['bidamount'];  
                                    $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE";
                        ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40"><?php echo $i;?>.</td>
                            <td width="200">&nbsp;&nbsp;<? echo $_POST['rs'][$i];?></td>
                            <td>Rs. <?php echo number_format($item['bidamount'],2);?></td>
                            <td>&nbsp;</td>  
                        </tr>
                        <?php   } 
                            }
                        ?>
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                            <td>&nbsp;</td>
                            <td>Total Amount</td>
                            <td>Rs. <?php echo number_format($t,2); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="hidden" name="count" id="count" value="<?php echo $t; ?>">
                                <input type="hidden" name="ism2w" id="ism2w" value="1">
                                <textarea style='display:none' name="licenceKey"><?php echo base64_encode($qry);?></textarea></td>
                            </tr>
                        <tr>
                        <td colspan="4" style="padding-left:0px;">
                            <input type="button" value="  Back  ">&nbsp;&nbsp;
                             <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>   
                            <input type="submit" value=" Buy Bids ">
                             <?php } else {
                                ?>
                                     <input type="submit" value=" You don't have balance " disabled="disabled">
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                
                <?php } ?>
                
                
            </form>
            <?php } else { ?>
            <form action="" method="post" target="_self">
                <input type="hidden" value="1" name="doAction" id="doAction">
                <input type="hidden" value="<?php echo $_REQUEST['buynow'];?>" name="productid" id="productid">
                
                <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">
                    <?php if  ($item['auctiontype']!='m2w') { ?>
                    <tr>
                        <td colspan="3" style="padding-left:0px;padding-right:0px"><div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Information</div>   </td>    
                    </tr>
                    <tr>
                        <td colspan="3">
                            Bid Price : Rs. <?php echo $item['bidamount'];?> / Bid<br><br>
                            <?php if ( $item['auctiontype']=='tba')  { ?>
                            <table cellspacing="1" cellpadding="0">
                                <tr>
                                    <td><div id="cBox" style="width:58px;height:26px;padding-top:10px;font-weight:Bold;">Closed In</div></td>
                                    <td><div id="cBox"><span id="daysBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="hoursBox_<?php echo $i;?>" class="timeresult"></span><br><span id="hhBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="minsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="secsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $i;?>" class="timecaption"></span></div></td> 
                                </tr>
                            </table>
                            <?php } ?>
                            <br><br>     
                            Example: Put all bids from Rs 1.01  to Rs 99.99,
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding-left:0px;padding-right:0px"><div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Enter Your Bid in Unit</div>   </td>
                    </tr>
                    <tr style="background:#EBF5FE;">
                        <td width="10">1.</td>
                        <td  >Rs.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[1]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="rs[1]" id="rs[1]" type="text" size="8" maxlength="2" style="font-size:11px;">-->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[1]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="ps[1]" id="ps[1]" type="text" maxlength="2" size="8" style="font-size:11px;">-->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>  
                    </tr>
                    <tr style="background:#D6EBFE;">
                        <td>2.</td>
                        <td>Rs.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[2]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[2]" id="rs[2]" type="text" size="8" maxlength="2" style="font-size:11px;"> -->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[2]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="ps[2]" id="ps[2]" type="text" maxlength="2" size="8" style="font-size:11px;">-->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#EBF5FE;">
                        <td>3.</td>
                        <td>Rs.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[3]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[3]" id="rs[3]" type="text" size="8" maxlength="2" style="font-size:11px;">-->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[3]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="ps[3]" id="ps[3]" type="text" maxlength="2" size="8" style="font-size:11px;">-->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#D6EBFE;">
                        <td>4.</td>
                        <td>Rs.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[4]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[4]" id="rs[4]" type="text" size="8" maxlength="2" style="font-size:11px;"> -->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[4]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="ps[4]" id="ps[4]" type="text" maxlength="2" size="8" style="font-size:11px;"> -->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#EBF5FE;">
                        <td>5.</td>
                        <td>Rs.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[5]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="rs[5]" id="rs[5]" type="text" size="8" maxlength="2" style="font-size:11px;">-->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[5]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="ps[5]" id="ps[5]" type="text" maxlength="2" size="8" style="font-size:11px;"> -->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#D6EBFE;">
                        <td>6.</td>
                        <td>Rs.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[6]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[6]" id="rs[6]" type="text" size="8" maxlength="2" style="font-size:11px;"> -->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[6]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="ps[6]" id="ps[6]" type="text" maxlength="2" size="8" style="font-size:11px;">  -->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                </table>
            <br><br>                                                   
           <?php } else { ?>
           <tr>
                        <td colspan="3">
                            Bid Price : Rs. <?php echo $item['bidamount'];?> / Bid<br><br>
                        </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:0px;padding-right:0px"><div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Enter Your Lucky Number</div>   </td>    
            </tr>
            <tr style="background:#EBF5FE;">
                <td width="10">1.</td><td>Lucky Number</td><td width="200">&nbsp;<input name="rs[1]" id="rs[1]" type="text" size="14" maxlength="6" style="font-size:11px;"></td>  
            </tr>
            <tr style="background:#D6EBFE;">
                <td>2.</td><td>Lucky Number</td><td><input name="rs[2]" id="rs[2]" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#EBF5FE;">
                <td>3.</td><td>Lucky Number</td><td><input name="rs[3]" id="rs[3]" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#D6EBFE;">
                <td>4.</td><td>Lucky Number</td><td><input name="rs[4]" id="rs[4]" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#EBF5FE;">
                <td>5.</td><td>Lucky Number</td><td><input name="rs[5]" id="rs[5]" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#D6EBFE;">
                <td>6.</td><td>Lucky Number</td><td><input name="rs[6]" id="rs[6]" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            </table>
              <br><br>
            <?php } ?>
            <input type="image" src="../images/btn_continue.gif">
            
            </form>
             <?php } ?>                    
        </td>
    </tr>
</table>
<br>
</div>
<script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $i;?>');</script>            