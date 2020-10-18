<?php
    include_once("../config.php");
    
    if ($_REQUEST['amt']<10) {
       printerror("Invalid Amount"); 
       exit;                                        
    }

    if (!(strlen(trim($_REQUEST['number']))>6)) {
       printerror("Invalid Number"); 
       exit;
    }
    
    if (!(strlen(trim($_REQUEST['pwd']))>0)) {
       printerror("Invalid Password"); 
       exit;
    }
    
    if (!(strlen(trim($_REQUEST['uname']))>0)) {
       printerror("Invalid user name"); 
       exit;
    }
    
    if (!((isset($_REQUEST['uid']) && strlen($_REQUEST['uid'])>=1))) {
       printerror("Invalid User Transaction ID");  
       exit; 
    }
    
    if (!(in_array(trim($_REQUEST['optr']),$operators,TRUE))) {
        printerror("Invalid Operator"); 
        exit;
    }

    $data = $mysql->select("select * from _users where emailid='".trim($_REQUEST['uname'])."' and password='".trim($_REQUEST['pwd'])."'");
  
    if (sizeof($data)==0) {
        printerror("Invalid user/password");
        exit;
    }
    
    if ($data[0]['isapiblock']==1) {
        printerror("Your api access has been blocked. please contact administrator");
        exit;
    }
    
    $optrs = $mysql->select("select * from _operators where operatorname='".$operator_array[$_GET['optr']]."'");
    
    if (!(($optrs[0]['onoff']==1))) {
        printerror("Operator Down");
        exit; 
    }
     
    $balance = getVirtualBalanceOperatorWise($data[0]['userid'],trim($operator_array[$_GET['optr']]));
    if (!($balance>trim($_REQUEST['amt']))) {
        printerror("lowbalance");
        exit;
    }
    
    
    //if ($data[0]['isunder']!=9) {
    if ($data[0]['isuser']==0 && $data[0]['isunder']==1) {
        $adminUser = $mysql->select("select * from _users where userid=".$data[0]['isunder']);
        
        $adminbalance = getVirtualBalanceOperatorWise($adminUser[0]['userid'],trim($operator_array[$_GET['optr']]));
     
        if (!($adminbalance>trim($_REQUEST['amt']))) {
            printerror("lowbalance");
            exit;
        }
    }   else {
        $adminbalance=$balance;
        $adminUser=$data;
        $vtxnid=0;
    }

    $_OPERATOR = array("AIRTEL"         => "RA",
                       "VODAFONE"       => "RV",
                       "IDEA"           => "RI",
                       "AIRTELDIGITALTV"=> "DA",
                       "DISHTV"         => "DD",
                       "SUNDIRECT"      => "DS",
                       "VIDEOCOND2H"    => "DV",
                       "RELIANCEBIGTV"  => "DB",
                       "TATASKY"        => "DT", 
                       "BSNL"           => "RB", 
                       "JIO"            => "RJ");
     
     if ($data[0]['isunder']!=1) {
         
         $vtxnid = $mysql->insert("_virtualtbltransaction",array("userid"      => $data[0]['userid'],
                                                                 "txnon"       => date("Y-m-d H:i:s"),
                                                                 "rechargeno"  => $_REQUEST['number'],
                                                                 "operator"    => $operator_array[$_GET['optr']],
                                                                 "rechargeamt" => $_REQUEST['amt'],
                                                                 "apiresponse" => "api",
                                                                 "remarks"     => " ",
                                                                 "oldbalance"  => $balance,
                                                                 "newbalance"  => $balance-$_REQUEST['amt'],
                                                                 "txnstatus"   => "SUCCESS",
                                                                 "apiurl"      => "apiurl",
                                                                 "operatorid"  => "0",
                                                                 "revtxnid"    => "0",
                                                                 "creditamt"   => "0",
                                                                 "usertxnid"   => $_REQUEST['uid'],
                                                                 "debitamt"    => $_REQUEST['amt']));
                                                  
         $usertxnid=$vtxnid;
     } else {
         $vtxnid="0";
         $usertxnid=$_REQUEST['uid'];
     }
         
     $txnid = $mysql->insert("_tbltransaction",array("userid"       => $adminUser[0]['userid'],
                                                     "txnon"        => date("Y-m-d H:i:s"),
                                                     "rechargeno"   => $_REQUEST['number'],
                                                     "operator"     => $operator_array[$_GET['optr']],
                                                     "rechargeamt"  => $_REQUEST['amt'],
                                                     "apiresponse"  => "api",
                                                     "remarks"      => " ",
                                                     "oldbalance"   => $adminbalance,
                                                     "newbalance"   => $adminbalance-$_REQUEST['amt'],
                                                     "txnstatus"    => "SUCCESS",
                                                     "apiurl"       => "apiurl",
                                                     "operatorid"   => "0",
                                                     "revtxnid"     => "0",
                                                     "creditamt"    => "0",
                                                     "usertxnid"    => $usertxnid,
                                                     "debitamt"     => $_REQUEST['amt'],
                                                     "vtxnid"       => $vtxnid,
                                                     "txnuserid"    => $data[0]['userid'],
                                                     "txnusername"  => $data[0]['emailid']));
     
     $url ="http://aaranju.in/recharge/api.php?username=Z2djYXNoQGdtY&password=WlsLmNvbQ==&response=json&optr=".$_GET['optr']."&number=".$_GET['number']."&amount=".$_GET['amt']."&uid=".$txnid;
     $cSession = curl_init(); 
     curl_setopt($cSession,CURLOPT_URL,$url);
     curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
     curl_setopt($cSession,CURLOPT_HEADER, false); 
     $request=curl_exec($cSession);
     curl_close($request);
     $response = json_decode($request,true);
     
     $myFile = "Hybrid". time()."_".$data[0]['mobilenumber'].".txt";
     $fh = fopen($myFile, 'w') or die("can't open file");
     fwrite($fh, $url."\n");
     fwrite($fh, $request);
     fclose($fh);
     
     if ($response['response']['status']=="FAILURE") {
        $result = array("txnstatus"=>"false","message"=>"Recharge Failed.");  
        $mysql->execute("update _tbltransaction set oldbalance=".$balance.", newbalance=".($balance).", debitamt='0', txnstatus='FAILURE', apiresponse='".$request."' where txnid=".$txnid);
        if ($data[0]['isunder']!=1)   {
            $mysql->execute("update _virtualtbltransaction set oldbalance=".$balance.", newbalance=".($balance).", debitamt='0', txnstatus='FAILURE', apiresponse='".$request."' where txnid=".$vtxnid);
        }
     } else {
        $result = array("txnstatus"=>"success","txnid"=>$txnid,"message"=>"Txn Success");      
        $mysql->execute("update _tbltransaction set apiresponse='".$request."' where txnid=".$txnid);
        if ($data[0]['isunder']!=1)   {
            $mysql->execute("update _virtualtbltransaction set apiresponse='".$request."' where txnid=".$vtxnid);
        }
     }
   echo  $request;
   exit;    
  //http://ecfast.in/hybrid/api/recharge.php?uname=admin@ggcash.in&pwd=123456&optr=RA&number=9944872965&amt=10&uid=2   
?>