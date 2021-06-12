             <?php include_once("game_clients/menu.php");?>
     <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <article class="s-9 m-7 l-9">
                 
<h4>Bid History</h4>
 
                                                
<div class="row">




 <div class="col-sm-12"  >
 
    
    <h5 style="margin-bottom:0px;padding-bottom:3px">Time Based Auctions</h5>
       <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#7dcde8;color:#333;font-weight:bold;;text-align:center;">
            
            <td style="border-bottom:1px solid #333">Product</td>
            <td style="border-bottom:1px solid #333">Bid Rate</td>
            <td style="border-bottom:1px solid #333">Bid Price</td>
            <td style="border-bottom:1px solid #333">Status</td>
            <td style="border-bottom:1px solid #333">Bidden On</td>
        </tr>
        <?php
            $i=1;
            foreach($mysql->select("select * from _bids as _b, _items as _i where   _i.auctiontype='tba' and _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid") as $bids) {
                
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
  </div>
  
  <div class="col-sm-12"  >    
    
    <h5 style="margin-bottom:0px;padding-bottom:3px">Match to Win</h5>
     <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#7dcde8;color:#333;font-weight:bold;;text-align:center;">
 
            <td style="border-bottom:1px solid #333">Product</td>
            <td style="border-bottom:1px solid #333">Lucky No</td>
            <td style="border-bottom:1px solid #333">Bid Price</td>
            <td style="border-bottom:1px solid #333">Status</td>
             <td style="border-bottom:1px solid #333">Bidden On</td>
        </tr>
        <?php
            $i=1;
            
            
            foreach($mysql->select("select * from _bids as _b, _items as _i where  _i.auctiontype='m2w' and _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid") as $bids) {
                
                 $bg = ($i%2 ==0) ? "#FFF2E0" : "#FFF8EF";   
                 $d = $mysql->select("select * from _items where itemid=".$bids['productid']); 
                 
                   $bidusers = $mysql->select("select * from _bids as b where b.productid='".$bids['productid']."'   ");
                   $percentage =  (sizeof($bidusers)/$d[0]['maximumbids'])*100;
                   if ($percentage<100) {
                        $percentage = number_format(100-$percentage,2);
                   } else {
                       $percentage = 100;
                   }
                 if ($d[0]['maximumbids']<=sizeof($bidusers)) {
                        if ($bids['bidrate']==$d[0]['skey']) {          
                            $txt =  "Match";
                             $bg = "#C17F22;font-weight:bold;color:#fff";
                        } else {
                            $txt =  "Not Match";
                        }                                   
                 } else {
                     
                     //$txt = " require  ".($percentage)."% bids to close this auction";
                     $txt =  "Not Match";
                 }
            
        ?>
        <tr style="background:<?php echo $bg;?>;">
         
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
     </div>
     
     
       
  <div class="col-sm-12"  >    
    
    <h5 style="margin-bottom:0px;padding-bottom:3px"> Scratch to Win Cash</h5>
     <table style="font-family:arial;font-size:12px;color:#444444;border:1px solid #F9D49D;border-bottom:1px solid #333;" cellpadding="8" cellspacing="0" width="100%">  
        <tr style="background:#7dcde8;color:#333;font-weight:bold;;text-align:center;">
 
            <td style="border-bottom:1px solid #333">Product</td>
            <td style="border-bottom:1px solid #333">Bid Price</td>
            <td style="border-bottom:1px solid #333">You won</td>
            <td style="border-bottom:1px solid #333">Status</td>
             <td style="border-bottom:1px solid #333">Bidden On</td>
             <td style="border-bottom:1px solid #333">Details</td>
        </tr>
        <?php
            $i=1;
            
            
            foreach($mysql->select("select * from _bids as _b, _items as _i where  _i.auctiontype='s2w' and _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid") as $bids) {
                
              if ($bids['bidrate']>=0)     {
                  $txt = "Completed";
              } else {
                  $txt = "Expired";
              }
            
        ?>
        <tr style="background:<?php echo $bg;?>;">
            <td><?php echo $bids['itemname'];?>.</td>
            <td width="80" style="text-align: right"><?php echo number_format($bids['bidamount'],2);?></td>
            <td width="80" style="text-align:right"><?php echo number_format($bids['bidrate'],2);?></td>
            <td> <?php echo $txt; ?></td>  
            <td><?php echo $bids['bidon'];?></td>  
            <td><?php echo $bids['remarks'];?></td>  
        </tr>
        <?php
                $i++;  
            }
        ?>
    </table>  
     </div>
         
</div>
</article>
</div>
</div>