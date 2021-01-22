<?php
    class EzytmAPI {
        
        public static function sendRequest($param) {
            
            global $mysql;
            
            $api_url = "https://www.ezytm.net/Roboticsapi/webservice/GetMobileRecharge?Apimember_id=8724&Api_password=Saral1992&Circle=10&Member_request_txnid=web".$param['txnid']."&Mobile_no=".$param['number']."&Amount=".$param['amount']."&";

            if ($param['operator']=="RA") {
               $api_url .= "Operator_code=AT";
            }
            if ($param['operator']=="RB") {
                if (($param['amount']%10)==0) {
                    $api_url .= "Operator_code=BS";
                } else {
                    $api_url .= "Operator_code=BS";
                }
            }
            if ($param['operator']=="RJ") {
                $api_url .= "Operator_code=JO";
            }
            if ($param['operator']=="RV") {
                $api_url .= "Operator_code=VF";
            }
            if ($param['operator']=="RI") {
                $api_url .= "Operator_code=ID";
            }
            if ($param['operator']=="DA") {
                $api_url .= "Operator_code=AD";
            }
            if ($param['operator']=="DD") {
                $api_url .= "Operator_code=DT";
            } 
            if ($param['operator']=="DS") {
                $api_url .= "Operator_code=SD";
            }
            if ($param['operator']=="DT") {
                $api_url .= "Operator_code=TS";
            }
            if ($param['operator']=="DV") {
                $api_url .= "Operator_code=VD";
            }
            if ($param['operator']=="DV") {
                $api_url .= "Operator_code=VD";
            }
        
            if ($param['operator']=="DB") {
                $return['status']="failure";
                $return['message']="operator not found";
                $return['lapuno']="";
                return $return;
            }
            
            //update api url
            $mysql->execute("update `_tbl_transactions` set  `APIID`='2', `APIName`='ezytm', `calledurl`='".$api_url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp($api_url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");

            $response = json_decode($api_response,true);
            if ($response['STATUS']=="1") {
                $return['status']="success";
                $return['operatorid']=$response['OPTRANSID'];  
                $return['lapuno']=$response['LAPUNO'];
            } elseif ($response['STATUS']=="3") { 
                $return['status']="failure";
                $return['message']=$response['MESSAGE'];
                $return['lapuno']=$response['LAPUNO'];
            } else {
                $return['status']="pending";
                $return['message']=$response['MESSAGE'];
                $return['lapuno']=$response['LAPUNO'];
            }
        
            return $return;
        }
    }
//recharge: www.ezytm.net/Roboticsapi/webservice/GetMobileRecharge?Apimember_id=7XXX&Api_password=xxxxx&Mobile_no=0123456789&Operator_code=AT&Amount=10&Member_request_txnid=Your_unique_txnid&Circle=10
//success: {"ERROR":"0", "STATUS":"1", "ORDERID":"111602444", "OPTRANSID":"MH12241930000485", "MEMBERREQID":"10103929885", "MESSAGE":"Customer Balance Recharge Successfully", "COMMISSION":null, "MOBILENO":"1234567890", "AMOUNT":"65", "LAPUNO":"9876543210", "OPNINGBAL":"57764.04", "CLOSINGBAL":"57699.04"}
//failed: {"ERROR":"0", "STATUS":"3", "ORDERID":"111592945", "OPTRANSID":"PB1224128000597", "MEMBERREQID":"10103929724", "MESSAGE":"Invalid transfer value", "COMMISSION":null,"MOBILENO":"1234567890", "AMOUNT":"15", "LAPUNO":"9876543210", "OPNINGBAL":null, "CLOSINGBAL":null} 
//processing: {"ERROR":"0", "STATUS":"2", "ORDERID":"110859433", "OPTRANSID":"110859433", "MEMBERREQID":"10103917946", "MESSAGE":"Recharge Processing", "COMMISSION":null, "MOBILENO":"1234567890", "AMOUNT":"119", "LAPUNO":"9876543210", "OPNINGBAL":"119", "CLOSINGBAL":"0"} 
//statuscheck: www.ezytm.net/RoboticsApi/webservice/GetStatus?Apimember_id=7XXX&Api_password=Apipassword&Member_request_txnid=Your_ref_txnid
//ip update:  www.ezytm.net/Robotics/webservice/GetIpUpdate?Apimember_id=7XXX&Api_password=Apipassword&Ipaddress=Your Recharge Request Server Ip Address
?>