<?php
    include_once("config.php");
    
    function writeTxt($text) {
        $file = date("Y_m_d").".txt";
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
        fclose($myfile);
    }
    
    writeTxt(json_encode($_GET));
    
    if ($_GET['status']=="SUCCESS") {
        
        $mysql->execute("update `_transactions` set  `transid`='".$_GET['transid']."',txn_mode='online' where `rctxtid`='".$_GET['uid']."' ");
        $t = $mysql->select("select * from _transactions  where `rctxtid`='".$_REQUEST['uid']."' ");
    
        if ($t[0]['txn_from']=="API"){
            $d = $mysql->select("select * from _users where userid='".$t[0]['userid']."'");    
            $requrl = $d[0]['response_url']."uid=".$t[0]['api_uid']."&transid=".$_GET['transid']."&status=".$_GET['status'];
            $res = file_get_contents($requrl);
            $mysql->execute("update  _transactions  set `return_response`='".$res."', return_url='".$requrl."'  where `rctxtid`='".$_REQUEST['uid']."' ");
        }
    }

    if ($_GET['status']=="FAILURE") {
        
        $mysql->execute("update `_transactions` set  `transid`='0', `rcstatus`='FAILURE', txn_mode='online', refundon='".date("Y-m-d H:i:s")."' where `rctxtid`='".$_GET['uid']."' ");
        writeTxt("update `_transactions` set  `transid`='0', `rcstatus`='FAILURE', refundon='".date("Y-m-d H:i:s")."' where `rctxtid`='".$_GET['uid']."' ");
        //amount refund procss
        $mysql->execute("update `_accounts` set `debits`='0' , balance=(balance-debits) where `rctxnid`='".$_REQUEST['uid']."'"); 
        writeTxt("update `_accounts` set `debits`='0' , balance=(balance-debits) where `rctxnid`='".$_REQUEST['uid']."'");
         
        $t = $mysql->select("select * from _transactions  where `rctxtid`='".$_REQUEST['uid']."' ");
    
        if ($t[0]['txn_from']=="API"){
            $d = $mysql->select("select * from _users where userid='".$t[0]['userid']."'");    
            $requrl = $d[0]['response_url']."uid=".$t[0]['api_uid']."&transid=".$_GET['transid']."&status=".$_GET['status'];
            $res = file_get_contents($requrl);
            $mysql->execute("update  _transactions  set `return_response`='".$res."', return_url='".$requrl."'  where `rctxtid`='".$_REQUEST['uid']."' ");
        }
    }
?> 