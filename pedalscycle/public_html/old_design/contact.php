<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST)){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message=$_POST['message'];

  try{
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    //$mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    //$mail->SMTPAuth = true;
    $mail->Username = ''; // Gmail address which you want to use as SMTP server
    $mail->Password = ''; // Gmail address Password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom($email); // Gmail address which you used as SMTP server
    $mail->addAddress(''); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message from '.$email;
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = 'Message Sent! Thank you for contacting us.';
  } catch (Exception $e){
    $alert = $e->getMessage();
  }
}
echo $alert;
?>
                