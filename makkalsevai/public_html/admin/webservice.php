<?php
include_once("../config.php");
 
    echo $_REQUEST['action']();
    
          
function DeleteService(){
    global $mysql;
    
    $mysql->execute("update _tbl_services set IsActive='0' where ServiceID='".$_POST['ServiceID']."'");
      
        $result = array();
        $result['status']="Success";
        $result['message']="Service Deleted Successfully";
        return json_encode($result);
   
   
}     
?>