

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


<h5 style="text-align: left;font-family: arial;">Add Item (Match2Win)</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
     <?php
         if (isset($_POST['btnAddProduct'])) {
              $target_file = "assets/products/";
              $filename = strtolower(time()."_".$_FILES["ProductImage"]["name"]);
           if (move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file.$filename)) {
                  
                                                    
             $mysql->insert("_items",array(    "itemcategoryid"=>'1',
                                                  "itemsubcategoryid"=>"1",
                                                  "auctiontype"=>"m2w",
                                                  "productfrom"=>"India",
                                                 "itemname"=>$_POST['itemname'],
                                                 "price"=>$_POST['price'],
                                                 "description"=>$_POST['description'],
                                                 "bidamount"=>$_POST['bidamount'],
                                                 "skey"=>$_POST['skey'],       
                                                 "productimage"=>$filename,
                                                 "ispublish"=>'1',
                                                 "maximumbids"=>'1000',
                                                 "posted"=>date("Y-m-d H:i:s")));
             echo "Saved successfully";
             unset($_POST);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
       
            
         }
     ?>
 
<form action="" method="post" enctype="multipart/form-data">
<table  style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="450px"> 
    
    <tr>
        <td>Item Name</td>
        <td><input type="text" name="itemname" required  class="form-control" value="<?php echo $_POST['itemname'];?>" ></td>
    </tr>
      <tr>                                  
        <td>Item Price</td>
        <td><input type="text" name="price" class="form-control" value="<?php echo $_POST['price'];?>" required></td>
    </tr>
    <tr>
        <td>Bid Amount</td>
        <td><input type="text" name="bidamount" class="form-control" value="<?php echo $_POST['bidamount'];?>" required></td>
    </tr>
    <tr>
        <td>Secret Key</td>
        <td><input type="text" name="skey" class="form-control" value="<?php echo $_POST['skey'];?>" required></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea class="form-control" name='description' id="description"><?php echo $_POST['description'];?></textarea></td>
    </tr>
    <tr>
        <td>Product Image</td>
        <td><input type='file' name="ProductImage" class="form-control"  id="ProductImage" required></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="Add Item" name="btnAddProduct" class="btn btn-success"></td>
    </tr>

</table>
</form>
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 