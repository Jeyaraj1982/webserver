<?php
    include_once("../config.php");
    
    echo $_GET['action']();
    function getMemberInfo() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."' and MobileNumber='".$_GET['MobileNumber']."'");
        return json_encode($data);
    }
?>