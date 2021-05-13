<?php
    session_start();
    date_default_timezone_set('Asia/Calcutta'); 
    define("SITE_URL","https://hamiec.j2jsoftwaresolutions.com");
    define("SITE_TITLE","HamiEC");                       
    define("SQL_LOG_PATH","/home/j2jsoftwares/public_html/domains/hamiec/");
    //define("AdminTelegramID","316574188x");
    define("loginUrl","http://hamiec.j2jsoftwaresolutions.com/index.php?mindex=2");
    
    if (isset($_GET['action']) && $_GET['action']=="logout") {
        session_destroy();
        $_SESSION['User']=array();
        setcookie ("username","",time()-3600);
        setcookie ("password","",time()-3600);
        echo "<script>location.href='".loginUrl."';</script>"; 
        exit;
    }
    
    if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Member") {
        define("UserRole","Member");
    }
    if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
        define("UserRole","Admin");
    }
     
    define("DbHost","localhost");
    define("DbName","j2jsoftw_hamiec");
    define("DbUser","j2jsoftw_user");
    define("DbPassword","mysql@Pwd");
     
    $_CONFIG['START_YEAR'] = 2021;
    $_CONFIG['END_YEAR']   = date("Y");
    $TnebRegion            = array("","01-Chennai-North","02-Viluppuram","03-Coimbatore","04-Erode","05-Madurai","06-Trichy","07-Tirunelvel","08-Vellore","09-chennai-South");                         

    include_once(__DIR__."/app/controller/class.DatabaseController.php");
    include_once(__DIR__."/app/controller/class.MobileSMSController.php");
    include_once(__DIR__."/app/controller/class.TelegramMessageController.php");
    //include_once(__DIR__."/app/controller/class.EzytmAPI.php");
    //include_once(__DIR__."/app/controller/class.MRoboticsAPI.php");
    include_once(__DIR__."/app/controller/class.AaranjuLapu.php");
    include_once(__DIR__."/app/controller/class.TKSD.php");
    include_once(__DIR__."/app/controller/class.ApplicationController.php");
      
    $mysql = new MySqldatabase(DbHost,DbUser,DbPassword,DbName);
    $application = new JApplication();  
     
     
     
     
class Mars {
      
        
        public static function sendRequest($param) {
            
            global $mysql;
            $url = "http://216.10.242.207:".PORT."/MARSrequest/?operator=".$param['operator']."&number=".$param['number']."&amount=".$param['amount']."&reqref=web_x".$param['txnid']."&USERID=900&PASSWORD=7373772010";
            $mysql->execute("update `_tbl_transactions` set `ACtxnid`='".$param['actxnid']."',`calledurl`='".$url."'  where `txnid`='".$param['txnid']."'");
            $mysql->execute("update `_tbl_transactions` set `APIID`='1', `APIName`='Lapu', `calledurl`='".$url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp($url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");
        
        
         if (strpos($api_response, "ERROR") !== false) {
                $msg = explode("mars_reason=",trim($response));
                $msg = $msg[1];
                $return['status']="failure";
                $return['message']=$msg;
                $return['lapuno']="0";
            } else {
                if (strpos($api_response, "ACCEPTED") !== false) {
                    $return['status']="success";
                    $return['operatorid']="0";  
                    $return['lapuno']="0";
                } else {
                    $operatorid = "";     
                    $refno = "";
                    $return['status']="pending";
                    $return['message']="0";
                    $return['lapuno']="0";
                }
            }
            return $return;
        }        
    
}

function getHttp($url) {
    global $mysql;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_PORT, PORT);
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
?>