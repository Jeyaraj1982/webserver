<h2>Edit Product</h2>
<div style="padding:20px;padding-bottom:0px;"> 
<?php
    if (isset($_POST['updateproduct'])) {
        $id = $mysql->execute("update _products set maincategoryid='".$_POST['maincategoryid']."',
                                                    subcategoryid='".$_POST['subcategoryid']."',
                                                    productdescription='".$_POST['productdescription']."',
                                                    ispublished='".$_POST['ispublished']."',
                                                    productname='".$_POST['productname']."' where md5(concat(subcategoryid,productid))='".$_REQUEST['pid']."'");
        
            echo successMessage("Successfully Updated Product information");
            $_REQUEST['mc']=$_POST['maincategoryid'];
    }
    $productDetails = $mysql->select("select * from _products where md5(concat(subcategoryid,productid))='".$_REQUEST['pid']."'");
?>
<table cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td width="500">
<form action="" method="post">
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td>
                 <select name="maincategoryid" style="width:250px;" onchange="location.href=location.href+'&mc='+this.value">
                 <?php
                 $lists = $mysql->select("select * from _maincategories order by categoryname");
                 foreach($lists as $l) {
                 ?>
                 <option value="<?php echo $l['maincategoryid'];?>" <?php echo ($l['maincategoryid']==$_REQUEST['mc']) ? ' selected="selected"' : ''; ?> ><?php echo $l['categoryname'];?></option>
                 <?php } ?>
                 </select>                                         
            </td>
            <td>
                 <?php if (isset($_REQUEST['mc'])) { ?>
                 <select name="subcategoryid" style="width:250px;">
                 <?php
                 $lists = $mysql->select("select * from _subcategories where maincategoryid='".$_REQUEST['mc']."' order by subcategoryname");
                 foreach($lists as $l) {
                 ?>
                 <option value="<?php echo $l['subcategoryid'];?>"  <?php echo ($l['subcategoryid']==$productDetails[0]['subcategoryid']) ? " selected='selected' " : ""; ?> ><?php echo $l['subcategoryname'];?></option>
                 <?php } ?>
                 </select>  
                 <?php }?>
            </td>
        </tr>
        <tr>
            <td>
                 <select name="brandid" style="width:250px;">
                 <?php
                 $lists = $mysql->select("select * from _brandname order by brandname");
                 foreach($lists as $l) {
                 ?>
                 <option value="<?php echo $l['brandid'];?>" <?php echo ($l['brandid']==$productDetails[0]['brandid']) ? " selected='selected' " : ""; ?> ><?php echo $l['brandname'];?></option>
                 <?php } ?>
                 </select>                                         
            </td>
            <td> </td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" placeholder="Product Name" value="<?php echo $productDetails[0]['productname'];?>" name="productname" style="width:513px;"></td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea name="productdescription" style="width: 530px; height: 250px;">
                <?php echo $productDetails[0]['productdescription'];?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td><select name="ispublished">
                    <option value="1" <?php echo ($productDetails[0]['ispublished']==1) ? " selected='selected' " : ""; ?>>Publish</option>
                    <option value="0" <?php echo ($productDetails[0]['ispublished']==0) ? " selected='selected' " : ""; ?>>Un Publish</option>
            </select></td>
        </tr>
        <tr>
            <td>Added on : <?php echo $productDetails[0]['addedon']; ?></td>
        </tr>
        <tr>
            <td><input type="submit" class="submitBtn" name="updateproduct" value="Update Product"></td>
        </tr>
    </table>
</form>
</td>
<td style="vertical-align: top;">
<?php
    if (isset($_POST['addImage'])) {
        
        $target_path = "../productimages/";
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            
            $id = $mysql->insert("_productimages",array("filename"=>basename( $_FILES['uploadedfile']['name']),
                                              "productid"=>$productDetails[0]['productid'],
                                              "addedon"=>date("Y-m-d H:i:s")
                                              ));
               if ($id>0) {
                   echo successMessage("Succesfully added");
               } else {
                   echo errorMessage("Error Adding Image"); 
               }
        } else{
            echo errorMessage("There was an error uploading the file, please try again!");
        }
    }
    
    if (isset($_REQUEST['imid'])) {
            $mysql->execute("delete from _productimages where md5(concat(productimageid,productimageid))='".$_REQUEST['imid']."'");
            echo successMessage("Succesfully Deleted");
        }
