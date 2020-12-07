
<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
        <div class="box">
            <?php include_once("rightmenu.php"); ?>
        </div>
    </div>
    <div class="s-12 m-6 l-9 margin-bottom">
        <div class="box">
            <h5 style="text-align: left;font-family: arial;">Bid History</h5> 

 
<table cellpadding="5" cellspacing="0" border="1">
    <tr>
        <td>Date Time</td>
        <td>User Name</td>
        <td>Bid Rate</td>
    </tr>
    <?php
        $bidusers = $mysql->select("select * from _bids as b, _usertable as u where b.userid=u.userid and md5(b.productid)='".$_REQUEST['product']."' ");
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

</div>
</div>
</div>
</div>
