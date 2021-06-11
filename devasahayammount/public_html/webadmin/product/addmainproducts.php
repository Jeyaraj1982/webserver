<?php 
include_once("../../config.php");
                if (!(CommonController::isLogin())){
                echo CommonController::printError("Login Session Expired. Please Login Again");
                exit;
            }

            if (isset($_POST{"save"})) {
                 if(CommonController::isEmptyField($_POST['maincatename'])) {
                    echo  CommonController::printError("Product Fields are Required"); 
                    
                 }                          
                 else if(JProductMainCategory::addProductMaincategory($_POST['maincatename'])>0){
                    echo CommonController::printSuccess("Items Added successfully");       
                 } else {
                    echo CommonController::printError("Error Adding Items");
                 }        
        }

?>
<body style="margin:0px;">
<div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Main Products</div>
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                     <td style="width:150px;">Main Category Name</td>
                     <td><input type="text" name="maincatename"  size="40" style="width:250px;"><br></td> 
               </tr>
                <tr>
                    <td align="left"><input type="submit" name="save" value="Save" bgcolor="grey">  
                    <input type="button" name="cancel" value="Cancel" bgcolor="grey" onclick="location.href='managemainproducts.php'"></td>
              </tr> 
        </table>
    </form>
</body>