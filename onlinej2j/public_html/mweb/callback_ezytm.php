<?php
include_once("admin/config.php");
$param = array();
  writeTxt(json_encode($_GET));
  writeTxt(json_encode($_POST));
   function writeTxt($text) {
    $file = "ezytm_".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}
  exit;
$param['yourref']   = $_GET['MemberTxnID'];
$param['status']    = strtoupper($_POST['Status']);
//$param['transid']   = strtoupper($_POST['MemberTxnID']);
if (sizeof($_GET)>0) {
    writeTxt(json_encode($param));
    writeTxt("updated: ". ($application->reverseRecharge($param)>0) ? "updated" : "notupdate");
    echo "Updated";
} else {
    writeTxt("Paramers may be empty");    
    echo "Parameter Missing";
}

 //https://pschool.in
?>