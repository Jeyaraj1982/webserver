<?php
require(__DIR__ . '/autoload.php');
$messageBird = new \MessageBird\Client('4l1od9vPO1FCV959oWjPF9Bjc'); // Set your own API access key here.
$content = new \MessageBird\Objects\Conversation\Content();
//$content->text = 'Hello world';
$content->text = 'Your klx.co.in verification code is 8372323';
$sendMessage = new \MessageBird\Objects\Conversation\SendMessage();
$sendMessage->from = 'bf203d6cd59f4191b038d95f33542d81'; //ChannelID
//$sendMessage->to = '919944872965';
$sendMessage->to = '918903833896';
$sendMessage->content = $content;
$sendMessage->type = \MessageBird\Objects\Conversation\Content::TYPE_TEXT; //$sendMessage->type = 'text';
try {
    $sendResult = $messageBird->conversationSend->send($sendMessage);
    var_dump($sendResult);
} catch (\Exception $e) {
    echo sprintf("%s: %s", get_class($e), $e->getMessage());
}

 
?>