<?php include_once("game_clients/menu.php");?> 
<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <h4>Time Based auction</h4>                    
            <p align="right">
                              <A href="TBA_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Offer" style="color:#8E1D49;font-weight:bold">Take Free</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
            <div class="row">
                <?php
                    $items = $mysql->select("select * from _items where ispublish='1' and auctiontype='tba'  and endon >= '".date("Y-m-d H:i:s")."' ");
                    foreach($items as $item) { 
                ?>   
                <div class="col-sm-4">
                    <div style="border:1px solid #ccc;padding:10px">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border:none;">
                            <tr>
                                <td style="padding-left:5px;border:none">
                                    <div style="color:#666666;font-family: arial;font-size:18px;">
                                    <span class="text-success" style="font-weight:bold;"><?php echo $item['itemname'];?></span>
                                </div>
                                <div>INR <?php echo number_format($item['price'],2);?>/-</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#fff;border:none">
                                    <img src="assets/products/<?php echo $item['productimage']; ?>" style="width:80%;margin:0px auto">
                                </td>
                            </tr>
                            <tr>                     
                                <td style="border:none;padding:0px;">
                                    <div>&nbsp;&nbsp;Closed In</div>
                                    <table cellspacing="0" cellpadding="0"   style="border:none;">
                                        <tr>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="daysBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="hoursBox_<?php echo $item['itemid'];?>" class="timeresult"></span><br><span id="hhBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="minsBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="secsBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td> 
                                        </tr>                            
                                        <tr>
                                            <td colspan="4" style="border:none;background:#fff;padding:5px">
                                                <table width="100%" style="border:1px solid orange">
                                                    <tr style="background:#fff;">    
                                                        <td style="padding:3px;">
                                                            <div style="text-align:center;color:#666666;font-size:15px;"><?php echo $item['bidamount'];?> / Bid</div>
                                                        </td>
                                                        <td style="border:none;text-align:right;padding:3px">
                                                            <a href="buynow?buynow=<?php echo $item['itemid']; ?>" class="btn btn-primary" style="color:#fff"> Buy Now </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>                                                                                  
                            </tr>
                            <tr>
                                <td style="background:#f1f1f1;height:40px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">Current Lowest Unique bidder:
                                    <?php echo $dealmaass->GetLowestBidUserName($item['itemid']); ?>
                                </td>
                            </tr>       
                        </table>
                        <script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $item['itemid'];?>');</script>
                    </div>
                </div>
                <?php } ?>
            </div>
        </article>
    </div>                                                   
</div>