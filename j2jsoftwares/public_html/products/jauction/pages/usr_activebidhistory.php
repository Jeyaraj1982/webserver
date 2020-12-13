<h2>Active Bids History</h2>

<h3 style="margin-bottom:0px;padding-bottom:3px">Time Based Auctions</h3>
<table style="font-family:arial;font-size:12px;color:#444444" cellpadding="8" cellspacing="0" width="100%">  
                        <tr style="background:#3093CC;color:#fff;font-weight:bold;">
                    <td>Sl. No</td>
                    <td>Product</td>
                    <td>Bid Rate</td>
                    <td>Bid Amount</td>
                    <td>status</td>
                 </tr>
<?php
    
$i=1;
     
        foreach($mysql->select("select * from _bids as _b, _items as _i where _b.userid='".$_SESSION['USER']['userid']."' and _i.itemid=_b.productid and date('".date("Y-m-d H:i:s")."')<=date(_i.endon)") as $bids) {
           
            if ($i%2 ==0)  {
               $bg = "#EBF5FE"; 
            }   else {
                
                  $bg = "#D6EBFE";
            }
            ?>
            
             <tr style="background:<?php echo $bg;?>;">
                    <td width="40"><?php echo $i;?>.</td>
                    <td><?php echo $bids['itemname'];?>.</td>
                        <td width="80"><?php echo number_format($bids['bidrate'],2);?></td>
                        <td width="80">Rs. <?php echo number_format($bids['bidamount'],2);?></td>
                        <td>
                           <?php
    $ch = $mysql->select("select bidrate, count(*) as c from _bids where productid='".$bids['productid']."' and userid='".$_SESSION['USER']['userid']."' and bidrate='".$bids['bidrate']."' group by bidrate ");
    if ($ch[0]['c']==1) {
      
        
        $chb = $mysql->select("select min(bidrate) as bidrate from _bids where productid='".$bids['productid']."' and userid='".$_SESSION['USER']['userid']."'");  
        
        if ($chb[0]['bidrate']==$bids['bidrate']) {
            $txt = "Lowest Unique Bid";
        } else {
            $txt = "Unique But Not Lowest";
        }
        
                
    } else {
        
        if ($chb[0]['bidrate']==$bids['bidrate']) {
             $txt = "Lowest and Not Unique bid";   
        } else {
            $txt = "Not Unique ";
        }
        
        
     
    }
    echo $txt;
?>
                        
                        </td>  
                </tr>
            <?php
            $i++;  
            }
?>
</table>