<?php include_once("game_clients/menu.php");?>
<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <h4> Scratch and Win Cash</h4>
               <p align="right">
                              <A href="S2W_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Offer" style="color:#8E1D49;font-weight:bold">Take Free</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
            <div class="row">
                <?php
                    $items = $mysql->select("select * from _items where auctiontype='s2w'  and ispublish='1' ");      
                    foreach($items as $item) {
                       /* $bidusers = $mysql->select("select * from _bids as b where b.productid='".$item['itemid']."'   ");
                        if (sizeof($bidusers)==0) {
                            $percentage=0;
                        } else {
                            $percentage =  (sizeof($bidusers)/$item['maximumbids'])*100;
                            if ($percentage<100) {
                                $percentage = number_format(100-$percentage,2);
                            } else {
                                $percentage = 100;
                            }
                        } */
                ?>
                <div class="col-sm-4" style="overflow:hidden;background:#fff;" >
                    <div style="border:1px solid #ccc;padding:10px">
                        <table cellpadding="0" cellspacing="0" style="border:none;width:100%">
                        <tr>
                            <td style="padding-left:5px">
                                <div style="color:#666666;font-family: arial;font-size:18px;">
                                    <span class="text-success" style="font-weight:bold;"><?php echo $item['itemname'];?></span>
                                </div>
                               
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #fff"  ><div style="text-align: center;"><img src="assets/products/<?php echo $item['productimage']; ?>" width="100%" height="265"></div></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;background: #fff" >
                                <table style="margin:0px auto;border:1px solid orange">
                                    <tr>    
                                        <td style="border:none;">
                                            <div style="border:1px solid #ffffff;background:#ffffff;border-radius:5px;;font-family: arial;font-size:14px;padding:5px;text-align:center;color:#666666">
                                                <span style="font-weight:bold"><?php echo $item['bidamount'];?></span> / Seat
                                            </div>
                                        </td>
                                        <td style="border: none;text-align:right">
                                        <?php if ($percentage<100) { ?>
                                            <a href="buynow?buynow=<?php echo $item['itemid']; ?>" class="btn btn-primary" style="color:#fff"> Buy Now </a>        
                                        <?php } else { ?>
                                            Winner :   <?php echo $dealmaass->getWinnerM2W($item['itemid']);?>
                                        <?php  } ?>
                                             
                                        
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </article>                                                                   
    </div>
</div>