<h3 style="font-family:arial">Winner Courier</h3>
<?php
 include_once("config.php");
    
    //where date(endon)>=date('".date("Y-m-d H:i:s")."')
    $products = $mysql->select("select * from _tblwinners");
               ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr  style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Description</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Courier Copy</td>
                            <td width="100"></td>
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
            <td style="padding-left:5px;padding-right:5px;text-align:center"><img src="../couriers/<?php echo $p['photopath'];?>" height="100" width="80"><br><?php echo $p['test_name'];?></td>
            <td style="text-align:left;padding-left:5px;padding-right:5px;">
            <?php echo $p['productname'];?><br>
            <?php echo $p['testimonials'];?>
            <br>Date : <?php echo $p['date'];?> .
            </td>
            <td style="padding-left:5px;padding-right:5px;text-align:center"><img src="../couriers/<?php echo $p['courierpath'];?>" height="150" width="200"></td>
            <td style="">
                <a href='winners_edit.php?item=<?php echo md5($p['id']);?>'  style="color:#444444">Edit</a> 
            </td>  
        </tr>        
        <?php
    }
?>
