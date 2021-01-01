<?php
    class MRoboticsApi {
        
        public static function sendRequest($param) {
            
            global $mysql;
            
            $api_url ="https://mrobotics.in/api/recharge_get?api_token=6250d327-34a3-4152-a30f-0148b667b21d&mobile_no=".$param['number']."&amount=".$param['amount']."&order_id=webx".$param['txnid']."&";
            
            if ($param['operator']=="RA") {
                $api_url .= "company_id=2&is_stv=false";
            }
            if ($param['operator']=="RB") {
                $api_url .= "company_id=4&is_stv=".((($param['amount']%10)==0) ? "false":"true");        
            }
            if ($param['operator']=="TB") {
                $api_url .= "company_id=4&is_stv=".((($param['amount']%10)==0) ? "false":"true");        
            }
            if ($param['operator']=="RJ") {
                  $d = $mysql->select("select * from _temp_settings where param='jpos' ");
                if ($d[0]['paramvalue']==1) {
                $api_url .= "company_id=5&is_stv=false"; 
                } else {
                    $api_url .= "company_id=17&is_stv=false";            
                
                }
               // $api_url .= "company_id=5&is_stv=false";
                //$api_url .= "company_id=17&is_stv=false";
            }
            if ($param['operator']=="RV") {
                $api_url .= "company_id=1&is_stv=false";
            }
            if ($param['operator']=="RI") {
                $api_url .= "company_id=1&is_stv=false";
            }
            if ($param['operator']=="DA"||$param['operator']=="TA") {
                $api_url .= "company_id=9&is_stv=false";
            }
            if ($param['operator']=="DD") {
                $api_url .= "company_id=6&is_stv=false";
            } 
            if ($param['operator']=="DS") {
                $api_url .= "company_id=12&is_stv=false";
            }
            if ($param['operator']=="DT") {
                $api_url .= "company_id=7&is_stv=false"; 
            }
            if ($param['operator']=="DV") {
                $api_url .= "company_id=11&is_stv=false";
            }
            
            //update api url
            $mysql->execute("update `_tbl_transactions` set `APIID`='2', `APIName`='mrobotics', `calledurl`='".$api_url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp2($api_url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");
        
            $response = json_decode($api_response,true);       
            if ($response['status']=="success") {
                $return['status']="success";
                $return['operatorid']=$response['tnx_id'];  
                $return['lapuno']=$response['lapu_no'];
            } elseif (isset($response['error']) || $response['status']=="failure") { 
                $return['status']="failure";
                $return['message']=$response['errorMessage'];
                $return['lapuno']=$response['lapu_no'];
            } else {
                $return['status']="pending";
                $return['message']=$response['errorMessage'];
                $return['lapuno']=$response['lapu_no'];
            }
            
            return $return;
        }        
    }
//success: {"balance":605.52,"roffer":0,"status":"success","recharge_date":"2019-02-13T16:03:51.498Z","id": 56156, "response": "Transaction Successful", "lapu_id": 1, "mobile_no":"9876543210", "amount":10, "tnx_id": "GJR180151601651065106"}
?>