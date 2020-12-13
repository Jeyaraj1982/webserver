<?php
    include_once("classes/mysql.php");
    $mysql = new MySql();
    
    //where date(endon)>=date('".date("Y-m-d H:i:s")."')
    $products = $mysql->select("select * from _items");
               ?>
                    <table cellpadding="3" cellspacing="0" style="font-size:12px;font-family:arial;">
                        <tr  style="background:#f1f1f1;font-weight:bold;">
                            <td style="border:1px solid #f1f1f1">Item Name</td>
                            <td style="border:1px solid #f1f1f1">Bid Amount</td>
                            <td style="border:1px solid #f1f1f1">End On</td>
                            <td style="border:1px solid #f1f1f1">Price</td>
                            <td style="border:1px solid #f1f1f1">Bid Sold</td>
                        </tr>
               <?php
    foreach($products as $p ) {
        ?>
        <tr>
            <td style="border:1px solid #f1f1f1"><?php echo $p['itemname'];?></td>
            <td style="border:1px solid #f1f1f1"><?php echo $p['bidamount'];?></td>
            <td style="border:1px solid #f1f1f1"><?php echo $p['endon'];?></td>
            <td style="border:1px solid #f1f1f1"><?php echo $p['price'];?></td>
            <td style="border:1px solid #f1f1f1"><?php echo $p['price'];?></td>  
        </tr>        
        <?php
    }
?>