<?php
    include_once("admin/config.php");
    writeTxt(json_encode($_GET));
    function writeTxt($text) {
        $file = "telegram".date("Y_m_d").".txt";
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
        fclose($myfile);
    }
    $id = $mysql->insert("telegram_recevied_records",array("api_txnid"        => $_GET['txnid'],
                                                           "client_id"        => $_GET['clientid'],
                                                           "reciviedmessage"  => $_GET['message'],
                                                           "requestedon"      => date("Y-m-d H:i:s"),
                                                           "telegram_name"    => $_GET['from']));
    $d = $mysql->select("select * from telegram_subscribers where client_id='".$_GET['clientid']."'");
    if (sizeof($d)==0) {
        $mobilenumber = str_replace("TKSD","",strtoupper(trim($_GET['message'])));
        if ($mobilenumber>=6000000000 && $mobilenumber<=9999999999) {
            $message = " Welcome to TKSD Online Service. Any queries or feedback please contact support team.";
            $mysql->insert("telegram_subscribers",array("client_id"     => $_GET['clientid'],
                                                        "mobilenumber"  => $mobilenumber,
                                                        "parsefrom"     => $id,
                                                        "addedon"       => date("Y-m-d H:i:s")));
            $memberTable = $mysql->select("select * from _tbl_member where MobileNumber='".$mobilenumber."'");
            if ($memberTable[0]['MobileNumber']==$mobilenumber) {
                 $mysql->execute("update _tbl_member set TelegramID='".$_GET['clientid']."' where MemberID='".$memberTable[0]['MemberID']."'");
            }
            TelegramMessageController::sendSMS($_GET['clientid'],$message,0,0);
       }
    }
//https://pschool.in
?> 