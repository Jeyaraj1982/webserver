  
        <script src="../js/jquery.min.js"></script>
        <style>
            .timecaption {font-family:arial;font-size:10px;}
            .timeresult {font-family:arial;font-size:16px;font-weight:bold;}  
            #cBox {text-align:center;background:#45D4FF;border-radius:5px;padding:2px;width:27px;font-family:arial;font-size:12px;text-align:center;color:#ffffff;border:1px solid #37C9F2}      
            .fadein { position:relative;}
            .lmenu {text-decoration: none;color:#214689;}
            .lmenu:hover {text-decoration: underline;color:#214689;font-weight:bold}
            .fadein img { left:7; top:0; }    
            div {font-family:arial;font-size:12px;}     
            .sub_Menu {cursor:pointer;float:left;color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;text-align:left;border-right:1px dotted #cccccc;padding-left:20px;padding-right: 20px;}
        </style>
        
<?php
 include_once("config.php");   
    $item =  $mysql->select("select * from _items where md5(itemid)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
<div style="float:left;width:370px;height:415px;border:1px solid #cccccc;margin-right:<?php echo ($c==0) ? '18px' : '0px'; ?>;margin-bottom: <?php echo ($c==0) ? '18px' : '0px'; ?>;" >
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="70%" style="padding-left:5px"><div style="color:#666666;font-family: arial;font-size:18px;height:44px"><?php echo $item['itemname'];?></div></td>
            <td align="right" valign="top"><div style='background:#A419AA;color:#ffffff;font-family: arial;font-size:12px;width:90px;padding:5px;text-align:left;font-weight:bold;'>Rs. <?php echo number_format($item['price'],2);?>/-</div></td>
        </tr>
        <tr>
            <td colspan="2"><div style="text-align: center;"><img src="../productimages/<?php echo $item['productimage']; ?>"   height="241"></div></td>
        </tr>
         
    </table>
</div>

 
            