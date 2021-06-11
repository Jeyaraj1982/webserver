<?php 
include_once("../../config.php");
                if (!(CommonController::isLogin())){
                echo CommonController::printError("Login Session Expired. Please Login Again");
                exit;
            }
             if(isset($_POST{"save"})) {
     if(CommonController::isEmptyField($_POST['subcategoryname']) ) {    
               echo  CommonController::printError("Product Fields are Required"); 
        
         }                          
   else if(JProductSubCategory::addProductSubcategory($_POST['subcategoryname'])>0){
            echo CommonController::PrintSuccess("Items Added successfully");       
        } else {
            echo CommonController::PrintError("Error Adding Items");
        }        
}
?>
<body style="margin:0px;">
<div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Product Subcategory</div> 
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                     <td style="width:150px;">Sub Category Name</td>
                     <td><input type="text" name="subcategoryname"  size="40" style="width:250px;"><br></td> 
               </tr>
                <tr>
                    <td align="left"><input type="submit" name="save" value="Save" bgcolor="grey"> 
                    <input type="button" name="cancel" value="Cancel" bgcolor="grey" onclick="location.href='managesubproducts.php'"></td></td> </td>
              </tr> 
        </table>
    </form>
</body>