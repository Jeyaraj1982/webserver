<?php
    class MobileSMS {
        
        public static function sendSMS($mobileNumber,$text,$memberID=0) {
            
            global $mysql;
            //if ($memberID>0) {
              //  $user = $mysql->select("select * from _tbl_Members where MemberID='".$memberID."'");
//                $userid= $user[0]['MemberID'];
  //              $usercode= $user[0]['MemberCode'];
    //        }   
      //      if ($adminID>0) {
        //        $user = $mysql->select("select * from _tbl_admin where AdminID='".$adminID."'");
          //      $userid= $user[0]['AdminID'];
            //    $usercode= $user[0]['AdminCode'];
            //}
            //$mobileapi =  $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSSendAPI')"); 
            
            $id=$mysql->insert("_tbl_Log_MobileSMS",array("MemberID"=>$memberID,
                                                          "SmsTo"=>$mobileNumber,
                                                          "Message"=>$text,
                                                          "Url"=>" ",
                                                          "MessagedOn"=>date("Y-m-d H:i:s")));
            
            //$url = "https://www.aaranju.in/sms/api.php?apiusername=a2x4LmNvLmluI&apipassword=AgSjJKIFNvZnR3YXJl&sender=KLXCOI&number=".$mobileNumber."&message=".urlencode($text)."&uid=".$id;                                               
            //$url = "http://198.24.149.4/API/pushsms.aspx?loginID=Infant&password=Infant1&mobile=".$mobileNumber."&text=".urlencode($text)."&senderid=CHPSMS&route_id=2&Unicode=0";
            $url = "https://www.aaranju.in/internationalsms/api.php?apiusername=a2x4LmNvLmluI&apipassword=AgSjJKIFNvZnR3YXJl&sender=KLXCOI&number=".$mobileNumber."&message=".urlencode($text)."&uid=".$id;                                               
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
            $url = $mobileapi[0]['ParamValue']; 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $response = json_decode($response,true);
            return  $response['response']['balance'];
        }
    }     
?> 