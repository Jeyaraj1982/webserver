<?php
    session_start();
    date_default_timezone_set('Asia/Calcutta');
    ini_set('memory_limit', '-1');
    define("SERVERPATH","/home/onlinej2j/public_html/");
    define("SITE_URL","https://mweb.onlinej2j.com");
    define("SITE_TITLE","OnlineJ2J");
    define("SQL_LOG_PATH","/home/onlinej2j/public_html/mweb/admin/logs");
   // define("AdminTelegramID","A316574188"); 
    define("loginUrl","https://mweb.onlinej2j.com/index.php");
    
    if (isset($_GET['action']) && $_GET['action']=="logout") {
        session_destroy();
        $_SESSION['User']=array();
        setcookie ("username","",time()-3600);
        setcookie ("password","",time()-3600);
        echo "<script>location.href='".loginUrl."';</script>"; 
        exit;
    }
    $userRole="";
    if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Member") {
        $userRole = "Member";
    }
    if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
        define("UserRole","Admin");
    }
    define("UserRole",$userRole);
    define("DbHost","localhost");
    define("DbName","j2jsoftw_hamiec");
    define("DbUser","j2jsoftw_user");
    define("DbPassword","mysql@Pwd");

    $_CONFIG['START_YEAR']=2020;
    $_CONFIG['END_YEAR']=date("Y");
    $TnebRegion = array("","01-Chennai-North","02-Viluppuram","03-Coimbatore","04-Erode","05-Madurai","06-Trichy","07-Tirunelvel","08-Vellore","09-chennai-South");
       
    include_once(SERVERPATH."/app/controller/class.DatabaseController.php");
    include_once(SERVERPATH."/app/controller/class.MobileSMSController.php");
    include_once(SERVERPATH."/app/controller/class.TelegramMessageController.php");
    include_once(SERVERPATH."/app/controller/class.EzytmAPI.php");
    include_once(SERVERPATH."/app/controller/class.MRoboticsAPI.php");
    include_once(SERVERPATH."/app/controller/class.AaranjuLapu.php");
    include_once(SERVERPATH."/app/controller/class.ApplicationController.php");
              
    $mysql       = new MySqldatabase(DbHost,DbUser,DbPassword,DbName);
    
    $application = new JApplication();    
              
    function getHttp($url) {
        global $mysql;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_, PORT);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90); //timeout in seconds
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);   
        return $response;
    }
    
    function getHttp2($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600); //timeout in seconds
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);   
        return $response;
    }
    
    function getHttp3($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6000); //timeout in seconds
        $response = curl_exec($ch);   
        curl_close($ch);
        return $response;
    }

    function getUpperLimit($MemberID) {
    global $mysql;
    $userlimit = $mysql->select("select * from _tbl_member where MemberID='".$MemberID."'");
    if ($userlimit[0]['MoneyTransferLimit']>0) {
        return $userlimit[0]['MoneyTransferLimit'];
    } else {
        $adminLimit = $mysql->select("select * from _tbl_members_imps_limits where MemberID='".$MemberID."' and  date(TxnDate)=date('".date("Y-m-d")."') order by id desc ");
        if (isset($adminLimit[0]['TransferLimit'])) {
            return $adminLimit[0]['TransferLimit'];
        } else {
            $previous_day_balance = $mysql->select("select (sum(Credit)-sum(Debit)) as previous_balance from _tbl_accounts where date(TxnDate)<=date('".date("Y-m-d",strtotime(date("Y-m-d"). ' -1 days'))."') and MemberID='".$MemberID."'");
            return isset($previous_day_balance[0]['previous_balance']) ? intval($previous_day_balance[0]['previous_balance']/2) : 0;
        }
    }
}

function getTodayTransfered($MemberID) {
    global $mysql; 
    $today_transfered  = $mysql->select("select sum(rcamount) as rcamount from _tbl_transactions where TxnStatus='success' and memberid='".$_SESSION['User']['MemberID']."' and date(txndate)=date('".date("Y-m-d")."') and operatorcode='MTB' ");
    return isset($today_transfered[0]['rcamount']) ? $today_transfered[0]['rcamount'] : 0;
}

function getDealerTodayTransfered($MemberID) {                                                                                     
    global $mysql; 
    $today_transfered  = $mysql->select("select sum(rcamount) as rcamount from _tbl_transactions where TxnStatus='success' and memberid in (select MemberID from _tbl_member where MapedTo ='".$_SESSION['User']['MemberID']."') and date(txndate)=date('".date("Y-m-d")."') and operatorcode='MTB' ");
    return isset($today_transfered[0]['rcamount']) ? $today_transfered[0]['rcamount'] : 0;
}

class Whatsapp {
    
    public static function sendSMS($MobileNumber,$Message,$MemberID,$DocUrl="") {
        
        global $mysql;
         $Message = "*TKSD Online Service* %0a".$Message." %0a%0a*if any query plz whatsapp 9003638869*";
        $id=$mysql->insert("_tbl_Log_WhatsappMessage",array("MemberID"   => $MemberID,
                                                            "SmsTo"      => $MobileNumber,
                                                            "Message"    => $Message,
                                                            "DocUrl"     => $DocUrl,
                                                            "Url"        => "",
                                                            "MessagedOn" => date("Y-m-d H:i:s")));
        $url = "https://www.aaranju.in/whatsapp/api.php?apiusername=d2VsY29tZUA&apipassword=jM0NTY3ODk&uid=".$id;//"&msgtype=text&clientid=".$mobileNumber."&message=".urlencode($text)."&uid=tksd_".$id;                                               
        
        $mysql->execute("update _tbl_Log_WhatsappMessage set Url='".$url."' where SMSID='".$id."'");
        
        $fields = array('MobileNumber'=>$MobileNumber,'Message'=>$Message,"DocUrl"=>$DocUrl);
        $postvars = '';
        foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        $response = curl_exec($ch);
        $mysql->execute("update _tbl_Log_WhatsappMessage set APIResponse='".$response."' where SMSID='".$id."'");
        return $id;
    }
}

class SMSController {
    
    public static function sendSMS($param) {
        if ($param['TelegramID']>0) {
            TelegramMessageController::sendSMS($param['TelegramID'],$param['Message'],0,0);
        }
        Whatsapp::sendSMS($param['MobileNumber'],$param['Message'],"",$param['MemberID']);
    }
    
}
define("WAP_NEWLINE","%0A");


/*
http://216.10.242.207:7860/MARSrequest/?operator=RJ&number=9944872965&amount=10&reqref=A00000121&USERID=900&PASSWORD=7373772010
REQUEST ACCEPTED your ref=A00000121 mars_reference=RC4063243111077568279
REQUEST ERROR errorno=6;your ref=A00000121;mars_reason=Recharge disabled for this operator
*/
?>