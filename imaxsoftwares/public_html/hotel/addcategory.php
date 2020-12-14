<?php
  include_once("apiconfig.php");
 

    if (isset($_POST['addstore'])) {
        
        $productimage = "";
     
        if ($_FILES["file"]["error"] > 0) {
            
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  
        } else {
    
            
            $filename = time()."_".$_FILES["file"]["name"];
            $filename = strtolower(str_replace(" ","",$filename));
            
            if (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/categories/".$filename )) {
                
                $id = $mysql->insert("acategorynames",array("categoryname"=>$_POST['categoryname'],
                                                            "isavailable"=>"1",
                                                            "addedon"=>date("Y-m-d H:i:s"),
                                                            "categoryimage"=>$filename));
                if ($id>0)  {
                    echo "Category Details Added Successfully";
                } else {
                    echo "error adding Category";
                }
            
            } else {
                echo "Error";
            }
        }
    }
    
?>
<?php     include_once("header.php"); ?>
<form action="" method="post"  enctype="multipart/form-data">
<table cellpadding="5" cellspacing="0"> 
    <tr>
        <td>Category Name</td>
        <td><input type="text" name="categoryname" style="width:500px;"></td>
    </tr>  <tr>
     <tr>
      <td>Category Image</td>  
    <td><input type="file" name="file" id="file" /></td>
</tr>
    <tr>
        <td colspan="2"><input type="submit" value="Add Category" name="addstore"</td>
    </tr>
</table>
</form> 
