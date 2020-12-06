 
<?php

//6f14fc7723834e3b221c98ac9765f76c 
///apidid:1489140
//live:149.154.167.50:443
//test:149.154.167.40:443
//https://medium.com/@xabaras/setting-your-telegram-bot-webhook-the-easy-way-c7577b2d6f72
$apiToken = "1357308306:AAEzLgx7Qo72KoJnO4jfxM_GoqfOi9c10gg";

$data = [
    'chat_id' => '1107300198',      
    'text' => 'Hello world!'
];
                                              
 

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$apiToken/getUpdates");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
                                  

$contents = curl_exec($ch);                                  

curl_close($ch);
echo $contents;
//$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );// Do what you want with result
exit;
?>
<?php



require(__DIR__ . '/autoload.php');
$messageBird = new \MessageBird\Client('4l1od9vPO1FCV959oWjPF9Bjc'); // Set your own API access key here.     //4l1od9vPO1FCV959oWjPF9Bjc
$content = new \MessageBird\Objects\Conversation\Content();
$content->image = array(
    'url' => 'https://cdn-gc.messagebird.com/assets/images/logo.png'
);   



$sendMessage = new \MessageBird\Objects\Conversation\SendMessage();
//$sendMessage->from = '70f99db4bb8645de90d0a113abe7c7aa'; //ChannelID
//$sendMessage->from = 'bf203d6cd59f4191b038d95f33542d81'; //sms
$sendMessage->from = 'ef1289387dc44e2587fc38a72e21c73c'; //telegram
$sendMessage->to = '919944872965';
$sendMessage->content = $content;
$sendMessage->type = \MessageBird\Objects\Conversation\Content::TYPE_IMAGE; //$sendMessage->type = 'image';
try {
    $sendResult = $messageBird->conversationSend->send($sendMessage);
    var_dump($sendResult);
} catch (\Exception $e) {
    echo sprintf("%s: %s", get_class($e), $e->getMessage());
}


              
?>