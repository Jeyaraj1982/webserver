<?php          
    date_default_timezone_set("Asia/Calcutta");
    include_once("class.Mysql.php");
    include_once("param.php");
    $mysql = new MySqlDb("localhost","aaranju_user","mysqlPwd","aaranju_database");
    
    if (isset($_GET['action']) && $_GET['action']=="logout") {
        session_destroy();
        echo "<script>location.href='index.php';</script>" ;
    }
    
    $_txnid = "";
    
    class MoneyTransfer {
        
       public static function get_balance($userid) {
             global $mysql;
            $t = $mysql->select("select (sum(Credit)-sum(Debit)) as bal from `_tbl_money_transfer` where `UserID`='".$userid."'");
            return isset($t[0]['bal']) ? $t[0]['bal'] : 0; 
        }
        
       public static function doTransfer($param) {
           global $mysql,$_txnid;
           
           $user_balance = MoneyTransfer::get_balance($param['userid']);
           
           //if ($param['userid']==9) {
           //$user_balance = MoneyTransfer::get_balance($param['userid'])-10000;   
           //} else {                                 
           $user_balance = MoneyTransfer::get_balance($param['userid']);
           //}
           
           if ($user[0]['userid']==9) {
                $user_balance =  MoneyTransfer::get_balance($param['userid'])-21000;    
           } else {
                $user_balance =  MoneyTransfer::get_balance($param['userid'])-10000;
            }

           
           $qdata = $mysql->select("select * from _moneytransfer_incoming_bankaccount where accountnumber='".$param['BankAccountNumber']."'");
           if (sizeof($qdata)>0) {
               return array("response"=>array("status"=>"FAILURE","error"=>"Not allow to transfer. This account number has set to auto wallet update"));    
           }
           
           if (trim($param['BankAccountNumber'])=="70809070809073244") {
                return array("response"=>array("status"=>"FAILURE","error"=>"Not allow to transfer. This account number"));  
           }
                                                                 
           if (!($param['Amount']<$user_balance)) {
               return array("response"=>array("status"=>"FAILURE","error"=>"insufficant balance"));
           }
           
           $txnid = $mysql->insert("_tbl_money_transfer",array("UserID"             => $param['userid'],
                                                               "TxnDate"            => date("Y-m-d H:i:s"),
                                                               "Particulars"        => "Transfer To Bank",
                                                               "IsWalletUpdate"     => "2",
                                                               "TxnAmount"          => $param['Amount'],
                                                               "Credit"             => "0",
                                                               "Debit"              => $param['Amount'],
                                                               "Balance"            => $user_balance-$param['Amount'],
                                                               "BankAccountNumber"  => $param['BankAccountNumber'],
                                                               "IFSCode"            => $param['IFSCode'],
                                                               "PaymentType"        => $param['PaymentType'],
                                                               "Remarks"            => $param['Remarks'],
                                                               "BeneficiaryName"    => $param['BeneficiaryName'],
                                                               "ReferenceNumber"    => "",
                                                               "APIResponse_1"        => "",
                                                               "TransactionStatus"  => "REQUESTED",
                                                               "uid"  => isset($param['uid']) ? $param['uid'] : "0",
                                                               "BankReferenceID"    => "0",
                                                               "RequestedFrom"      => $param['txn_from']));
           $apiToken = "f16f19b5-16fc-4fe0-bbb3-3adafa0301e8";       
           $api_url  = "https://partners.hypto.in"     ;
           $data = array("amount"           => $param['Amount'],     
                         "payment_type"     => "IMPS",
                         "ifsc"             => $param['IFSCode'],
                         "number"           => $param['BankAccountNumber'],
                         "note"             => $param['Remarks'],
                         "udf1"             => "tksd",
                         "udf2"             => $txnid,
                         "udf3"             => "UDF Test 3",
                         "beneficiary_name" => $param['BeneficiaryName'],
                         "reference_number" => "aaranju".$txnid);
           $ch = curl_init( $api_url."/api/transfers/initiate" );
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: f16f19b5-16fc-4fe0-bbb3-3adafa0301e8',
                                                      'Content-Type: application/json'));
           $payload = json_encode( $data );
           curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
           curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
           $res = curl_exec($ch);
           curl_close($ch);
           $mysql->execute("update `_tbl_money_transfer` set `APIResponse_1`='".$res."'   where `MoneyTransferID`='".$txnid."'");
           $res = json_decode($res,true);
           
           if ($res['success']==0) {
               $mysql->execute("update `_tbl_money_transfer` set `TransactionStatus`='FAILURE',`Debit`='0',`Balance`='".$user_balance."'   where `MoneyTransferID`='".$txnid."'");
               
               $td=$mysql->select("select * from _users where userid='".$param['userid']."'");
               if (strlen(trim($td[0]['moneytransfer_callback']))>5) {
                   $ch = curl_init($td[0]['moneytransfer_callback']."&action=sendMessage&Message=".urlencode("Transaction failure. Number: ". $param['BankAccountNumber'].", IFSCode: ".$param['IFSCode'].", Amount: ".$param['Amount']." Balance: ".$user_balance));
                   curl_exec($ch);
                   curl_close($ch);
               }
               return array("response"=>array("status"=>"FAILURE","error"=>"failed to initiate","txnid"=>$txnid)); 
               //return array("response"=>array("status"=>"FAILURE","error"=>$res['reason'],"txnid"=>$txnid)); 
           } else {
               sleep(10);
               $ch = curl_init( $api_url."/api/transfers/status/".$res['data']['reference_number']);
               curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: f16f19b5-16fc-4fe0-bbb3-3adafa0301e8','Content-Type: application/json'));
               curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
               $res2 = curl_exec($ch);
               curl_close($ch);
               
               $mysql->execute("update `_tbl_money_transfer` set `APIResponse_2`='".$res2."'   where `MoneyTransferID`='".$txnid."'");
               $res2 = json_decode($res2,true);
               if (strlen(trim($res2))<5) {
                   sleep(10);
                   $ch = curl_init( $api_url."/api/transfers/status/".$res['data']['reference_number']);
                   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: f16f19b5-16fc-4fe0-bbb3-3adafa0301e8','Content-Type: application/json'));
                   curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                   $res2 = curl_exec($ch);
                   curl_close($ch);
                   $mysql->execute("update `_tbl_money_transfer` set `APIResponse_2`='".$res2."'   where `MoneyTransferID`='".$txnid."'");
                   $res2 = json_decode($res2,true);
               }
               
               //COMPLETED                                               
               if ($res2['data']['status']=="FAILED") {
                   $mysql->execute("update `_tbl_money_transfer` set `TransactionStatus`='FAILURE',`Debit`='0',`Balance`='".$user_balance."'   where `MoneyTransferID`='".$txnid."'");
                   
                   $td=$mysql->select("select * from _users where userid='".$param['userid']."'");
                   if (strlen(trim($td[0]['moneytransfer_callback']))>5) {
                       $ch = curl_init( $td[0]['moneytransfer_callback']."&action=sendMessage&Message=".urlencode("Transaction failure. Number: ". $param['BankAccountNumber'].", IFSCode: ".$param['IFSCode'].", Amount: ".$param['Amount']." Balance: ".$user_balance));
                       curl_exec($ch);
                       curl_close($ch);
                   }
                   return array("response"=>array("status"=>"FAILURE","error"=>"Failed","txnid"=>$txnid)); 
               } else {
                   $mysql->execute("update `_tbl_money_transfer` set `TransactionStatus`='SUCCESS',`ReferenceNumber`='".$res2['data']['bank_ref_num']."'  where `MoneyTransferID`='".$txnid."'");
                   $charges = 0;
                   
                   if ($param['Amount']>=10 && $param['Amount']<1000) {
                       $charges = 5;
                   }
                   
                   if ($param['Amount']>=1001 && $param['Amount']<=3000) {
                       $charges = 7;
                   }
                   
                   if ($param['Amount']>=3001 && $param['Amount']<=7000) {
                       $charges = 10;
                   }
                   
                   if ($param['Amount']>=7001 && $param['Amount']<=10000) {
                       $charges = 15;
                   }
                   
                   $mysql->insert("_tbl_money_transfer",array("UserID"             => $param['userid'],
                                                              "TxnDate"            => date("Y-m-d H:i:s"),
                                                              "Particulars"        => "Charges/".$txnid,
                                                              "IsWalletUpdate"     => "3",
                                                              "Credit"             => "0",
                                                              "Debit"              => $charges,
                                                              "Balance"            => $user_balance-$param['Amount']-$charges,
                                                              "BankAccountNumber"  => "",
                                                              "IFSCode"            => "",
                                                              "PaymentType"        => "",
                                                              "Remarks"            => "",
                                                              "BeneficiaryName"    => "",
                                                              "ReferenceNumber"    => "",
                                                              "APIResponse_1"        => "",
                                                              "TransactionStatus"  => "SUCCESS",
                                                              "BankReferenceID"    => "0",
                                                              "RequestedFrom"      => $param['txn_from']));
                         
                   $td=$mysql->select("select * from _users where userid='".$param['userid']."'");
                   if (strlen(trim($td[0]['moneytransfer_callback']))>5) {
                        $user_balance = MoneyTransfer::get_balance($param['userid']);
                       $url =  $td[0]['moneytransfer_callback']."&action=sendMessage&Message=".urlencode("Transaction Success. Number: ". $param['BankAccountNumber'].", IFSCode: ".$param['IFSCode'].", Amount: ".$param['Amount'].", Balance: ".$user_balance);
                       $ch = curl_init($url);
                       curl_exec($ch);
                       curl_close($ch);
                   }                                        
                   return array("response"=>array("status"=>"SUCCESS","transid"=>$res2['data']['bank_ref_num'],"uid"=>$param['uid'],"txnid"=>$txnid));  
               }           
           }
        }
    }

    class BusTicket {
        
        function get_balance($userid) {
            global $mysql;
            $t = $mysql->select("select (sum(credits)-sum(debits)) as bal from _accounts_busticket where Userid='".$userid."'");
            return isset($t[0]['bal']) ? $t[0]['bal'] : 0;
        } 
        
    }
    
    class Recharge {
        
        function get_balance($userid) {
            global $mysql;
            $t = $mysql->select("select (sum(credits)-sum(debits)) as bal from _accounts where userid='".$userid."'");
            return isset($t[0]['bal']) ? $t[0]['bal'] : 0;
        }
        
        function doRecharge($param) {
            
            global $mysql,$_txnid;
            
            if (!(Recharge::get_balance($param['userid'])>$param['amount'])) {
                 return array("response"=>array("status"=>"failure","error"=>"service unavailable"));
            }
           //  "txn_mode"        => (ONLINE=="1") ? "online" : "offline",
            $txnid = $mysql->insert("_transactions",array("userid"          => $param['userid'],
                                                          "txndate"         => date("Y-m-d H:i:s"),
                                                          "rcnumber"        => $param['number'],
                                                          "rcamount"        => $param['amount'],
                                                          "optrcode"        => $param['optr'],
                                                          "rctype"          => $param['optrtype'],
                                                          "rcstatus"        => "SUCCESS",
                                                          "transid"         => "0",
                                                          "requestedurl"    => "0",
                                                          "apiresponse"     => "0",
                                                          "txn_from"        => $param['txn_from'],
                                                          "api_uid"         => $param['uid'],
                                                          "return_url"      => "",
                                                          "txn_mode"        => $param['txn_from'],
                                                          "refundon"        => date("Y-m-d H:i:s"),
                                                          "return_response" => ""));
            $_txnid = $txnid;
            $url = "https://vasanthamrecharge.com/ebird/api/rechargeapi.php?uname=JJSOFTAPI&password=72965&provider=".$param['optr']."&mobno=".$param['number']."&amount=".$param['amount']."&uid=".$txnid."&format=json";
            $mysql->execute("update `_transactions` set `requestedurl`='".$url."' where `rctxtid`='".$txnid."' ");
            $aid = $mysql->insert("_accounts",array("userid"                    => $param['userid'],
                                                    "txndate"                   => date("Y-m-d H:i:s"),
                                                    "particulars"               => $param['optrtype'],
                                                    "rcnumber"                  => $param['number'],
                                                    "rcamount"                  => $param['amount'],
                                                    "credits"                   => "0",
                                                    "debits"                    => $param['amount'],
                                                    "balance"                   => Recharge::get_balance($param['userid'])-$param['amount'],
                                                    "rctxnid"                   => $txnid));  
            if (ONLINE=="1") {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $repsonse = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($repsonse,true); 
                $mysql->execute("update `_transactions` set `apiresponse`='".$repsonse."', transid='".$res['response']['transid']."'  where `rctxtid`='".$txnid."' ");
            } else {
                $res['response']['status']="Accepted" ;
                $res['response']['transid']=$txnid;
            }
            
            if ($res['response']['status']=="Accepted") {
                //if ($param['optr']=="RJ") {
                    //$waitSeconds = 48;   
                    //for($i=1;$i<$waitSeconds;$i++) {
                    //$s = $mysql->select("select * from `_transactions` where `rctxtid`='".$txnid."'");
                             // if ($s[0]['rcstatus']=="FAILURE") {           
                                //  return array("response"=>array("status"=>"FAILURE","error"=>"0"));      
                             // }
                              //if ($s[0]['rcstatus']=="SUCCESS" && strlen($s[0]['transid'])>6) {
                                   //return array("response"=>array("status"=>"SUCCESS","transid"=>$s[0]['transid'],"uid"=>$param['uid'],"txnid"=>$txnid));    
                             // }
                             // sleep(1);
                          //}
                          //return array("response"=>array("status"=>"SUCCESS","transid"=>$res['response']['transid'],"uid"=>$param['uid'],"txnid"=>$txnid));    
                          //return array("response"=>array("status"=>"PENDING","transid"=>$res['response']['transid'],"uid"=>$param['uid'],"txnid"=>$txnid));    
                      //} else {
                          return array("response"=>array("status"=>"success","transid"=>$res['response']['transid'],"uid"=>$param['uid'],"txnid"=>$txnid));    
                     // }
            } else {
                $mysql->execute("update `_transactions` set `rcstatus`='FAILURE', `transid`='0' where `rctxtid`='".$txnid."'");
                $mysql->execute("update `_accounts` set `debits`='0', balance=(balance-debits) where `rctxnid`='".$txnid."'"); 
                return array("response"=>array("status"=>"failure","error"=>$res['response']['error'],"txnid"=>$txnid));    
            }           
        }
    }
    
    class SMS {
        
        function getTransactionSMSCredits($userid) {
            global $mysql;
            $bal= $mysql->select("select (sum(credits)-sum(debits)) as bal from _smstransactions where userid='".$userid."'");
            return isset($bal[0]['bal']) ? $bal[0]['bal'] : 0;
        }
        
        function GetSMSCount($message) {
            $d = intval( (strlen(trim($message))) / 160) ;
            if ($d*160<=strlen(trim($message))) {
                $d++;
            }
            return $d;
        }
      
        function sendsms($MobileNumber,$Text,$SenderID,$smsid,$userid,$txnfrom) {
            
            global $mysql;
            $smscount=SMS::GetSMSCount($Text);
            $url="http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=".$SenderID."&phone=".$MobileNumber."&text=".urlencode(trim($Text))."&priority=ndnd&type=ndnd&smstype=normal&stype=normal";
            $id=$mysql->insert("_smstransactions",array("txndate"     => date("Y-m-d H:i:s"),
                                                        "userid"      => $userid,
                                                        "particulars" => "sendsms",
                                                        "senderid"    => "0",
                                                        "sendername"  => $SenderID,
                                                        "mobilenumber"=> $MobileNumber,
                                                        "message"     => trim($Text),
                                                        "messagecount"=> $smscount,
                                                        "credits"     => "0",
                                                        "debits"      => $smscount,
                                                        "txnfrom"     => $txnfrom,
                                                        "uid"         => $smsid,
                                                        "balance"     => SMS::getTransactionSMSCredits($userid)-$smscount,
                                                        "ispurchase"  => "0",
                                                        "apirequest"  => $url,
                                                        "apiresposne" => ""));
            //http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=ETOKEN&phone=9944872965&text=Welcome To all &priority=ndnd&type=ndnd&smstype=normal
            $ch = curl_init($url);
            curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 400);
            $res = curl_exec($ch);
            $mysql->execute("update `_smstransactions` set `apiresposne`='".trim($res)."' where smsid='".$id."'");
            curl_close($ch);
            return $res;                        
        }
    }   
    
    class InternationalSMS {
        
        function getBalanceInternationalSMS($userid) {
            global $mysql;
            $bal= $mysql->select("select (sum(credits)-sum(debits)) as bal from _international_smstransactions where userid='".$userid."'");
            return isset($bal[0]['bal']) ? $bal[0]['bal'] : 0;
        }
        
        function GetSMSCount($message) {
            $d = intval( (strlen(trim($message))) / 160) ;
            if ($d*160<=strlen(trim($message))) {
                $d++;
            }
            return $d;
        }
      
        function sendsms($MobileNumber,$Text,$SenderID,$smsid,$userid,$txnfrom) {
            
            global $mysql;
            //$smscount=SMS::GetSMSCount($Text);
            $ch = curl_init();
            $data = '{"src": "+447428323209","dst": "+91'.$MobileNumber.'", "text": "'.trim($Text).'"}';
            curl_setopt($ch, CURLOPT_URL, "https://api.plivo.com/v1/Account/MAMTQ2OTVIYWY1MDQ4ZJ/Message/");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);          
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json"
            ));
            curl_setopt($ch, CURLOPT_USERPWD, "MAMTQ2OTVIYWY1MDQ4ZJ:N2U1OGJjODY1YTc3NjVjYmEwN2MwYjAxYTNmMTEz");
            $chresult = curl_exec($ch);
            $id=$mysql->insert("_international_smstransactions",array("txndate"     => date("Y-m-d H:i:s"),
                                                        "userid"      => $userid,
                                                        "particulars" => "sendsms",
                                                        "senderid"    => "0",
                                                        "sendername"  => "",
                                                        "mobilenumber"=> $MobileNumber,
                                                        "message"     => trim($Text),
                                                        "messagecount"=> "1",
                                                        "credits"     => "0",
                                                        "txnfrom"     => $txnfrom,
                                                        "uid"         => $smsid,
                                                        "debits"      => "0.0175",
                                                        "balance"     => InternationalSMS::getBalanceInternationalSMS($userid)-0.0175,
                                                        "ispurchase"  => "0",
                                                        "apirequest"  => "",
                                                        "apiresposne" => $chresult));
            return $chresult;                        
        }
    }   
    
    class Telegram {
        
        function getBalance($userid) {
            global $mysql;
            return 1;
            $bal= $mysql->select("select (sum(credits)-sum(debits)) as bal from telegram_outgoing where userid='".$userid."'");
            return isset($bal[0]['bal']) ? $bal[0]['bal'] : 0;
        }
        
        function sendsms($bot,$chatID,$Text,$type,$smsid,$userid,$txnfrom) {
            
            global $mysql;
            if ($type=="text") {
                $data = Telegram::sendTextMessage($bot,$chatID,$Text);
                $charge ="0.25";              
                $charge ="0.00";
            }  
            $Text = str_replace("'","\'",$Text);
            $id=$mysql->insert("telegram_outgoing",array("txndate"          => date("Y-m-d H:i:s"),
                                                         "userid"           => $userid,
                                                         "telegramid"       => "0",
                                                         "chatid"           => $chatID,
                                                         "particulars"      => "send_text_message",
                                                         "testmessage"      => trim($Text),
                                                         "photourl"         => " ",
                                                         "documenturl"      => " ",
                                                         "usedcredits"      => "1",
                                                         "credits"          => "0",
                                                         "debits"           => $charge,
                                                         "balance"          => Telegram::getBalance($userid)-$charge,
                                                         "iswalletupdate"   => "0",
                                                         "msg_type"         => $type,
                                                         "txnfrom"          => $txnfrom,
                                                         "uid"              => $smsid,
                                                         "apiresposne"      => $data));
            return $id;                        
        }

        function sendTextMessage($bot,$chatID,$message) {
                              //markdown / html
            $data = ['chat_id' => $chatID,'text' => $message,'parse_mode'=>'markdown'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$bot."/sendMessage?".http_build_query($data));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $contents = curl_exec($ch);                                  
            curl_close($ch);
            return $contents;
        }
    
        function sendImage($chatID,$url) {
            
            $post_fields = array('chat_id'   => $chatID, 'photo'     => $url);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$this->botID."/sendPhoto?chat_id=".$chatID);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
            $contents = curl_exec($ch);                                  
            curl_close($ch);
            return $contents;
        }
    
        function sendDocument($chatID,$url) {
            
            $post_fields = array('chat_id'   => $chatID, 'document'     => $url);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$this->botID."/sendDocument?chat_id=".$chatID);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
            $contents = curl_exec($ch);                                  
            curl_close($ch);
            return $contents;
        }
     }   
    
    
    define("url","https://".$_SERVER['HTTP_HOST']);
    
    function return_result($array) {
        global $mysql,$_txnid;
        if ($_txnid!=""){
            $mysql->execute("update `_transactions` set `ourresponse`='".implode(",",$array['response'])."' where `rctxtid`='".$_txnid."' ");
        }
        if (isset($_GET['response']) && $_GET['response']=="csv") {
            return implode(",",$array['response']);
        } else {
            return json_encode($array);     
        }
    }
    
    
     function _writeTxt($text) {
        $file = "xtelegram".date("Y_m_d").".txt";
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
        fclose($myfile);
    }
?>