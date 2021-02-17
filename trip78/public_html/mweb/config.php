<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
include_once("controller/DatabaseController.php");

define("SITE_PATH","https://www.trip78.in/");
if(isset($_SESSION['User']) && $_SESSION['User']['Role']=="Agent") {
    define("UserRole","agents");
} 
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","admin");
}

define("Mail_Host","mail.trip78.in");
define("SMTP_UserName","support@trip78.in");
define("SMTP_Password","Welcome@82");
define("SMTP_Sender","trip78");
          
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
    
include_once("controller/EmailController.php");   

define("Log_Path","/home/trip78/public_html/app/logs/");
$mysql   = new MySqldatabase("localhost","trip78_user","mysql@Pwd","trip78_database");
?>
 