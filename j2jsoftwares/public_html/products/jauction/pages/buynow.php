
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

<div style="font-size:12px;font-family:arial;border:7px solid #F9D49D;background:#fff">
    <?php                                                 
        
        $item = $mysql->select("select * from _items where itemid='".$_REQUEST['buynow']."'");
                       
        if ($item[0]['auctiontype']=='tba') {
            echo  "<script>getMenuItems('timeBased');</script>";
        }
        if ($item[0]['auctiontype']=='bba') {
            echo  "<script>getMenuItems('bidBased');</script>";
        }
        if ($item[0]['auctiontype']=='m2w') {
            echo  "<script>getMenuItems('bookWin');</script>";
        }
     
            $currency = ($item[0]['productfrom']=="India") ? 'RS' : 'RM'; 
            $currflag = ($item[0]['productfrom']=="India") ? '../images/india_flag_icon.png' : '../images/malaysian.gif'; 
       
        
        if ($item[0]['auctiontype']=='tba') {
            $item = $mysql->select("select * from _items where itemid='".$_REQUEST['buynow']."' and date('".date("Y-m-d H:i:s")."')<=date(endon)");        
        } 
        $item = $item[0];
         if ($item['productfrom']==$_SESSION['USER']['country']) {
         
    ?>
            <table width="100%" cellpadding="0" cellspacing="0">
           <tr>
                <td style="padding:5px">
                    <div style="color:#666666;font-family: arial;font-size:20px;">
                        <a target="_self" href="bba/<?php echo $item['itemid'];?>" class="_mnu"><?php echo $item['itemname'];?></a>
                    </div>
                </td>
                <td align="right" valign="top" style="width:130px;">
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
     </table>
    
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
                
                    <?php
                    $dealmaass->userid = $_SESSION['USER']['userid'];
                     if  ($item['auctiontype']!='m2w') { 
                               
                        ?>
                      <br><br>
                    <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td>Selected Bid Rate (<?php echo $currency;?>)</td><td>Bid Amount (<?php echo $currency;?>)</td><td></td></tr>
                        <?php
                            $t   = 0;
                            $qry = "";
                            $productname = $mysql->select("select * from _items where itemid=".$_POST['productid']);
                            $narration = "Buy Bids Bids/".$_POST['productid']."/".$productname[0]['itemname']."/".$productname[0]['auctiontype'];
                             $balance = $dealmaass->getBalance();
                            for($i=1;$i<=6;$i++) {
                                
                                
                                if (($_POST['rs'][$i]>0) && ($_POST['ps'][$i]>=0)) {
                                       $balance -= $item['bidamount'];
                                    $qry .= "insert into _bids values (Null,'".$_POST['productid']."','".$_SESSION['USER']['userid']."','".$item['bidamount']."','".$_POST['rs'][$i].".".$_POST['ps'][$i]."','".date("Y-m-d H:i:s")."',' '); ";
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."'); ";
                                    $t   += $item['bidamount'];  
                                    $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE";
                        ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40"><?php echo $i;?>.</td>
                            <td width="200"><? echo $_POST['rs'][$i];?>.<?php echo $_POST['ps'][$i];?></td>
                            <td style="text-align: right"><?php echo number_format($item['bidamount'],2);?></td>
                            <td>&nbsp;</td>  
                        </tr>
                        <?php   } 
                        
                        if ($_POST['ps'][$i]>0 && $_POST['rs'][$i]==0) {
                               $balance -= $item['bidamount'];
                                    $qry .= "insert into _bids values (Null,'".$_POST['productid']."','".$_SESSION['USER']['userid']."','".$item['bidamount']."','".$_POST['rs'][$i].".".$_POST['ps'][$i]."','".date("Y-m-d H:i:s")."',' '); ";
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."'); ";
                                    $t   += $item['bidamount'];  
                                    $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE"; 
                                    ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40"><?php echo $i;?>.</td>
                             <td width="200"><? echo $_POST['rs'][$i];?>.<?php echo $_POST['ps'][$i];?></td>
                            <td style="text-align: right"><?php echo number_format($item['bidamount'],2);?></td>
                            <td>&nbsp;</td>  
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                            <td>&nbsp;</td>
                            <td>Total Amount</td>
                            <td style="text-align: right"><?php echo number_format($t,2); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                              
                                <textarea style='display:none' name="licenceKey"><?php echo base64_encode($qry);?></textarea></td>
                            </tr>
                        <tr>
                        <td colspan="4" style="padding-left:0px;">
                            <input type="button" onclick="location.href='http://www.wincashdeal.com/buynow/<?php echo $item['itemid'];?>'" value="  Back  " style="cursor:pointer;border:none;padding:5px;background:#666;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">&nbsp;&nbsp;
                            <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>   
                            <input type="submit" value=" Buy Bids " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;cursor:pointer;">
                            <?php } else {
                                ?>
                                     <input type="button" value=" You don't have balance " disabled="disabled" style="padding:3px">
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                <?php } else { ?>
                   
                   
                <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td>Lucky Number</td><td>Bid Amount</td><td></td></tr>
                        <?php
                                    $balance = $dealmaass->getBalance();
                            $t   = 0;
                            $qry = "";
                             $productname = $mysql->select("select * from _items where itemid=".$_POST['productid']);
                            $narration = "Buy Bids Bids/".$_POST['productid']."/".$productname[0]['itemname']."/".$productname[0]['auctiontype'];
                          
                            for($i=1;$i<=6;$i++) {
                                if (($_POST['rs'][$i]>0)) {
                                      $balance -= $item['bidamount'];
                                    $qry .= "insert into _bids values (Null,'".$_POST['productid']."','".$_SESSION['USER']['userid']."','".$item['bidamount']."','".$_POST['rs'][$i]."','".date("Y-m-d H:i:s")."',' '); ";
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."'); ";
                                    $t   += $item['bidamount'];  
                                    $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE";
                        ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40"><?php echo $i;?>.</td>
                            <td width="200">&nbsp;&nbsp;<? echo $_POST['rs'][$i];?></td>
                            <td><?php echo $currency;?>. <?php echo number_format($item['bidamount'],2);?></td>
                            <td>&nbsp;</td>  
                        </tr>
                        <?php   } 
                                
                                
                            }
                        ?>
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                            <td>&nbsp;</td>
                            <td>Total Amount</td>
                            <td><?php echo $currency;?>. <?php echo number_format($t,2); ?></td>
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
                            <input type="submit" value=" Buy Bids " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
                             <?php } else {
                                ?>
                                     <input type="button" value=" You don't have balance " disabled="disabled" style="padding:3px">
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                
                <?php }   ?>
                
                
            </form>
            <?php } else {
            
             ?>
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
                            Bid Price : <?php echo $currency;?>. <?php echo $item['bidamount'];?> / Bid<br><br>
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
                            Example: Put all bids from <?php echo $currency;?>. 00.01  to <?php echo $currency;?>. 99.99,
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding-left:0px;padding-right:0px"><div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Enter Your Bid in Unit</div>   </td>
                    </tr>
                    <tr style="background:#EBF5FE;">
                        <td width="10">1.</td>
                        <td  ><?php echo $currency; ?>.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[1]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="rs[1]" id="rs[1]" type="text" size="8" maxlength="2" style="font-size:11px;">-->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[1]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="ps[1]" id="ps[1]" type="text" maxlength="2" size="8" style="font-size:11px;">-->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>  
                    </tr>
                    <tr style="background:#D6EBFE;">
                        <td>2.</td>
                        <td><?php echo $currency;?>.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[2]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[2]" id="rs[2]" type="text" size="8" maxlength="2" style="font-size:11px;"> -->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[2]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="ps[2]" id="ps[2]" type="text" maxlength="2" size="8" style="font-size:11px;">-->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#EBF5FE;">
                        <td>3.</td>
                        <td><?php echo $currency;?>.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[3]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[3]" id="rs[3]" type="text" size="8" maxlength="2" style="font-size:11px;">-->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[3]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="ps[3]" id="ps[3]" type="text" maxlength="2" size="8" style="font-size:11px;">-->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#D6EBFE;">
                        <td>4.</td>
                        <td><?php echo $currency;?>.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[4]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="rs[4]" id="rs[4]" type="text" size="8" maxlength="2" style="font-size:11px;"> -->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[4]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="ps[4]" id="ps[4]" type="text" maxlength="2" size="8" style="font-size:11px;"> -->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#EBF5FE;">
                        <td>5.</td>
                        <td><?php echo $currency;?>.&nbsp;&nbsp;
                        <?php echo getRsPs('rs[5]',"style='font-size:11px;padding:2px;'"); ?>
                        <!--<input name="rs[5]" id="rs[5]" type="text" size="8" maxlength="2" style="font-size:11px;">-->
                        &nbsp;&nbsp;&nbsp;
                        <?php echo getRsPs('ps[5]',"style='font-size:11px;padding:2px;'"); ?>
                        <!-- <input name="ps[5]" id="ps[5]" type="text" maxlength="2" size="8" style="font-size:11px;"> -->
                        &nbsp;&nbsp;Paisa</td><td>&nbsp;</td>
                    </tr>
                    <tr style="background:#D6EBFE;">
                        <td>6.</td>
                        <td><?php echo $currency;?>.&nbsp;&nbsp;
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
                        <td colspan="3" style="padding:10px;">
                            Bid Price : <?php echo $currency;?>. <?php echo $item['bidamount'];?> / Bid 
                        </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:0px;padding-right:0px">
                <div style="border:4px  solid #F9D49D;background:#F9D49D;font-weight:Bold;color:#fff;padding:5px;margin-bottom:10px;color:#222;border:4px solid #EAB264;">Lucky Number Must have <?php echo $item['secretkeyrange'];?></div>
                <div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Enter Your Lucky Number</div>   </td>    
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
<?php } else {?>
You are  not allow to run
<?php } ?>