<?php
    class AaranjuLapu {
        
        public static function sendRequest($param) {
            
            global $mysql;
            // https://www.aaranju.in/recharge/api.php?apiusername=<d2VsY29tZUA&apipassword=jM0NTY3ODk&number=9944872965&amount=10&uid=2&response=json&optr=AT          
            $api_url ="https://www.aaranju.in/recharge/api.php?apiusername=ikXtsaLo3EWca&apipassword=lzwjdughDqd=&number=".$param['number']."&amount=".$param['amount']."&uid=".$param['txnid']."&response=json&";
            
             
            if ($param['operator']=="RB") {
                $api_url .= "optr=RB";        
            }
            if ($param['operator']=="TB") {
                $api_url .= "optr=RT";        
            }
             
            if ($param['operator']=="RV") {
                $api_url .= "optr=RV";
            }
            if ($param['operator']=="RI") {
                $api_url .= "optr=RI";
            }
            
            if ($param['operator']=="DA" || $param['operator']=="TA") {
                $api_url .= "optr=DA";
            }
            if ($param['operator']=="DD") {
                $api_url .= "optr=DD";
            } 
            if ($param['operator']=="DS") {
                $api_url .= "optr=DS";
            }
          
            if ($param['operator']=="DV") {
                $api_url .= "optr=DV";
            }
            
            
            //update api url
            $mysql->execute("update `_tbl_transactions` set `APIID`='4', `APIName`='aaranju', `calledurl`='".$api_url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp2($api_url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");
        
            $response = json_decode($api_response,true);       
            if ($response['status']=="SUCCESS") {
                $return['status']="success";
                $return['operatorid']=$response['tnx_id'];  
                $return['lapuno']="0";
            } elseif (isset($response['error']) || $response['status']=="failure") { 
                $return['status']="failure";
                $return['message']=$response['error'];
                $return['lapuno']="0";
            } else {
                $return['status']="pending";
                $return['message']=$response['error']; 
                $return['lapuno']="0";
            }
            
            return $return;
        }        
    }
//success: {"balance":605.52,"roffer":0,"status":"success","recharge_date":"2019-02-13T16:03:51.498Z","id": 56156, "response": "Transaction Successful", "lapu_id": 1, "mobile_no":"9876543210", "amount":10, "tnx_id": "GJR180151601651065106"}
?>