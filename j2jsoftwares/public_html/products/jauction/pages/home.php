
<div>
    <table>
        <tr>
            <td colspan="3"><h2>Indian Based Value</h2></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <?php
                    $c = 0;
                    foreach($mysql->select("select * from _items where date('".date("Y-m-d H:i:s")."')<=date(endon) and productfrom='India' and auctiontype='tba' order by itemid desc limit 0,1" ) as $item) {
                        include("classes/widget_tba.php");
                    }
                ?>
                <div style="clear:both">
                    <a href="http://www.wincashdeal.com/p/tba_howto_play">How To Play</a> | <a href="http://www.wincashdeal.com/p/tba_live_auctions">More Products</a>
                </div>
            </td>
            <td style="vertical-align:top;">
                <?php 
                    foreach($mysql->select("select * from _items where auctiontype='bba'   and productfrom='India' order by itemid desc limit 0,1 ") as $item) {  
                        include("classes/widget_bba.php");
                    } 
                ?>
                 <div style="clear:both">
                    <a href="http://www.wincashdeal.com/p/bba_howto_play">How To Play</a> | <a href="http://www.wincashdeal.com/p/bba_live_auctions">More Products</a>
                </div>
            </td>
            <td style="vertical-align:top;">
                <?php 
                    foreach($mysql->select("select * from _items where auctiontype='m2w' and productfrom='India' order by itemid asc limit 0,1 ") as $item) {  
                        include("classes/widget_m2w.php");
                    } 
                ?>
                 <div style="clear:both">
                    <a href="http://www.wincashdeal.com/p/btow_howto_play">How To Play</a> | <a href="http://www.wincashdeal.com/p/btow_live_auctions">More Products</a>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3"><h2>Malaysian Based Value</h2></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <?php
                    foreach($mysql->select("select * from _items where date('".date("Y-m-d H:i:s")."')<=date(endon) and productfrom='Malaysia' and auctiontype='tba' order by itemid desc limit 0,1") as $item) {
                        include("classes/widget_tba.php");
                    }
                ?>
                <div style="clear:both">
                    <a href="http://www.wincashdeal.com/p/bba_howto_play">How To Play</a> | <a href="http://www.wincashdeal.com/p/bba_live_auctions">More Products</a>
                </div>
            </td>
            <td style="vertical-align:top;">
                <?php 
                    foreach($mysql->select("select * from _items where auctiontype='bba' and productfrom='Malaysia' order by itemid desc limit 0,1 ") as $item) {  
                        include("classes/widget_bba.php");
                    } 
                ?>
                 <div style="clear:both">
                    <a href="http://www.wincashdeal.com/p/bba_howto_play">How To Play</a> | <a href="http://www.wincashdeal.com/p/bba_live_auctions">More Products</a>
                </div>
            </td>
             <td style="vertical-align:top;">
                <?php 
                    foreach($mysql->select("select * from _items where auctiontype='m2w' and productfrom='Malaysia' order by itemid desc limit 0,1 ") as $item) {  
                        include("classes/widget_m2w.php");
                    } 
                ?>
                 <div style="clear:both">
                    <a href="http://www.wincashdeal.com/p/btow_howto_play">How To Play</a> | <a href="http://www.wincashdeal.com/p/btow_live_auctions">More Products</a>
                </div>
            </td>
        </tr>
    </table>
</div>
    
    
 


      
             