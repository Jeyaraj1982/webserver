<?php
    include_once("../config.php");
    
    $data = $mysql->select("select * from _users where emailid='".$_REQUEST['uname']."' and password='".$_REQUEST['pwd']."'");
    
    if (isset($_GET['optr'])) {
    if (in_array($_REQUEST['optr'],$operators,TRUE)) {

        
        if (sizeof($data)>0) {
             echo "success,".getVirtualBalanceOperatorWise($data[0]['userid'],$operator_array[$_REQUEST['optr']]);    
        } else {
            echo "false,Invalid user/password";
        }
        
    }else{
        echo "false,Invalid Operator";
    }
    } else {
            echo "success,".getVirtualBalance($data[0]['userid']);
    }
?>