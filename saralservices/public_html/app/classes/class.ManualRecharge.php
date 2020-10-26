<?php
    class ManualRecharge {
        
        public static function sendRequest($param) {
            
            global $mysql;
         
            $mysql->execute("update `_tbl_transactions` set `APIID`='5', `APIName`='Manual'  where `txnid`='".$param['txnid']."'");
            $return['status']="accepted";
            $return['operatorid']="0";  
            $return['lapuno']="0";
            return $return;
        }        
    }
?>