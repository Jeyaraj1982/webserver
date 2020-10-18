<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
    function DeleteProduct() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_products where ProductID='".$_POST['ProductID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted.";  
        return json_encode($result);
    }
    
?> 