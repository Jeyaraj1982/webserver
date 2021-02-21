<?php
     include_once("admin/config.php");
     
     $param['MemberID']=3;
     
     $param['number']=$_GET['number'];
     $param['amount']=$_GET['amount'];
     $param['operator']=$_GET['optr'];
     $param['particulars']="Recharge";
     $param['uid']=$_GET['uid'];
     echo json_encode($application->doRecharge($param));
     
 ?> 