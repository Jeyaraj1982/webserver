<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  

define("log_path","/home/japps/public_html/ecommerce/app/logs/");
include_once("app/controller/DatabaseController.php");

$mysql   = new MySqldatabase("localhost","japps_user","mysql@Pwd","japps_ecommerce");
$Logo = "http://japps.online/demo/admin/assets/Logoo.jpg";
 
if(isset($_SESSION['User']) && $_SESSION['User']['Role']=="User") {
    define("UserRole","user");
} 
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","admin");
}
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
    
include_once("classes/class.EmailController.php");     
?>
 