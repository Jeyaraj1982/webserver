welcome
<?php

$ch = curl_init();
//$data = '{"src": "+14153336666","dst": "+919944872965", "text": "Hi, text from Plivo"}';
//$data = '{"src": "+14153336666","dst": "+919677829677", "text": "Your klx.co.in verification code is 5857"}';
//$data = '{"src": "+17068071551","dst": "+919677829677", "text": "Your klx.co.in verification code is 5857"}';
//$data = '{"src": "+447428323209","dst": "+919944872965", "text": "Your klx.co.in verification code is 5857"}';
//$data = '{"src": "+447428323209","dst": "+94766841113", "text": "Your klx.co.in verification code is 1234"}';
$data = '{"src": "+447428323209","dst": "+919944872965", "text": "Your klx.co.in verification code is 1234"}';
                                                
                                
 curl_setopt($ch, CURLOPT_URL, "https://api.plivo.com/v1/Account/MAMTQ2OTVIYWY1MDQ4ZJ/Message/");
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);           
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json"
 ));


curl_setopt($ch, CURLOPT_USERPWD, "MAMTQ2OTVIYWY1MDQ4ZJ:N2U1OGJjODY1YTc3NjVjYmEwN2MwYjAxYTNmMTEz");
$result = curl_exec($ch);
print_r($result);exit;

exit;
//require 'vendor/autoload.php';
include_once("src/Plivo/Version.php");
include_once("src/Plivo/BaseClient.php");
include_once("src/Plivo/MessageClient.php");
include_once("src/Plivo/RestClient.php");
                                                        
use Plivo\RestAPI;

$p = new RestAPI('MAMTQ2OTVIYWY1MDQ4ZJ','N2U1OGJjODY1YTc3NjVjYmEwN2MwYjAxYTNmMTEz');
//$p = new RestAPI($auth_id, $auth_token);

print_r($p);
// Send a message
$params = array(
        'src' => "+14500000",
        'dst' => "+919944872965",
        'text' => "$text",
        'type' => 'sms',
    );
$response = $p->send_message($params);
echo $response[0];
if (array_shift(array_values($response)) == "202")
{
    echo "<br/><br/>Message status: Sent";
}
else
{
    echo "<br/><br/>Error: Please ensure that From number is a valid";
}
?>