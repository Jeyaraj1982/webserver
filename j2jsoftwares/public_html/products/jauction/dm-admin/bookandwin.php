<h3 style="font-family:arial">Book To Win</h3>
<?php
 include_once("config.php");
    
    //where date(endon)>=date('".date("Y-m-d H:i:s")."')
    $products = $mysql->select("select * from _items where auctiontype='m2w'");
               ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr  style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Item Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Unit Price (Rs)</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Bid Price (Rs)</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Sold Bids (Nos)</td>
                             <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Total Sales (Rs)</td> 
                             <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Profit (Rs)</td> 
                             <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Posted on</td> 
                             <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Winkey</td> 
                             <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">&nbsp;</td> 
                        </tr>
               <?php
    foreach($products as $p ) {
        
        if (strtotime($p['endon'])<=time()) {
                 $bgcolor='#FFEAEA';        
        } else {
              $bgcolor='#EFFCF2'; 
           
        }
        
        ?>
        <tr style="background: <?php echo $bgcolor;?>">
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['itemname'];?></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px;"><?php echo $p['price'];?></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px;"><?php echo $p['bidamount'];?></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px;">0</td>  
            <td style="text-align:right;padding-left:5px;padding-right:5px;">0</td> 
            <td style="text-align:right;padding-left:5px;padding-right:5px;">0</td>  
             <td style="text-align:right;padding-left:5px;padding-right:5px;"><?php echo $p['posted'];?></td>  
             <td style="text-align:right;padding-left:5px;padding-right:5px;"><?php echo $p['skey'];?></td> 
            <td style="">
               <!-- <a href='javascript:void(0)'  onclick="window.open('bookandwin_edit.php?item=<?php echo md5($p['itemid']);?>','GoogleWindow', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,width=480,height=480');" style="color:#444444">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;-->
                <a href='bookandwin_edit.php?item=<?php echo md5($p['itemid']);?>'  style="color:#444444">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href='javascript:void(0)'  onclick="window.open('bookandwin_edit.php?item=<?php echo md5($p['itemid']);?>','GoogleWindow', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,width=390,height=435');" style="color:#444444">View</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
                <a href='timebased_users.php' style="color:#444444">Users</a> </td>  
        </tr>        
        <?php
    }
?>
