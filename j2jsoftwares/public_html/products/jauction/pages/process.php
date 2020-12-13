<script>getMenuItems('timeBased');</script>  

  <?php
            $c = 0;
                foreach($mysql->select("select * from _items where auctiontype='tba' and itemid='".$_REQUEST['page']."' and date('".date("Y-m-d H:i:s")."')<=date(endon)") as $item) {
                    $i = $item['itemid'];
            ?>
            
            <div style="float:left;width:370px;height:415px;border:1px solid #cccccc;margin-right:<?php echo ($c==0) ? '18px' : '0px'; ?>;margin-bottom: <?php echo ($c==0) ? '18px' : '0px'; ?>;" >
            <?php
                $c++;
                if ($c>1) {
                    $c=0;
                }
?>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="70%" style="padding-left:5px"><div style="color:#666666;font-family: arial;font-size:18px;height:44px">
                        
                          <a  target="_self" href="tba/<?php echo $item['itemid'];?>" class="_mnu"><?php echo $item['itemname'];?></a>           
                        </div></td>
                        <td align="right" valign="top"><div style='background:#A419AA;color:#ffffff;font-family: arial;font-size:12px;width:90px;padding:5px;text-align:left;font-weight:bold;'>Rs. <?php echo number_format($item['price'],2);?>/-</div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div style="text-align: center;"><img src="productimages/<?php echo $item['productimage']; ?>"    height="230" width="230"></div></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table cellspacing="1" cellpadding="0" align="right">
                                <tr>
                                    <td><div id="cBox" style="width:58px;height:26px;padding-top:10px;font-weight:Bold;">Closed In</div></td>
                                    <td><div id="cBox"><span id="daysBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="hoursBox_<?php echo $i;?>" class="timeresult"></span><br><span id="hhBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="minsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                                    <td><div id="cBox"><span id="secsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $i;?>" class="timecaption"></span></div></td> 
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div style="border:0px solid #DD13D0;background-image:url(images/bg.png);width:195px;border-radius:5px;padding:2px;margin-bottom: 5px;">
                                            <table width="100%">
                                                <tr style="cursor: pointer;">    
                                                    <td style="width: 85px;cursor:pointer"><div onclick="location.href='buynow/<?php echo $item['itemid']; ?>'" style="border:1px solid #ffffff;background:#ffffff;width:85px;border-radius:5px;;font-family: arial;font-size:16px;padding:5px;text-align:center;color:#666666">Rs. <?php echo $item['bidamount'];?> / Bid</div></td>
                                                    <td><div style="cursor:pointer;color:#ffffff;font-family: arial;font-size:16px;padding:5px;font-weight:bold;text-align:center" onclick="location.href='buynow/<?php echo $item['itemid']; ?>'">Buy Now</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background:#f1f1f1;padding:5px;height:40px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">Current Lowest Unique bidder:  </td>
                    </tr>    
                </table>
            </div>
            <script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $i;?>');</script>
            <?php } ?>
            
   

