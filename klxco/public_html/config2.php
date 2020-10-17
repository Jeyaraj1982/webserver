<?php 
    session_start();
    date_default_timezone_set("Asia/kolkata");
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    error_reporting(0);
    if (isset($_GET['action']) && $_GET['action']=="logout") {
        session_destroy();
        $_SESSION['USER']=array();
        unset($_SESSION);
        echo "<script>location.href='https://www.klx.co.in';</script>";
        exit;
    }
     if (isset($_GET['action']) && $_GET['action']=="dologout") {
        session_destroy();
        $_SESSION['FRANCHISEE']=array();
        unset($_SESSION);
        echo "<script>location.href='https://www.klx.co.in/klxfranchisee';</script>";
        exit;
    }
    define("DBHOST","localhost");
    define("DBUSER","klxco_user");
    define("DBPASS","mysqlPwd");
    $homeUrl = "http://www.klx.co.in";
        
    $application = array("dbName"=>"klxco_database");
                  
    $dataDir = "demo"; 
    $config = array("dataDir"        => $dataDir,
                    "thumb"          => "cms/".$dataDir."/thumb/",
                    "downloads"      => "cms/".$dataDir."/download/",
                    "trash"          => "cms/".$dataDir."/trash/",
                    "backup"         => "cms/".$dataDir."/backup/",
                    "files"          => "cms/".$dataDir."/files/",
                    "slider"         => "cms/".$dataDir."/slider/",
                    "imageArray"     => array("image/jpeg","image/jpg","image/gif","image/png","image/bmp"),
                    "imgMaxSize"     => 20000000,
                    "downloadArray"  => array("image/jpeg","image/jpg","image/gif","image/png","application/pdf","application/doc","application/zip","application/oda","application/odt","application/x-zip-compressed"),
                    "downloadMaxSize" => 20000000);            
    include_once("classes/class.jca.php");
    include_once("classes/class.mysql.php");
    include_once("classes/class.jpage.php");
    include_once("classes/class.jslider.php");
    include_once("classes/class.jsuccessstory.php");
    include_once("classes/class.jfaq.php");
    include_once("classes/class.postad.php");
    include_once("classes/class.MobileSMSController.php");    
    include_once("classes/class.EmailController.php");    
    
    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__.'/lib/mail/src/Exception.php';
require __DIR__.'/lib/mail/src/PHPMailer.php';
require __DIR__.'/lib/mail/src/SMTP.php';
$mail    = new PHPMailer;
function reInitMail() {
    global $mail;
    $mail    = new PHPMailer;
}  
    
    $mysql = new MySql(DBHOST,DBUSER,DBPASS,$application['dbName']);
    $_SESSION['country']="in";
    $_SESSION['countrycode']="in";
    
    define("base_url","https://www.klx.co.in/");  
    define("country_url","https://www.klx.co.in/".$_SESSION['country']."/");

    if (isset($_GET['location']))  {
        define("path_url",country_url."d".$_GET['location']."/");    
    } else {
        define("path_url",country_url);        
    }

    function parseTextToURL($text) {
        $u = "";
        $text=str_replace(array(",",".","/","<",">","@","#","%","^","&","*","(",")","-","_","+","=","|",":",";","'",'"',"?"),"",$text);
        foreach(explode(" ",$text) as $t) {
            if (trim($t)!="") {
                $u .= "-".$t;
            }
        }
        return strtolower($u);
    }
    
    class JApplication {
    
    function getBalance($MemberID) {
        global $mysql;
        $res = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_franchisee_wallet where FranchiseeID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
    
} 

$app = new JApplication();
$application = new JApplication();
?>