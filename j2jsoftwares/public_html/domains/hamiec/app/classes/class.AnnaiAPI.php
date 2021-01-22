<?php
    class AnnaiAPI {            
        
        public static function sendRequest($param) {
            
            global $mysql;
            
            $api_url ="http://annaieservice.com/api/api_live.php?user_id=1333&username=9566999505&password=1992&number=".$param['number']."&amount=".$param['amount']."&orderid=web".$param['txnid']."&";
            
            if ($param['operator']=="RA") {
                $api_url .= "operator=2";
            }
            if ($param['operator']=="RB") {
                if (($param['amount']%10)==0) {
                     $api_url .= "operator=3";
                } else {
                      $api_url .= "operator=4";
                }
            }
            if ($param['operator']=="RJ") {
                $api_url .= "operator=7";
            }
            if ($param['operator']=="RV") {
                $api_url .= "operator=17";
            }
            if ($param['operator']=="RI") {
                $api_url .= "operator=5";
            }
            if ($param['operator']=="DA") {
                $api_url .= "operator=18";
            }
            if ($param['operator']=="DD") {
                $api_url .= "operator=19";
            } 
            if ($param['operator']=="DS") {
                $api_url .= "operator=21";
            }
            if ($param['operator']=="DT") {
                $api_url .= "operator=22"; 
            }
            if ($param['operator']=="DV") {
                $api_url .= "operator=23";
            }
            
             if ($param['operator']=="DB") {
                $api_url .= "operator=20";
            }
            
            
            //update api url
            $mysql->execute("update `_tbl_transactions` set `APIID`='6', `APIName`='annaiapi', `calledurl`='".$api_url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp($api_url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");
        
            $response = json_decode($api_response,true);       
            if ($response['status']=="SUCCESS") {
                $return['status']="success";
                $return['operatorid']=str_replace("Your recharge is SUCCESS.TXN:","",$response['message']);  
                $return['lapuno']="0";
            } elseif ($response['status']=="FAILED") { 
                $return['status']="failure";
                $return['message']=$response['message'];
                $return['lapuno']="0";
            } else {
                $return['status']="pending";
                $return['message']="pending";
                $return['lapuno']="0";
            }
            
            return $return;
        }        
    }
// http://annaieservice.com/api/api_live.php?user_id=1333&username=9566999505&password=1992&operator=2&amount=20&number=9791780888&orderid=20200810
//{ "status": "SUCCESS", "message": "Your recharge is SUCCESS.TXN:378880522", "txnid": "378880522", "bal": "1399.559" }
?>