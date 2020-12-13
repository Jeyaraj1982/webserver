<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '/home/j2jsoftware/public_html/whatsapp/Twilio/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "ACac92475166e5019a96f55a2168367f98";

$token  = "5273913d4fd2f4bf0942e8dd964ec407";


$twilio = new Client($sid, $token);
       

$message = $twilio->messages
                  ->create("whatsapp:+919944872965", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "This is your Coupon",
                               "MediaUrl"=>["http://ggcash.in/admin/assets/cards/9894528771_9ef414e7b601e22c9f516481221420ba.png"]
                           ]
                  );

//print($message->sid);
   
exit;
?>