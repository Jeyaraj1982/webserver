<?php
  include_once("apiconfig.php");
 
    if (isset($_POST['addProduct'])) {
        
        $productimage = "";
     
        if ($_FILES["file"]["error"] > 0) {
            
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  
        } else {
    
            
            $filename = time()."_".$_FILES["file"]["name"];
            $filename = strtolower(str_replace(" ","",$filename));
            
            if (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/products/".$filename )) {
                
                $id = $mysql->insert("aproducts",array(
                                                       "categoryid"=>$_POST['categoryid'],
                                                       "productname"=>$_POST['productname'],
                                                       "productdescription"=>str_replace("'","\'",$_POST['productdescription']),
                                                       "addedon"=>date("Y-m-d H:i:s"),
                                                       "isavailable"=>"1",
                                                       "productimage"=>$filename));
                if ($id>0)  {
                    echo "Product Added Successfully";
                } else {
                    echo "error adding product";
                }
            
            } else {
                echo "Error";
            }
        }
    }
    
?>

<form action="" method="post"  enctype="multipart/form-data">
<table>
  <tr>
        <td>Product Category</td>
        <td>
            <select name="categoryid">
                <?php 
                    $categories = $mysql->select("select * from acategorynames order by categoryname");
                    foreach($categories as $category) {
                        ?>
                      <option value="<?php echo $category['categoryid'];?>" ><?php echo $category['categoryname'];?></option>
                        <?php
                    }
                    ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Product Name</td>
        <td><input type="text" name="productname" style="width:500px;"></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea style="width:500px;height:200px;" name="productdescription"></textarea></td>
    </tr>
     <tr>
      <td>Product Image</td>  
    <td><input type="file" name="file" id="file" /></td>
</tr>
    <tr>
        <td colspan="2"><input type="submit" value="Add Product" name="addProduct"</td>
    </tr>
</table>
</form> 