?>
   <div style="border:1px solid #ccc;">  
   <div style="padding:5px;font-weight:bold;background:#f1f1f1;color:#333;border-bottom:1px solid #ccc;">Product Images</div>
   <div style="height:200px;overflow:auto;padding:5px">
   <table cellpadding="3" cellspacing="0" width="100%">
        <?php
            $images = $mysql->select("select * from _productimages where productid=".$productDetails[0]['productid']);
            foreach($images as $im) {
                ?>
                  <tr>
                    <td style="width:90px"><img src="../productimages/<?php echo $im['filename'];?>" style="width:90px;"></td>
                    <td style="vertical-align: top;">
                    Addedon<br>
                    <span style="font-size:11px;color:#666"><?php echo $im['addedon'];?></span><br><br>
                      <a class="delete" href="dashboard.php?to=edit_product&pid=<?php echo $_REQUEST['pid'];?>&mc=<?php echo $_REQUEST['mc'];?>&imid=<?php echo md5($im['productimageid'].$im['productimageid']);?>">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr style="border:none;border-bottom:1px solid #ccc"></td>
                  </tr>
                <?php
            }
        ?>
              </table>
   </div>
   <div style="font-weight:bold;background:#f1f1f1;color:#333;border-top:1px solid #ccc;">
   <form action="dashboard.php?to=edit_product&pid=<?php echo $_REQUEST['pid'];?>&mc=<?php echo $_REQUEST['mc'];?>" method="post" style="margin:0px;" enctype="multipart/form-data">
   <table>
    <tr>
        <td><input type="file" name="uploadedfile" style="width:150px;overflow:hidden"></td>
        <td><input type="submit" class="submitBtn" value="Add" name="addImage" style="font-size: 11px; padding: 2px 12px;"></td>
    </tr>
   </table>
   </form>
   </div>
   
   </div>
   <div style="height:10px"></div>
   
   <?php
    if (isset($_POST['addPrice'])) {
        
        $id = $mysql->insert("_productprice",array("productsize"=>$_POST['productsize'],
                                                    "productmrp"=>$_POST['productmrp'],
                                                    "productid"=>$productDetails[0]['productid'],
                                                    "addedon"=>date("Y-m-d H:i:s")));
        if ($id>0) {
            echo successMessage("Succesfully added");
        } else {
            echo errorMessage("Error Adding Image"); 
        }

    }
    
    if (isset($_REQUEST['priceid'])) {
        $mysql->execute("delete from _productprice where md5(concat(priceid,priceid))='".$_REQUEST['priceid']."'");
        echo successMessage("Succesfully Deleted");
    }
    
   ?>
      <div style="border:1px solid #ccc;">
   <div style="padding:5px;font-weight:bold;background:#f1f1f1;color:#333;border-bottom:1px solid #ccc;">Product Price</div>
   <div style="height:180px;overflow:auto;padding:5px">
         <table cellpadding="3" cellspacing="0" width="100%">
         <tr >
            <td style="background:#f1f1f1;">Size</td>
            <td style="background:#f1f1f1;">Price</td>
            <td style="background:#f1f1f1;"></td>
         </tr>
        <?php
            $images = $mysql->select("select * from _productprice where productid=".$productDetails[0]['productid']);
            foreach($images as $im) {
                ?>
                  <tr>
                    <td style=""><?php echo $im['productsize'];?></td>
                    <td style="width:60px;text-align: right"><?php echo number_format($im['productmrp'],2);?></td>
                    <td style="width:60px;vertical-align: top;text-align: right;">
                      <a class="delete" href="dashboard.php?to=edit_product&pid=<?php echo $_REQUEST['pid'];?>&mc=<?php echo $_REQUEST['mc'];?>&priceid=<?php echo md5($im['priceid'].$im['priceid']);?>">Delete</a>
                    </td>
                  </tr>
                <?php
            }
        ?>
              </table>
   </div>
   <div style="font-weight:bold;background:#f1f1f1;color:#333;border-top:1px solid #ccc;">
   <form action="dashboard.php?to=edit_product&pid=<?php echo $_REQUEST['pid'];?>&mc=<?php echo $_REQUEST['mc'];?>" method="post" style="margin:0px;">
   <table>
    <tr>
        <td>Size</td>
        <td><input type="text" name="productsize" style="width: 45px; padding: 1px ! important;"></td>
        <td>Price</td>
        <td><input type="text" name="productmrp" style="width: 45px; padding: 1px ! important;"></td>
        <td><input type="submit" class="submitBtn" value="Add" name="addPrice" style="font-size: 11px; padding: 2px 10px;"></td>
    </tr>
   </table>
   </form>
   </div>
   
   </div>
   
</td>
    </tr>
</table> 


</div>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>