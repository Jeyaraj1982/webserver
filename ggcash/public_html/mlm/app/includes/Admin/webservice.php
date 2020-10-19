<?php include_once("../../../config.php"); ?> 

<?php 
echo $_REQUEST['action']();
function DeleteProduct() {
    
    global $mysql;
    
        $id=$mysql->execute("DELETE FROM _tbl_Members_Products where ProductID='".$_POST['ProductID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted.";  
        return json_encode($result);
     
    }
?>