<script>getMenuItems('mypage');</script>  
<h2>Bids History</h2>
<?php $currency = ($_SESSION['USER']['country']=="India") ? 'RS' : 'RM'; ?>

    <h3 style="margin-bottom:0px;padding-bottom:3px;">Time Based Auctions</h3>
    
    <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#F9D49D;color:#333;font-weight:bold;text-align:center;">
            <td style="border-bottom:1px solid #333">Sl. No</td>
            <td style="border-bottom:1px solid #333">Product</td>
            <td style="border-bottom:1px solid #333">Bid Rate (<?php echo $currency;?>)</td>
            <td style="border-bottom:1px solid #333">Bid Price(<?php echo $currency;?>)</td>
            <td style="border-bottom:1px solid #333">Status</td>
            <td style="border-bottom:1px solid #333">Bidden On</td>
        </tr>
        <?php
            $i=1;
            
            foreach($mysql->select("select * from _bids as _b, _items as _i where  _i.productfrom='".$_SESSION['USER']['country']."' and  _i.auctiontype='tba' and _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid") as $bids) {
                
                $bg = ($i%2 ==0) ? "#FFF2E0" : "#FFF8EF";  
                $ch = $mysql->select("select bidrate, count(*) as c from _bids where productid='".$bids['productid']."' and bidrate='".$bids['bidrate']."' group by bidrate ");
                
                $chb = $mysql->select("select min(bidrate) as bidrate from _bids where productid='".$bids['productid']."'"); 
                    
                    if ($ch[0]['c']==1) {
                         $b = $dealmaass->getLowestBidRate($bids['productid']);
                         if ($b[0]['bidrate']==$bids['bidrate']) {
                             $txt = "Lowest Unique Bid";
                             $bg = "#C17F22;font-weight:bold;color:#fff";
                         } else {
                             $txt = "Unique But Not Lowest";
                         }
                    } else {
                        //not unique
                        $txt = ($chb[0]['bidrate']==$bids['bidrate']) ? "Lowest and Not Unique bid" : "Not Unique ";
                    }
                   
                ?>
                
        <tr style="background:<?php echo $bg;?>;">
            <td width="40"><?php echo $i;?>.</td>
            <td><?php echo $bids['itemname'];?>.</td>
            <td width="80" style="text-align:right"><?php echo number_format($bids['bidrate'],2);?></td>
            <td width="80" style="text-align:right"><?php echo number_format($bids['bidamount'],2);?></td>
            <td><?php echo $txt; ?></td>  
            <td><?php echo $bids['bidon'];?></td>
        </tr>
        <?php
                $i++;  
            }
        ?>
    </table>
    
    
    <h3 style="margin-bottom:0px;padding-bottom:3px">Bid Based Auctions</h3>
       <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#F9D49D;color:#333;font-weight:bold;;text-align:center;">
            <td style="border-bottom:1px solid #333">Sl. No</td>
            <td style="border-bottom:1px solid #333">Product</td>
            <td style="border-bottom:1px solid #333">Bid Rate(<?php echo $currency;?>)</td>
            <td style="border-bottom:1px solid #333">Bid Price(<?php echo $currency;?>)</td>
            <td style="border-bottom:1px solid #333">Status</td>
            <td style="border-bottom:1px solid #333">Bidden On</td>
        </tr>
        <?php
            $i=1;
            
            foreach($mysql->select("select * from _bids as _b, _items as _i where  _i.productfrom='".$_SESSION['USER']['country']."' and  _i.auctiontype='bba' and _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid") as $bids) {
                
                 $bg = ($i%2 ==0) ? "#FFF2E0" : "#FFF8EF";    
    
                    $ch = $mysql->select("select bidrate, count(*) as c from _bids where productid='".$bids['productid']."' and bidrate='".$bids['bidrate']."' group by bidrate ");
                        $chb = $mysql->select("select min(bidrate) as bidrate from _bids where productid='".$bids['productid']."'");  
                    if ($ch[0]['c']==1) {
                        
                        
                         $b = $dealmaass->getLowestBidRate($bids['productid']);
                         
                         if ($b[0]['bidrate']==$bids['bidrate']) {
                             $txt = "Lowest Unique Bid";
                             $bg = "#C17F22;font-weight:bold;color:#fff";
                         } else {
                             $txt = "Unique But Not Lowest";
                         }
                    
                    } else {
                        $txt = ($chb[0]['bidrate']==$bids['bidrate']) ? "Lowest and Not Unique bid" : "Not Unique ";
                    }
                    
                ?>
        <tr style="background:<?php echo $bg;?>;">
            <td width="40"><?php echo $i;?>.</td>
            <td><?php echo $bids['itemname'];?>.</td>
            <td width="80" style="text-align:right"><?php echo number_format($bids['bidrate'],2);?></td>
            <td width="80" style="text-align:right"><?php echo number_format($bids['bidamount'],2);?></td>
            <td><?php echo $txt;?></td>  
            <td><?php echo $bids['bidon'];?></td>  
        </tr>
        <?php
                $i++;  
            }
        ?>
    </table>    
    
    <h3 style="margin-bottom:0px;padding-bottom:3px">Match to Win</h3>
     <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#F9D49D;color:#333;font-weight:bold;;text-align:center;">
            <td style="border-bottom:1px solid #333">Sl. No</td>
            <td style="border-bottom:1px solid #333">Product</td>
            <td style="border-bottom:1px solid #333">Lucky No</td>
            <td style="border-bottom:1px solid #333">Bid Price(<?php echo $currency;?>)</td>
            <td style="border-bottom:1px solid #333">Status</td>
             <td style="border-bottom:1px solid #333">Bidden On</td>
        </tr>
        <?php
            $i=1;
            
            foreach($mysql->select("select * from _bids as _b, _items as _i where  _i.auctiontype='m2w' and _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid") as $bids) {
                
                 $bg = ($i%2 ==0) ? "#FFF2E0" : "#FFF8EF";   
                 $d = $mysql->select("select * from _items where itemid=".$bids['productid']); 
            
                if ($bids['bidrate']==$d[0]['skey']) {          
                    $txt =  "Match";
                     $bg = "#C17F22;font-weight:bold;color:#fff";
                } else {
                    $txt =  "Not Match";
                }
            
        ?>
        <tr style="background:<?php echo $bg;?>;">
            <td width="40"><?php echo $i;?>.</td>
            <td><?php echo $bids['itemname'];?>.</td>
            <td width="80"><?php echo $bids['bidrate'];?></td>
            <td width="80" style="text-align: right"><?php echo number_format($bids['bidamount'],2);?></td>
            <td> <?php echo $txt; ?></td>  
            <td><?php echo $bids['bidon'];?></td>  
        </tr>
        <?php
                $i++;  
            }
        ?>
    </table>      