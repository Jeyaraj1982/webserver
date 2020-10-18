<?php
    include_once("config.php");
    
    $_REQUEST['senderid'] = strtoupper($_REQUEST['senderid']);
    $_REQUEST['sendto']   = trim($_REQUEST['sendto']);
    $_REQUEST['message']  = trim($_REQUEST['message']);
    
    $data  = $mysql->select("select * from _user where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."'");
  
    if (!(sizeof($data)>0)) {
         echo   "FAILURE,Invalid User,".date("Y-m-d H:i:s");
         exit;
    }
    
    if (strlen($_REQUEST['message'])<5) {
        echo  "FAILURE,Message should have morethan 5 characters,".date("Y-m-d H:i:s");
        exit;
    }
   
    if (strlen($_REQUEST['message'])>1000) {
        echo  "FAILURE,Message should have lessthan 1000 characters,".date("Y-m-d H:i:s");
        exit;
    }
     
    $smscount = intval(strlen($_REQUEST['message'])/155);
    
    if (strlen($_REQUEST['message'])>$smscount*155) {
        $smscount++;
    }
    
    if (!( (checkCredits($data[0]['id'])-$smscount) > 0) ) { 
        echo "FAILURE,Low Credits.".date("Y-m-d H:i:s");
        exit;  
    }
    
    $senderID = checkValidSenderIDAPI($data[0]['id'],$_REQUEST['senderid']);
    
    if (!(sizeof($senderID)>0)) {
        echo  "FAILURE,Invalid Sender's ID,".date("Y-m-d H:i:s");
        exit;
    }

    $senderID = $senderID[0];
 
    if (!( strlen($_REQUEST['sendto'])==10 && $_REQUEST['sendto']<9999999999 && $_REQUEST['sendto']>7000000000)) {
        echo  "FAILURE,Invalid Mobile Number,".date("Y-m-d H:i:s");
        exit;
    }     
    $smstype = isset($_REQUEST['type']) ? $_REQUEST['type'] : "normal";
    
    $id = $mysql->insert("_mobilesms",array("userid"      => $data[0]['id'],
                                            "sid"         => $senderID['sid'],
                                            "sendto"      => $_REQUEST['sendto'],
                                            "message"     => $_REQUEST['message'],
                                            "senton"      => date("Y-m-d H:i:s"),
                                            "sentfrom"    => "api",
                                            "apiresponse" => "Sent",
                                            "apiresponse" => "Sent",
                                            "route" => $smstype,
                                            "smscount"    => $smscount));

    if ($id>0)  {
            $api = file_get_contents("http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=".$senderID['senderid']."&phone=".$_REQUEST['sendto']."&text=".urlencode(trim($_REQUEST['message']))."&priority=ndnd&type=".$smstype);   
            $mysql->execute("update _mobilesms set apiresponse='".$api."' where id=".$id);
            echo "SUCCESS,".$id.",".date("Y-m-d H:i:s");
    } else {
        echo  "FAILURE,Error Sending SMS,".date("Y-m-d H:i:s");
        exit; 
    }  
?> 