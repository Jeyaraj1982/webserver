

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


<h5 style="text-align: left;font-family: arial;">Services</h5> 


 
<?php
 
 if (isset($_POST['deleteBtn'])) {
        $mysql->execute("delete from _tblservices where ServiceID='".$_POST['ServiceID']."'");
        echo "<script>alert('Deleted successfully');</script>";
 }
    
    //where date(endon)>=date('".date("Y-m-d H:i:s")."')
    $products = $mysql->select("select * from _tblservices order by ServiceID desc");
               ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr  style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Description</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;"> </td>
                        </tr>
               <?php
    foreach($products as $p ) {
 
        
        ?>
        <tr style="background: <?php echo $bgcolor;?>">
            <td style="padding-left:5px;padding-right:5px;text-align:center"><img src="assets/services/<?php echo $p['photopath'];?>" style="width:100px"><br><?php echo $p['test_name'];?></td>
            <td style="text-align:left;padding-left:5px;padding-right:5px;">
            <?php echo $p['ServiceName'];?><br>
            <?php echo $p['Description'];?>
            </td>
            <td style="width:150px;text-align:right;">
                
                <form action="" method="post">      
                    <input type="hidden" name="ServiceID" value="<?php echo $p['ServiceID'];?>">
                    <a href="Service_Edit?item=<?php echo md5($p['ServiceID']);?>" class="btn btn-primary btn-sm" style="color:#fff">Edit</a>
                    <input type="submit" name="deleteBtn" value="Delete" class="btn btn-danger btn-sm">
                </form>
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

 