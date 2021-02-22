<?php
    include_once("config.php");
    
    function writeTxt($text) {
        $file = date("Y_m_d").".txt";
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
        fclose($myfile);
    }
    
    $commission = array("RV"=>"4");
    
    writeTxt(json_encode($_GET));
    
    if ($_GET['status']=="SUCCESS") {

        $mysql->execute("update `_transactions` set `transid`='".$_GET['transid']."',txn_mode='online' where `rctxtid`='".$_GET['uid']."' ");
        
        $t = $mysql->select("select * from _transactions  where `rctxtid`='".$_REQUEST['uid']."' ");
        if (isset($commission[$t[0]['optrcode']])) {
            $amount = $t[0]['rcamount'] - ( $t[0]['rcamount']* $commission[$t[0]['operatorcode']] ) /100;
            $mysql->execute("update `_transactions` set `mycost`='".$amount."'  where `rctxtid`='".$_GET['uid']."' ");
        }
        
        if ($t[0]['txn_from']=="API") {
            $d = $mysql->select("select * from _users where userid='".$t[0]['userid']."'");    
            $requrl = $d[0]['recharge_callback']."uid=".$t[0]['api_uid']."&transid=".$_GET['transid']."&status=".$_GET['status'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$requrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_PORT, PORT);
            curl_setopt($ch, CURLOPT_TIMEOUT, 90); //timeout in seconds
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $res = curl_exec($ch); 
            writeTxt($requrl);                                  
            $mysql->execute("update  _transactions  set `return_response`='".$res."', return_url='".$requrl."'  where `rctxtid`='".$_REQUEST['uid']."' ");
        }
    }

    if ($_GET['status']=="FAILURE") {
        
        $mysql->execute("update `_transactions` set  `transid`='0', `rcstatus`='FAILURE', refundon='".date("Y-m-d H:i:s")."' where `rctxtid`='".$_GET['uid']."' ");
      //  $mysql->execute("update `_accounts` set `debits`='0' , balance=(balance-debits) where `rctxnid`='".$_REQUEST['uid']."'"); 
        
        $ac = $mysql->select("select * from `_accounts` where `rctxnid`='".$_REQUEST['uid']."'"); 
         $aid = $mysql->insert("_accounts",array("userid"      => $ac[0]['userid'],
                                                 "txndate"     => date("Y-m-d H:i:s"),
                                                 "particulars" => "Rev:".$ac[0]['particulars'],
                                                 "rcnumber"    => $ac[0]['rcnumber'],
                                                 "rcamount"    => $ac[0]['rcamount'],
                                                 "credits"     => $ac[0]['debits'],
                                                 "debits"      => "0",
                                                 "balance"     => Recharge::get_balance($ac[0]['userid'])+$ac[0]['debits'],
                                                 "rctxnid"     => "-".$_GET['uid']));  
                                                    
        $t = $mysql->select("select * from _transactions  where `rctxtid`='".$_REQUEST['uid']."' ");
        
        if ($t[0]['txn_from']=="API"){
            $d = $mysql->select("select * from _users where userid='".$t[0]['userid']."'");    
            $requrl = $d[0]['recharge_callback']."uid=".$t[0]['api_uid']."&transid=".$_GET['transid']."&status=".$_GET['status'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$requrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_PORT, PORT);
            curl_setopt($ch, CURLOPT_TIMEOUT, 90); //timeout in seconds
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $res = curl_exec($ch); 
            $mysql->execute("update  _transactions  set `return_response`='".$res."', return_url='".$requrl."'  where `rctxtid`='".$_REQUEST['uid']."' ");
        }
    }
?> 