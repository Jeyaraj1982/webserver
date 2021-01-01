welcome 
<?php
exit;
include_once("admin/config.php");
$param = array();
$param = $_POST;
$param['yourref']   = $_POST['order_id'];
$param['status']    = strtoupper($_POST['status']);
$param['transid']   = strtoupper($_POST['tnx_id']);
if (sizeof($_POST)>0) {
    writeTxt(json_encode($param));
    writeTxt("updated: ". ($application->reverseRecharge($param)>0) ? "updated" : "notupdate");
    echo "Updated";
} else {
    writeTxt("Paramers may be empty");    
    echo "Parameter Missing";
}
function writeTxt($text) {
    $file = "mrobotics_".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}

?>