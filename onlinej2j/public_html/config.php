<?php
    session_start();
    date_default_timezone_set('Asia/Calcutta'); 
    define("SITE_URL","https://www.onlinej2j.com");
    define("SITE_TITLE","OnlineJ2J");                       
    define("SERVER_PHYSICAL_PATH","/home/onlinej2j/public_html/");     
    define("SQL_LOG_PATH",SERVER_PHYSICAL_PATH."/logs/");     
    
    //define("AdminTelegramID","316574188x");
    define("loginUrl","https://www.onlinej2j.com/");
    
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

    include_once(SERVER_PHYSICAL_PATH."/app/controller/class.DatabaseController.php");
    include_once(SERVER_PHYSICAL_PATH."/app/controller/class.TelegramMessageController.php");
    include_once(SERVER_PHYSICAL_PATH."/app/controller/class.AaranjuLapu.php");
    include_once(SERVER_PHYSICAL_PATH."/app/controller/class.TKSD.php");
    include_once(SERVER_PHYSICAL_PATH."/app/controller/class.ApplicationController.php");
      
    $mysql = new MySqldatabase(DbHost,DbUser,DbPassword,DbName);
    $application = new JApplication();
    
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
?>