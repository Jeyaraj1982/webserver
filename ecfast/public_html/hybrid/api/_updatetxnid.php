<?php
include_once("../config.php");

    $process=false;
    
    if ($_REQUEST['status']=="SUCCESS") {
    
        $mysql->execute("update _tbltransaction set operatorid='".$_REQUEST['operatorid']."' where txnid=".$_REQUEST['usertxnid']);
        $txn = $mysql->select("select * from _tbltransaction where txnid=".$_REQUEST['usertxnid']);
        $mysql->execute("update _virtualtbltransaction set operatorid='".$_REQUEST['operatorid']."' where txnid=".$txn[0]['usertxnid']);
        echo "OperatorID Updated";
        $process=true;
    }

    if ($_REQUEST['status']=="REVERSED") {
        
        $txn = $mysql->select("select * from _tbltransaction where txnid=".$_REQUEST['usertxnid']); 
        
        if (strlen(trim($txn[0]['operatorid']))>3) {
            exit; 
        }
        
        if ($txn[0]['txnstatus']=="SUCCESS") {
            
            $adminUser = $mysql->select("select * from _users where userid=".$txn[0]['userid']);
            $adminbalance = getVirtualBalanceOperatorWise($adminUser[0]['userid'],$txn[0]['operator']);
    
            $txnid = $mysql->insert("_tbltransaction",array("userid"        => $adminUser[0]['userid'],
                                                            "txnon"         => date("Y-m-d H:i:s"),
                                                            "rechargeno"    => $txn[0]['rechargeno'],
                                                            "operator"      => $txn[0]['operator'],
                                                            "rechargeamt"   => $txn[0]['rechargeamt'],
                                                            "apiresponse"   => "api",
                                                            "remarks"       => "Reversed",
                                                            "oldbalance"    => $adminbalance,
                                                            "newbalance"    => $adminbalance+$txn[0]['rechargeamt'],
                                                            "txnstatus"     => "REVERSED",
                                                            "apiurl"        => "apiurl",
                                                            "operatorid"    => "FROM TXN ID: ".$_REQUEST['usertxnid'].$txn[0]['rechargeno'],
                                                            "revtxnid"      => $_REQUEST['usertxnid'],
                                                            "creditamt"     => $txn[0]['rechargeamt'],
                                                            "usertxnid"     => $txn[0]['vtxnid'],
                                                            "debitamt"      => "0",
                                                            "vtxnid"        => $txn[0]['vtxnid'],
                                                            "txnuserid"     => $txn[0]['txnuserid'],
                                                            "txnusername"   => $txn[0]['txnusername']));
     
            if ($txn[0]['vtxnid']>0) {
                
                $user  = $mysql->select("select * from _users where userid=".$txn[0]['txnuserid']);                                                  
                
                $userBalance = getVirtualBalanceOperatorWise($user[0]['userid'],$txn[0]['operator']);
                $vvtxn = $mysql->select("select * from _tbltransaction where txnid=".$txn[0]['vtxnid']); 
                     
                $vtxnid = $mysql->insert("_virtualtbltransaction",array("userid"      => $user[0]['userid'],
                                                                        "txnon"       => date("Y-m-d H:i:s"),
                                                                        "rechargeno"  => $txn[0]['rechargeno'],
                                                                        "operator"    => $txn[0]['operator'],
                                                                        "rechargeamt" => $txn[0]['rechargeamt'],
                                                                        "apiresponse" => "api",
                                                                        "remarks"     => "Reversed",
                                                                        "oldbalance"  => $userBalance,
                                                                        "newbalance"  => $userBalance+$txn[0]['rechargeamt'],
                                                                        "txnstatus"   => "REVERSED",
                                                                        "apiurl"      => "apiurl",
                                                                        "operatorid"  => "FROM TXN ID: ".$txn[0]['vtxnid'],
                                                                        "revtxnid"    => $txn[0]['vtxnid'],
                                                                        "creditamt"   => $txn[0]['rechargeamt'],
                                                                        "usertxnid"   => $txn[0]['vtxnid'],
                                                                        "debitamt"    => "0"));
                $mysql->execute("update _virtualtbltransaction set operatorid='TO TXN ID: ".$vtxnid." ',txnstatus='REVERSED'  where txnid=".$txn[0]['vtxnid']);
            }
            
            $mysql->execute("update _tbltransaction set operatorid=Concat(operatorid,' TO TXN ID: ".$txnid." '),txnstatus='REVERSED'  where txnid=".$_REQUEST['usertxnid']);
            echo "TXN REVERSED";
            $process=true;

        }

    }

    if ($process) {
        
        if ($txn[0]['vtxnid']>0) {
            
            $txn = $mysql->select("select * from _tbltransaction where txnid=".$_REQUEST['usertxnid']);   
            $data = $mysql->select("select * from _virtualtbltransaction where txnid=".$txn[0]['usertxnid']);
            $user  = $mysql->select("select * from _users where userid=".$txn[0]['txnuserid']);     
                                                     
            $mysql->execute("update _virtualtbltransaction set callbackurl='".$url."' where txnid=".$txn[0]['usertxnid']); 
            $url = $user[0]['reverseurl']."?status=".$_REQUEST['status']."&operatorid=".$_REQUEST['operatorid']."&usertxnid=".$data[0]['usertxnid'];
            $callbackresponse = file_get_contents($url); 
            $mysql->execute("update _virtualtbltransaction set callbackresponse='".$callbackresponse."' where txnid=".$txn[0]['usertxnid']);
            
        } else {
            
            $txn = $mysql->select("select * from _tbltransaction where txnid=".$_REQUEST['usertxnid']);   
            $url = $adminUser[0]['reverseurl']."?status=".$_REQUEST['status']."&operatorid=".$_REQUEST['operatorid']."&usertxnid=".$txn[0]['usertxnid'];
            $mysql->execute("update _tbltransaction set callbackurl='".$url."' where txnid=".$_REQUEST['usertxnid']); 
            $callbackresponse = file_get_contents($url); 
            $mysql->execute("update _tbltransaction set callbackresponse='".$callbackresponse."' where txnid=".$_REQUEST['usertxnid']); 
                 
        }

    }
?>  