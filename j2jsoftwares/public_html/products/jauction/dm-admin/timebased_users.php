<?php
    include_once("config.php");
    
?>
<table cellpadding="5" cellspacing="0" border="1">
    <tr>
        <td>Date Time</td>
        <td>User Name</td>
        <td>Bid Rate</td>
    </tr>
    <?php
        $bidusers = $mysql->select("select * from _bids as b, _usertable as u where b.userid=u.userid and md5(b.productid)='".$_REQUEST['product']."' group by b.bidid ");
        $bid = $dealmaass->getLowestBidRate($bidusers[0]['productid']);
        
        foreach($bidusers as $b) {
            ?>
             <tr style="<?php echo ($bid[0]['bidrate']==$b['bidrate']) ? 'background:lime' : '';?>">
                <td><?php echo $b['bidon'];?></td>
                <td><?php echo $b['personname'];?></td>
                <td><?php echo $b['bidrate'];?></td>
            </tr>
            <?php
            
        }
    ?>
    
</table> 