<?php include_once("game_clients/menu.php");?>
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

    $_REQUEST['buynow'] = $_GET['buynow']                                  ;
    $item   = $mysql->select("select * from _items where itemid='".$_REQUEST['buynow']."'");
?>
    <div class="line">
        <div class="box margin-bottom">
            <article class="s-12 m-7 l-12">
                <?php
                   
       
                       
        if ($item[0]['auctiontype']=='tba') {
            echo  "<script>getMenuItems('timeBased');</script>";
             $ptitle = "Time based auction";
             $mnu = '<p align="right">
                              <a href="TBA_HowToPlay">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="Offer">Offer</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="Testimonials">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="Winners">Winners</a> 
                              </p>';
        }
        if ($item[0]['auctiontype']=='bba') {
            echo  "<script>getMenuItems('bidBased');</script>";
             $ptitle = "Bid Based Aution";
        }
        if ($item[0]['auctiontype']=='m2w') {
            echo  "<script>getMenuItems('bookWin');</script>";
            $ptitle = "Match 2 Win";
        }
     
            $currency = ($item[0]['productfrom']=="India") ? 'RS' : 'RM'; 
            $currflag = ($item[0]['productfrom']=="India") ? '../images/india_flag_icon.png' : '../images/malaysian.gif'; 
       
        
        if ($item[0]['auctiontype']=='tba') {
            $item = $mysql->select("select * from _items where itemid='".$_REQUEST['buynow']."' and date('".date("Y-m-d H:i:s")."')<=date(endon)");        
        } 
        $item = $item[0];
         if (true) {
    ?>
    <h4><?php echo $ptitle;?></h4>
    <?php echo $mnu;?>
    <div class="row">
        <div class="col-sm-12">
            <div style="color:#666666;font-family: arial;font-size:18px;">
                <span class="text-success" style="font-weight:bold;"><?php echo $item['itemname'];?></span>
            </div>
            <?php if ($item['auctiontype']=='s2w') { } else { ?>
                <div>INR <?php echo number_format($item['price'],2);?>/-</div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <br><img src="assets/products/<?php echo $item['productimage']; ?>" style="width:80%;margin:0px auto"><br>
            <p align="center"> Bid Price : <?php echo $item['bidamount'];?> / Bid</p>
         </div>
         <div class="col-sm-4">
         
            <?php if (isset($_POST['doAction'])) {
                
                $bidAmt = 0;
                for($i=1;$i<=6;$i++) {         
                    
                    if (($_POST['rs'][$i]>0) && ($_POST['ps'][$i]>=0)) {
                        $bidAmt   += $item['bidamount'];  
                    } 
                }   
            
             ?>
            
            
            <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>
                <form action="usr_postbids" method="post" target="_self">
                <?php } ?>
                
                    <?php
                    $dealmaass->userid = $_SESSION['USER']['userid'];
                     if  ($item['auctiontype']=='tba') { 
                               
                        ?>
                      <br><br>
                    <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td>Selected Bid Rate</td><td>Bid Amount </td><td></td></tr>
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
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."','0','0','0'); ";
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
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."','0','0','0'); ";
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
                            <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>   
                            <input type="submit" value=" Buy Bids " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;cursor:pointer;">
                            <?php } else {
                                ?>
                                     <input type="button" value=" You don't have balance " disabled="disabled" style="padding:3px">
                                       &nbsp;&nbsp;    
                                     <?php if (isset($_SESSION['USER']['userid'])) {?>
                                          <a href="AdMoney" style="color:#3093CC;text-decoration:underline;font-weight:bold;">Add Money</a>
                                     <?php } else { ?>
                                          <a href="GamePortal" style="color:#3093CC;text-decoration:underline;font-weight:bold;">Add Money</a>
                                     <?php } ?>
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                <?php } elseif  ($item['auctiontype']=='m2w') 
                {   ?>
                   
                   
                <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td>Lucky Number</td><td>Bid Amount</td></tr>
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
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."','0','0','0'); ";
                                    $t   += $item['bidamount'];  
                                    $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE";
                        ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40"><?php echo $i;?>.</td>
                            <td width="200">&nbsp;&nbsp;<? echo $_POST['rs'][$i];?></td>
                            <td><?php echo $currency;?>. <?php echo number_format($item['bidamount'],2);?></td>
                        </tr>
                        <?php   } 
                                
                                
                            }
                        ?>
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                            <td>&nbsp;</td>
                            <td>Total Amount</td>
                            <td><?php echo $currency;?>. <?php echo number_format($t,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="hidden" name="count" id="count" value="<?php echo $t; ?>">
                                <input type="hidden" name="ism2w" id="ism2w" value="1">
                                <textarea style='display:none' name="licenceKey"><?php echo base64_encode($qry);?></textarea></td>
                            </tr>
                        <tr>
                        <td colspan="4" style="padding-left:0px;">
                           
                             <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>   
                            <input type="submit" value=" Buy Bids " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
                             <?php } else {
                                ?>
                                     <input type="button" value=" You don't have balance " disabled="disabled" style="padding:3px">
                                     &nbsp;&nbsp;
                                     <?php if (isset($_SESSION['USER']['userid'])) {?>
                                          <a href="AdMoney" style="color:#3093CC;text-decoration:underline;font-weight:bold;">Add Money</a>
                                     <?php } else { ?>
                                          <a href="GamePortal" style="color:#3093CC;text-decoration:underline;font-weight:bold;">Add Money</a>
                                     <?php } ?>
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                
                <?php } elseif  ($item['auctiontype']=='s2w') {  ?>
                
                
                
                
                <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;"><td>Sl. No</td><td> </td><td>Bid Amount</td></tr>
                        <?php
                                    $balance = $dealmaass->getBalance();
                            $t   = 0;
                            $qry = "";
                             $productname = $mysql->select("select * from _items where itemid=".$_POST['productid']);
                            $narration = "Buy Bids Bids/Scratch To Win Cash/".$_POST['productid']."/".$productname[0]['itemname']."/".$productname[0]['auctiontype'];
                          
                          //  for($i=1;$i<=6;$i++) {
                             //   if (($_POST['rs'][$i]>0)) {
                                      $balance -= $item['bidamount'];
                                   // $qry .= "insert into _bids values (Null,'".$_POST['productid']."','".$_SESSION['USER']['userid']."','".$item['bidamount']."','".$_POST['rs'][$i]."','".date("Y-m-d H:i:s")."',' '); ";
                                    $qry .= "insert into _acc_txn values (Null,'".$_SESSION['USER']['userid']."','".$narration."','".$item['bidamount']."','0.00','".$item['bidamount']."','".date("Y-m-d H:i:s")."','0','0','0','0','0','".$balance."','0','0','0'); ";
                                    $t   += $item['bidamount'];  
                                  //  $bg = ($i%2 ==0)  ?  "#EBF5FE" : "#D6EBFE";
                        ?>
                        <tr style="background:<?php echo $bg;?>;">
                            <td width="40">1</td>
                            <td> </td>
                            <td><?php echo $currency;?>. <?php echo number_format($item['bidamount'],2);?></td>
                        </tr>
                        <?php  // } 
                                
                                
                           // }
                        ?>
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                            <td>&nbsp;</td>
                            <td>Total Amount</td>
                            <td><?php echo $currency;?>. <?php echo number_format($t,2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="hidden" name="count" id="count" value="<?php echo $t; ?>">
                                <input type="hidden" name="iss2w" id="iss2w" value="<?php echo $_POST['productid'];?>">
                                <textarea style='display:none' name="licenceKey"><?php echo base64_encode($qry);?></textarea></td>
                            </tr>
                        <tr>
                        <td colspan="4" style="padding-left:0px;">
                           
                             <?php if ($dealmaass->getBalance()>$bidAmt)  { ?>   
                            <input type="submit" value=" Buy Bids & Start Game " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
                             <?php } else {
                                ?>
                                     <input type="button" value=" You don't have balance " disabled="disabled" style="padding:3px">
                                     &nbsp;&nbsp;
                                     <?php if (isset($_SESSION['USER']['userid'])) {?>
                                          <a href="AdMoney" style="color:#3093CC;text-decoration:underline;font-weight:bold;">Add Money</a>
                                     <?php } else { ?>
                                          <a href="GamePortal" style="color:#3093CC;text-decoration:underline;font-weight:bold;">Add Money</a>
                                     <?php } ?>
                                <?php
                            }?>
                        </td>
                    </tr>
                </table>
                
                
                
                
                
                
                
                
                
                
                <?php } ?>
            </form>
            <?php } else {
            
             ?>
            <form action="" method="post" target="_self" <?php echo ($item['auctiontype']=='m2w') ? " onsubmit='return CheckLimits()' " : "";?> >
                <input type="hidden" value="1" name="doAction" id="doAction">
                <input type="hidden" value="<?php echo $_REQUEST['buynow'];?>" name="productid" id="productid">
                <input type="hidden" value="<?php echo $_REQUEST['buynow'];?>" name="itemid" id="itemid">
                
                <table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="400">
                    <?php if  ($item['auctiontype']=='tba') 
                    { ?>
                    <tr>
                        <td colspan="3" style="padding-left:0px;padding-right:0px"><div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Information</div>   </td>    
                    </tr>
                    <tr>
                        <td colspan="3" style="border:none;">
                          
                            <?php if ( $item['auctiontype']=='tba')  { ?>
                            Closed In
                            <table cellspacing="1" cellpadding="0">
                                <tr>
                                    <td><div id="cBox"><span id="daysBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="hoursBox_<?php echo $i;?>" class="timeresult"></span><br><span id="hhBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="minsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="secsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $i;?>" class="timecaption"></span></div></td> 
                                </tr>
                            </table>
                            <?php } ?>
                           <span style="color:#666">
                            Example: Put all bids from <?php echo $currency;?>. 00.01  to <?php echo $currency;?>. 99.99
                           </span>
                           
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
           <?php } elseif ($item['auctiontype']=='m2w')
           
            { ?>
             
            <tr>
                <td colspan="3" style="padding-left:0px;padding-right:0px">
                <div style="border:4px  solid #F9D49D;background:#F9D49D;font-weight:Bold;color:#fff;padding:5px;margin-bottom:10px;color:#222;border:4px solid #EAB264;">Lucky Number Must have <?php echo $item['secretkeyrange'];?></div>
                
                <script>
                <?php $c = explode("-",$item['secretkeyrange']); ?>
                  var fLimit=<?php echo trim($c[0]);?>;
                  var tLimit=<?php echo trim($c[1]);?>;
                </script>
                <div style="border-bottom:2px solid #999999;padding-bottom:5px;margin-bottom:5px;font-size:12px;font-weight:bold;color:#333333">Enter Your Lucky Number</div>   </td>    
            </tr>
            <tr style="background:#EBF5FE;">
                <td width="10">1.</td><td>Lucky Number</td>
                <td width="200">&nbsp;
                    <input name="rs[1]" id="rs_1" type="text" size="14" maxlength="6" style="font-size:11px;">
                     
                </td>  
            </tr>
            <tr style="background:#D6EBFE;">
                <td>2.</td><td>Lucky Number</td><td><input name="rs[2]" id="rs_2" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#EBF5FE;">
                <td>3.</td><td>Lucky Number</td><td><input name="rs[3]" id="rs_3" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#D6EBFE;">
                <td>4.</td><td>Lucky Number</td><td><input name="rs[4]" id="rs_4" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#EBF5FE;">
                <td>5.</td><td>Lucky Number</td><td><input name="rs[5]" id="rs_5" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#D6EBFE;">
                <td>6.</td><td>Lucky Number</td><td><input name="rs[6]" id="rs_6" type="text" size="14" maxlength="8" style="font-size:11px;"></td>
            </tr>
            <tr style="background:#EBF5FE;">
                <td colspan="3"><div id="error_list" style="color:red"></div></td>
            </tr>
            </table>
              <br><br>
            <?php }  elseif ($item['auctiontype']=='s2w') { ?>
             </table>  <bR><Br><Br>       <bR><Br><Br>       <bR><Br><Br>  
              <script>
                 $('#s2w_btn').trigger("click");
               
            </script>                       
             <?php } ?>
            <input type="submit" value="Continue" name="s2w_btn" id="s2w_btn" class="btn btn-primary btn-sm">
           
            </form>
             <?php } ?>   
         </div>    
   </div>
<br>
<script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $i;?>');</script>            
<?php } else {?>
You are  not allow to run
<?php } ?>                                         
</div>
</article>
</div>

<script>
    function  CheckLimits() {
        var errors=0;
        var empty=0;
        
        for(i=1;i<=6;i++) {
            $('#rs_'+i).css({'border':'1px solid #ccc'})
        }
        $('#error_list').html("");
        
        for(i=1;i<=6;i++) {
            if ($('#rs_'+i).val().trim().length==0) {
                empty++;
            } else {
                if (!(parseInt($('#rs_'+i).val())>=fLimit && parseInt($('#rs_'+i).val())<=tLimit)) {
                    $('#rs_'+i).css({'border':'1px solid red'})
                    errors++;
                }
            }
        }
        if (empty==6) {
            $('#error_list').html("Please enter any one lucky number and submit");
            return false; 
        }
        
        if (errors>0) {
            $('#error_list').html("Values must have between "+fLimit+" to "+tLimit);
            return false;
        }
        return true;
    }
</script>
<!-- 512 -->