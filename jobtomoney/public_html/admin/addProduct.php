

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


<h5 style="text-align: left;font-family: arial;">Add Product</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
     <?php
         if (isset($_POST['btnAddProduct'])) {
              $target_file = "assets/products/";
              $filename = strtolower(time()."_".$_FILES["ProductImage"]["name"]);
           if (move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file.$filename)) {
                  
              $producttypes= $mysql->select("select * from _tblProductTypes where ProductTypeID='".$_POST['ProductTypeID']."'");
             $mysql->insert("_tblProducts",array("ProductTypeID"=>$_POST['ProductTypeID'],
                                                 "ProductTypeName"=>$producttypes[0]['ProductTypeName'],
                                                 "ProductName"=>$_POST['ProductName'],
                                                 "ProductPrice"=>$_POST['ProductPrice'],
                                                 "ProductDescription"=>$_POST['ProductDescription'],
                                                 "ProductImage"=>$filename,
                                                 "IsActive"=>'1',
                                                 "CreatedOn"=>date("Y-m-d H:i:s")));
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
        <td><input type="text" name="ProductName" required  class="form-control" value="<?php echo $_POST['ProductName'];?>" ></td>
    </tr>
    <tr>
        <td>Product Price</td>
        <td><input type="text" name="ProductPrice" class="form-control" value="<?php echo $_POST['ProductPrice'];?>" required></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea class="form-control" name='ProductDescription' id="ProductDescription"><?php echo $_POST['ProductDescription'];?></textarea></td>
    </tr>
    <tr>
        <td>Product Image</td>
        <td><input type='file' name="ProductImage" class="form-control"  id="ProductImage" required></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="Add Product" name="btnAddProduct" class="btn btn-success"></td>
    </tr>

</table>
</form>
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 