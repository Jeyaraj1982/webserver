

 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">


<h5 style="text-align: left;font-family: arial;">Winners</h5> 


 
<?php
 
    
    //where date(endon)>=date('".date("Y-m-d H:i:s")."')
    $products = $mysql->select("select * from _tblwinners order by id desc");
               ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr  style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Description</td>
                            
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Profile Photo</td>
                            <td width="100"></td>
                        </tr>
               <?php
    foreach($products as $p ) {
        
         if ($p['IsPublish']!=1) {
                 $bgcolor='#FFEAEA';        
        } else {
              $bgcolor='#EFFCF2'; 
           
        }
        
        ?>
        <tr style="background: <?php echo $bgcolor;?>">
            <td style="padding-left:5px;padding-right:5px;text-align:center"><img src="assets/winners/<?php echo $p['photopath'];?>" style="width:100px"><br><?php echo $p['test_name'];?></td>
            <td style="text-align:left;padding-left:5px;padding-right:5px;">
            <?php echo $p['productname'];?><br>
            <?php echo $p['testimonials'];?>
            <br>Date : <?php echo $p['date'];?> .
            </td>
             
            <td style="padding-left:5px;padding-right:5px;text-align:center"><img src="assets/winners/<?php echo $p['ProductPhoto'];?>" style="width:100px"></td>
            <td style="">
                <a href='winners_edit?item=<?php echo md5($p['id']);?>'  style="color:#444444">Edit</a>
                <!-- &nbsp;|&nbsp;
                <a href='winners_view?item=<?php echo md5($p['id']);?>'  style="color:#444444">View</a>  -->
            </td>  
        </tr>        
        <?php
    }
?>

     </table>
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 