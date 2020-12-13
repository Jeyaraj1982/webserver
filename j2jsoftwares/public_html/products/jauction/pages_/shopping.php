    <script>getMenuItems('shopping');</script>  
    <?php
        $c   = 0;
        $sql = (isset($listid))  ? " and category=".$listid." " :  " " ;
        
        foreach($mysql->select("select * from _items where ispublish=1 and auctiontype='shopping'".$sql) as $item) {
            $i = $item['itemid'];
    ?>
        <div onmouseover="$(this).css({border:'1px solid #999999','box-shadow':'4px 4px 2px #999999'})" onmouseout="$(this).css({border:'1px solid #E5E5E5','box-shadow':'0px 0px 0px #ffffff'})" style="border-radius:6px;float:left;width:245px;height:415px;border:1px solid #E5E5E5;margin-right:<?php echo ($c<2) ? '10px' : '0px'; ?>;margin-bottom: <?php echo ($c<2) ? '10px' : '0px'; ?>;" >
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" style="height:230px;vertical-align: middle"><div style="text-align: center;"><img src="productimages/<?php echo $item['productimage']; ?>"    height="180" width="180"></div></td>
                </tr>
                <tr>
                    <td colspan="2" style="background:url(images/bg-name.png) repeat-x;border-top:1px solid #E5E5E5;padding:15px;">
                        <div style="height:33px;overflow:hidden;margin-bottom:10px;">
                            <a  target="_self" href="product/<?php echo $item['itemid'];?>" class="_mnu"><?php echo $item['itemname'];?></a>
                        </div>
                        <table>
                            <tr>
                                <td style="color:#666;font-size:11px;" colspan="2">MRP: <strike>Rs. <?php echo $item['mrp']; ?></strike></td>
                            </tr>
                            <tr>
                                <td style="color:#666;font-weight:bold;">Our Price</td>
                                <td><img src='images/rupee-symbol-small.png'><span style='font-weight:bold;font-size:23px;'><?php echo $item['ourprice']; ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:5px;text-align: center;">
                   Coupen Points :  <?php echo $item['points']; ?>
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
        </div>
    <?php 
            $c++; 
            if ($c>2) { $c=0;} 
        } 
    ?>   