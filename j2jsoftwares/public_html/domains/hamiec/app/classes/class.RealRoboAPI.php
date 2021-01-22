<?php
    class RealRoboAPI {
        
        public static function sendRequest($param) {
            
            global $mysql;
            
            $params = "key=Myvuz0fH&uid=1910&lapunumber=RANDOM&number=".$param['number']."&amount=".$param['amount']."&type=topup&reqID=".$param['txnid'];

            if ($param['operator']=="RA") {
                $api_url = "https://realrobo.in/recharge/airtel?".$params;
            }
            if ($param['operator']=="RB") {
                if (($param['amount']%10)==0) {
                    $api_url = "https://realrobo.in/recharge/bsnl?".$params;
                } else {
                    $api_url = "https://realrobo.in/recharge/bsnlstv?".$params;
                }
            }                       
            if ($param['operator']=="RJ") {
                $api_url = "https://realrobo.in/recharge/jio?".$params;
            }
            if ($param['operator']=="RV") {
                //$api_url = "https://realrobo.in/recharge/vodafone?".$params;
                $api_url = "https://realrobo.in/recharge/smartvodafone?".$params;
            }
            if ($param['operator']=="RI") {
                //$api_url = "https://realrobo.in/recharge/idea?".$params;
                //$api_url = "https://realrobo.in/recharge/smartidea?".$params;
                $api_url = "https://realrobo.in/recharge/smartvodafone?".$params;
            }                                      
            if ($param['operator']=="DA") {
                $api_url = "https://realrobo.in/recharge/airteldth?".$params;
            }
            if ($param['operator']=="DD") {
                $api_url = "https://realrobo.in/recharge/dishtv?".$params;
            } 
            if ($param['operator']=="DS") {
                $api_url = "https://realrobo.in/recharge/sundirect?".$params;
            }
            if ($param['operator']=="DT") {
                $api_url = "https://realrobo.in/recharge/tatasky?".$params;
            }
            if ($param['operator']=="DV") {
                $api_url = "https://realrobo.in/recharge/videocon?".$params;
            }
            if ($param['operator']=="DB") {
                $return['status']="failure";
                $return['message']="operator not found";
                $return['lapuno']="";
                return $return;
            }
        
            //update api url
            $mysql->execute("update `_tbl_transactions` set  `APIID`='3', `APIName`='realrobo', `calledurl`='".$api_url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp($api_url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");

            $response = json_decode($api_response,true);
            if ($response['Status']=="Success") {
                $return['status']="success";
                $return['operatorid']=$response['Txid'];  
                $return['lapuno']=$response['lapu'];
            } elseif ($response['Status']=="Failed") { 
                $return['status']="failure";
                $return['message']=$response['Message'];
                $return['lapuno']=$response['lapu'];
            } else {
                $return['status']="pending";
                $return['message']="pending";
                $return['lapuno']=$response['lapu'];
            }                    
            
            return $return;
        } 
    }
//https://realrobo.in/recharge/[OpCode]?key=Myvuz0fH&uid=1910&lapunumber=RANDOM&number=[Customernumber]&amount=[Amount]&type=topup&reqID=[RechargeID]
//success: {"Oldbal":"xxxx","Newbal":"xxxx","dest":"1234567890","Amount":"10","Status":"Success","Txid":"MH0000000000000000","Error":null,"Roffer":"","lapu":"xxxx","Message":"Transaction Id MH0000000000000000 to recharge Rs 10 to 1234567890 is successful. Your new balance is Rs xxxx .","RequestID":"xxxx"}
//failure:"Oldbal":"xxxx","Newbal":"xxxx","dest":"1234567890","Amount":"10","Status":"Failed","Txid":"Invalid Customer","Error":null,"Roffer":"","lapu":"xxxx","Message":"Invalid Customer","RequestID":"xxxx"}
//rofer check 
//https://realrobo.in/check/roffer?key=Myvuz0fH&uid=1910&operator=[Operator]&custnumber=[Customernumber]
//dth customer info: https://realrobo.in/check/dthinfo?key=Myvuz0fH&uid=1910&custnumber=[Number]&operator=[Operator]
//mnp operator chck : https://realrobo.in/check/findoperator?key=Myvuz0fH&uid=1910&custnumber=[Customernumber]
//status checkhttps://realrobo.in/status_check?key=Myvuz0fH&uid=1910&requestid=[RechargeID]&type=JSON
?>