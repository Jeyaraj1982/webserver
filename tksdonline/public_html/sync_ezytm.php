<?php
include_once("admin/config.php");
echo "<pre>";
$txn = $mysql->select("select * from _tbl_transactions where APIID='3' and TxnStatus='accepted'");
foreach($txn as $t) {
        
     $url = "https://www.ezytm.net/Roboticsapi/webservice/GetStatus?Apimember_id=8881&Api_password=Mmm@786786&Member_request_txnid=web".$t['txnid'];
     print_r($t);
     $data = json_decode(getHttp3($url),true);
     writeTxt(json_encode($data));
     if ($data['STATUS']==1) {
         $param['yourref']   = $t['txnid'];
         $param['status']    = "SUCCESS";
         $param['transid']    = $data['OPTRANSID'];
         $param['reqData']    = $data;
         echo "SUCCESS";
         writeTxt("updated: ". ($application->reverseRecharge($param)>0) ? "updated" : "notupdate");
         echo "Updated";
     }
     
     if ($data['STATUS']==3) {
           $param['yourref']   = $t['txnid'];
         $param['status']    = "FAILURE";
         echo "FAILURE";
         writeTxt("updated: ". ($application->reverseRecharge($param)>0) ? "updated" : "notupdate");
          $param['reqData']    = $data;
     }
     
     
     
}
echo "</pre>";
    
 function writeTxt($text) {
    $file = "ezytm_".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}

exit;  
?>