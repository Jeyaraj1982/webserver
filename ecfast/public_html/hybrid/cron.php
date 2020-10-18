<?php
exit;
    include_once("config.php");
    
    $liveTransactions= $mysql->select("select * from _tbltransaction where txnstatus='SUCCESS' and operatorid='0' order by txnid desc limit 0,10");    
       
    foreach($liveTransactions as $t) {
        
        $resultData = txnStatus($t['txnid']);
         
        if (isset($resultData->errorcode) && $resultData->errorcode>0 && $resultData->errormessage=="INVALID TXN ID" && $resultData->rechargestatus!="SUCCESS" ) {
            
              $q = $mysql->select("select * from _tbltransaction where txnstatus='SUCCESS' and operatorid='0' and txnid=".$t['txnid']);    
              if(sizeof($q)==1) {
                 //   $url = "http://lapu.onlinej2j.in/api/_updatetxnid.php?status=REVERSED&usertxnid=".$t['txnid'];
                  //  file_get_contents($url);
              }      
            
            echo "FAILURE";
        
        } elseif (isset($resultData->rechargestatus) && $resultData->rechargestatus=="SUCCESS" && isset($resultData->operatorid) && strlen($resultData->operatorid)>5) {
            
            $url = "http://lapu.onlinej2j.in/api/_updatetxnid.php?status=SUCCESS&usertxnid=".$t['txnid']."&operatorid=".$resultData->operatorid; //."&txnid=160130796";
            file_get_contents($url);
        
        }
    }
       
?>
