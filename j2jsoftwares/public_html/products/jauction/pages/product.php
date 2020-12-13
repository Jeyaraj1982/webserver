<script>getMenuItems('shopping');</script>    

<?php foreach($mysql->select("select * from _items where itemid=".$productid) as $item) { ?>

    <div style="width:760px;border:1px solid #cccccc;" >
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top">
                    <div style="color:#333333;font-family: arial;font-size:19px;height:44px;padding:15px;font-weight:bold;">
                    <a  target="_self" href="javascript:void(0)"><?php echo $item['itemname'];?></a>
                    </div>
                    <table cellpadding="2" cellspacing="0" style="font-size:12px;color:#186591;font-weight: bold;margin:20px;margin-top:0px;">
                        <table>
                            <tr>
                                <td style="color:#666;font-size:11px;" colspan="2">MRP: <strike>Rs. <?php echo $item['mrp']; ?></strike></td>
                            </tr>
                            <tr>
                                <td style="color:#666;font-weight:bold;">Our Price</td>
                                <td><img src='images/rupee-symbol-small.png'><span style='font-weight:bold;font-size:23px;'><?php echo $item['ourprice']; ?></span></td>
                            </tr>
                        </table>
                        
                        <table cellspacing="1" cellpadding="0" align="center">
   
                                <tr>
                                    <td colspan="5" style="padding: 15px ">
                                        <form action="" method="post" name="addCard_<?php echo $item['itemid'];?>" id="addCard_<?php echo $item['itemid'];?>" target="_self">
                                            <input type="hidden" value="<?php echo md5($item['itemid']);?>" name="cartItem" id="cartItem">
                                        </form>
                                        <form action="p/viewCart" method="post" name="viewCard_<?php echo $item['itemid'];?>" id="viewCard_<?php echo $item['itemid'];?>" target="_self">
                                            <input type="hidden" value="<?php echo md5($item['itemid']);?>" name="cartItem" id="cartItem">
                                        </form>
                                        <table align="center">
                                            <tr>
                                                <td style="text-align: center;"><a href="javascript:void(0)" target="_self" onclick="$('#addCard_<?php echo $item['itemid'];?>').submit();"><img onmouseover="this.src='images/addCartG.png';$(this).css({height:'29px'})"  onmouseout="this.src='images/addCart.png';$(this).css({height:'29px'})" src="images/addCart.png" style="height:29px"></a></td>
                                                <td style="text-align: center;"><a href="javascript:void(0)" target="_self"  onclick="$('#viewCard_<?php echo $item['itemid'];?>').submit();"><img onmouseover="this.src='images/shopNowG.png';$(this).css({height:'28px'})"  onmouseout="this.src='images/shopNow.png';$(this).css({height:'28px'})" src="images/shopNow.png" style="height:28px"></a></td>
                                            </tr>
                                        </table>
                                    </td>
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
            