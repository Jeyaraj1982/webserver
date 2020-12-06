<?php
    class TelegramMessageController {
        
        public static function sendSMS($mobileNumber,$text,$memberID="",$adminID="") {
            
           // global $mysql,$userData;
            
           // $id=$mysql->insert("_tbl_Log_TelegramMessage",array("MemberID"=>$memberID,
                                                          //"SmsTo"=>$mobileNumber,
                                                         // "Message"=>$text,
                                                         // "Url"=>" ",
                                                         // "MessagedOn"=>date("Y-m-d H:i:s")));
            
            $url = "https://www.aaranju.in/telegram/api.php?apiusername=9944872965&apipassword=0202&msgtype=text&clientid=".$mobileNumber."&message=".urlencode($text)."&uid=jalerts".$id;                                               
          //  $mysql->execute("update _tbl_Log_TelegramMessage set Url='".$url."' where SMSID='".$id."'");
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
           // $mysql->execute("update _tbl_Log_TelegramMessage set APIResponse='".$response."' where SMSID='".$id."'");
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
    if (strtolower($_GET['message'])=="/start") {
        TelegramMessageController::sendSMS($_GET['clientid'],"Thanks for joiin us",0,0);
    } 
    //txnid=1&clientid=316574188&message=Hi&from=S
      
    // http://www.aaranju.in/telegram/api.php?apiusername=d2VsY29tZUA&apipassword=jM0NTY3ODk&clientid=1107300198&message=welcome%20to%20tksd&uid=1&msgtype=text
?>