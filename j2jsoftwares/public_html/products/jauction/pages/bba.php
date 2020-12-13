<script>getMenuItems('bidBased');</script>    

<?php foreach($mysql->select("select * from _items where auctiontype='bba' and itemid=".$bbaID) as $item) { ?>

    <div style="width:760px;border:1px solid #cccccc;" >
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top">
                    <div style="color:#333333;font-family: arial;font-size:19px;height:44px;padding:15px;font-weight:bold;">
                    <a  target="_self" href="bba/<?php echo $item['itemid'];?>" class="_mnu"><?php echo $item['itemname'];?></a>
                    </div>
                    <table cellpadding="2" cellspacing="0" style="font-size:12px;color:#186591;font-weight: bold;margin:20px;margin-top:0px;">
                        <tr>
                            <td colspan="2" style="paddding;0px;"><img src="images/bidnow.png"><br><Br></td>
                        </tr>
                        <tr>
                            <td>Bid Placed</td>
                            <td>
                                <div style='float:left;border:1px solid #ccc;width:200px;background:#F4FBFF'>
                                    <div style='background:url(images/progress-10.gif);width:50%;height:15px;'></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bid Remaining</td>
                            <td style="font-weight:normal;color:#444444;">0</td>
                        </tr>                               
                        <tr>
                            <td>Product Price</td>
                            <td style="font-weight:normal;color:#444444;">Rs. <?php echo $item['price'];?></td>
                        </tr> 
                        <tr>
                            <td>Bid Price</td>
                            <td style="font-weight:normal;color:#444444;">Rs. <?php echo $item['bidamount'];?>.00/per Bid</td>
                        </tr>  
                        <tr>
                            <td>Lowest Unique bidder</td>
                            <td style="font-weight:normal;color:#444444;">0</td>
                        </tr>                                                      
                    </table>
                </td>
                <td style="text-align: center;vertical-align: middle" width="280"><img src="productimages/<?php echo $item['productimage']; ?>"    height="280" width="280"    ></td>
            </tr>
        </table>
        <br> 
        <div style="font-family;arial;padding:20px">  
    <h3>Product Description</h3>
    <?php echo $item['description'];?>
    </div>
    </div>
    
<?php } ?>
            