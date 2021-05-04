<?php
include_once("config.php");
    echo $_REQUEST['action']();
   
function DeleteJob(){
    global $mysql;
   
     $mysql->execute("delete from _tbl_joboffers   where JobOfferID='".$_POST['JobID']."'");
   
        $result = array();
        $result['status']="Success";
        $result['message']="Deleted Successfully";
        return json_encode($result);
   
}                                                                                                        
                                                                                                               
?>