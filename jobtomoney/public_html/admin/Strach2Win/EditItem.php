

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


<h5 style="text-align: left;font-family: arial;">Edit Product</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
     <?php
        if (isset($_POST['btnStopGame'])) {
                 $mysql->execute("update _items set  ispublish='0' where itemid='".$_GET['param']."'");
                 echo "Game has stopped";  
              unset($_POST);                                
        }
         if (isset($_POST['btnAddProduct'])) {
                                                 
                                                // "maximumbids"=>'1000',
                                                 
             
              $mysql->execute("update _items set itemname='".$_POST['itemname']."',
                                                       
                                                       description='".$_POST['description']."',
                                                       bidamount='".$_POST['bidamount']."',
                                                       skey='".$_POST['skey']."',
                                                       ispublish='1' where itemid='".$_GET['param']."'");
                                                 
                                            
                       $target_file = "assets/products/";
              $filename = strtolower(time()."_".$_FILES["ProductImage"]["name"]);
              if (isset($_FILES["ProductImage"]["name"]) && strlen($_FILES["ProductImage"]["name"])>3) {
          
           if (move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file.$filename)) {
                  
              $mysql->execute("update _items set productimage='".$filename."' 
                                                       where itemid='".$_GET['param']."'");
            
         
                                         
    }   
              }
              echo "updated successfully";  
              unset($_POST);
                                           
         }
         $products = $mysql->select("select * from _items where itemid='".$_GET['param']."'");  
     ?>
 
<form action="" method="post" enctype="multipart/form-data">
<table  style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="450px"> 
   
    <tr>
        <td>Item Name</td>
        <td><input type="text" name="itemname" required  class="form-control" value="<?php echo $products[0]['itemname'];?>" ></td>
    </tr>
 
    <tr>
        <td>Description</td>
        <td><textarea class="form-control" name='description' id="ProductDescription"><?php echo $products[0]['description'];?></textarea></td>
    </tr>
    <tr>
        <td>Bid Amount</td>
        <td><input type="text" name="bidamount" class="form-control" value="<?php echo $products[0]['bidamount'];?>" required></td>
    </tr>
    <tr>
        <td>Wining Amounts</td>
        <td><textarea  name="skey" class="form-control"  style="height:500px;font-size:13px;"  required><?php echo $products[0]['skey'];?></textarea><br> (Comma Seperated by amounts)</td>
    </tr>
       <tr>
        <td>Product Image</td>
        <td>
         <img src="assets/products/<?php echo $products[0]['productimage'];?>" style="width:100%;border:1px solid #ccc">
        <input type='file' name="ProductImage" class="form-control"  id="ProductImage"  >
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
        <input type="submit" value="Update Item" name="btnAddProduct" class="btn btn-success">
        <input type="submit" value="Stop Game" name="btnStopGame" class="btn btn-danger">
        
        </td>
    </tr>

</table>
</form>
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 