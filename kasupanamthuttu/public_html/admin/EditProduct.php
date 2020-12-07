

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
         if (isset($_POST['btnAddProduct'])) {
             
             
              $mysql->execute("update _tblProducts set ProductTypeName='".$producttypes[0]['ProductTypeName']."',
                                                       ProductName='".$_POST['ProductName']."',
                                                       ProductPrice='".$_POST['ProductPrice']."',
                                                       ProductDescription='".$_POST['ProductDescription']."',
                                                       IsActive='1' where ProductID='".$_GET['param']."'");
                                                 
                                            
              $target_file = "assets/products/";
              $filename = strtolower(time()."_".$_FILES["ProductImage"]["name"]);
              if (isset($_FILES["ProductImage"]["name"]) && strlen($_FILES["ProductImage"]["name"])>3) {
          
           if (move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file.$filename)) {
                  
              $mysql->execute("update _tblProducts set ProductImage='".$filename."' 
                                                       where ProductID='".$_GET['param']."'");
            
           
             
    }   
              }
              echo "updated successfully";  
              unset($_POST);
                                           
         }
         $products = $mysql->select("select * from _tblProducts where ProductID='".$_GET['param']."'");
     ?>
 
<form action="" method="post" enctype="multipart/form-data">
<table  style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="450px"> 
    <tr>
        <td width="160">Product Category</td>
        <td>
            <?php $producttypes= $mysql->select("select * from _tblProductTypes order by ProductTypeName"); ?>
            <select name="ProductTypeID"  id="ProductTypeID" class="form-control">
            <?php foreach($producttypes as $p) {?>
            <option value="<?php echo $p['ProductTypeID'];?>"><?php echo $p['ProductTypeName'];?></option>
            <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Product Name</td>
        <td><input type="text" name="ProductName" required  class="form-control" value="<?php echo $products[0]['ProductName'];?>" ></td>
    </tr>
    <tr>
        <td>Product Price</td>
        <td><input type="text" name="ProductPrice" class="form-control" value="<?php echo $products[0]['ProductPrice'];?>" required></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea class="form-control" name='ProductDescription' id="ProductDescription"><?php echo $products[0]['ProductDescription'];?></textarea></td>
    </tr>
    <tr>
        <td>Product Image</td>
        <td>
         <img src="assets/products/<?php echo $products[0]['ProductImage'];?>" style="width:100%;border:1px solid #ccc">
        <input type='file' name="ProductImage" class="form-control"  id="ProductImage"  >
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="Update Product" name="btnAddProduct" class="btn btn-success"></td>
    </tr>

</table>
</form>
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 