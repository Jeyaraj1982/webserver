<?php
    class MobileSMS {
        
        public static function sendSMS($mobileNumber,$text,$memberID="",$adminID="") {
            
            global $mysql,$userData;

            $text .= " - Thanks TKSD Online Service";
            $id=$mysql->insert("_tbl_Log_MobileSMS",array("MemberID"=>$memberID,
                                                          "SmsTo"=>$mobileNumber,
                                                          "Message"=>$text,
                                                          "Url"=>" ",
                                                          "MessagedOn"=>date("Y-m-d H:i:s")));
            
            $url = "http://www.aaranju.in/sms/api.php?apiusername=d2VsY29tZUA&apipassword=jM0NTY3ODk&sender=TKSDEC"."&number=".$mobileNumber."&message=".urlencode($text)."&uid=tksd_".$id;                                               
            $mysql->execute("update _tbl_Log_MobileSMS set Url='".$url."' where SMSID='".$id."'");
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $mysql->execute("update _tbl_Log_MobileSMS set APIResponse='".$response."' where SMSID='".$id."'");
            return $id;
        }
        
        public static function getBalance() {
            
            global $mysql;
            $mobileapi =  $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSBalanceAPI')"); 
            $url = "http://www.aaranju.in/sms/api_balance.php?apiusername=d2VsY29tZUA&apipassword=jM0NTY3ODk";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $response = json_decode($response,true);
            return  $response['response']['balance'];
        }
    }     
    //http://www.aaranju.in/sms/api.php?apiusername=d2VsY29tZUA&apipassword=jM0NTY3ODk&number=9944872965&sender=ETOKEN&message=test&uid=tksd_1
?>