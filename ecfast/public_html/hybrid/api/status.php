<?php
    include_once("../config.php");
  http://hybrid.sanatell.in/api/status.php?uname=sanamovies2015@gmail.com&pwd=vls@india&utxnid=170002014  
    
        $data = $mysql->select("select * from _users where emailid='".$_REQUEST['uname']."' and password='".$_REQUEST['pwd']."'");
        if (sizeof($data)>0) {
            $txn = $mysql->select("select * from _virtualtbltransaction where userid=".$data[0]['userid']." and usertxnid='".$_REQUEST['utxnid']."'");
     if (sizeof($txn)>0) {
        $result = array("status"=>"true",
                        "txnid"=>$txn[0]['txnid'],
                        "txnon"=>$txn[0]['txnon'],
                        "rechargeno"=>$txn[0]['rechargeno'],
                        "operator"=>$txn[0]['operator'],
                        "rechargeamt"=>$txn[0]['rechargeamt'],
                        "operatorid"=>$txn[0]['operatorid'],
                        "oldbalance"=>$txn[0]['oldbalance'],
                        "newbalance"=>$txn[0]['newbalance'],
                        "txnstatus"=>$txn[0]['txnstatus'],
                        "txnstatus"=>$txn[0]['txnstatus'],
                        "revtxnid"=>$txn[0]['revtxnid'],
                        "creditamt"=>$txn[0]['creditamt'],
                        "debitamt"=>$txn[0]['debitamt'],
                        "usertxnid"=>$txn[0]['usertxnid'],
                    );
            echo json_encode($result);        
     } else {
         echo "false,Invalid usertransaction id";
     }      
        } else {
            echo "false,Invalid user/password";
        }
     
?>