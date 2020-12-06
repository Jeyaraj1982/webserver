<?php

 //70f99db4bb8645de90d0a113abe7c7aa    +44 7418 310508

// Sends a plain text message to a contact. If there's an active conversation
// with that contact the message will be added to this conversation, otherwise
// it creates a new conversation.

require(__DIR__ . '/autoload.php');

 
$messageBird = new \MessageBird\Client('4l1od9vPO1FCV959oWjPF9Bjc'); // Set your own API access key here.
$content = new \MessageBird\Objects\Conversation\Content();
$content->text = 'Hello world';
$sendMessage = new \MessageBird\Objects\Conversation\SendMessage();
$sendMessage->from = '70f99db4bb8645de90d0a113abe7c7aa'; //ChannelID
$sendMessage->to = '919944872965';
$sendMessage->content = $content;
$sendMessage->type = \MessageBird\Objects\Conversation\Content::TYPE_TEXT; //$sendMessage->type = 'text';
try {
    $sendResult = $messageBird->conversationSend->send($sendMessage);
    var_dump($sendResult);
} catch (\Exception $e) {
    echo sprintf("%s: %s", get_class($e), $e->getMessage());
}

 
 exit;
 
 $messageBird = new \MessageBird\Client('4l1od9vPO1FCV959oWjPF9Bjc'); // Set your own API access key here.     //4l1od9vPO1FCV959oWjPF9Bjc
$content = new \MessageBird\Objects\Conversation\Content();
$content->image = array(
    'url' => 'https://cdn-gc.messagebird.com/assets/images/logo.png'
);   



$sendMessage = new \MessageBird\Objects\Conversation\SendMessage();
//$sendMessage->from = '70f99db4bb8645de90d0a113abe7c7aa'; //ChannelID
//$sendMessage->from = 'bf203d6cd59f4191b038d95f33542d81'; //sms
$sendMessage->from = 'ef1289387dc44e2587fc38a72e21c73c'; //telegram
$sendMessage->to = '+919944872965';
$sendMessage->content = $content;
$sendMessage->type = \MessageBird\Objects\Conversation\Content::TYPE_IMAGE; //$sendMessage->type = 'image';
try {
    $sendResult = $messageBird->conversationSend->send($sendMessage);
    var_dump($sendResult);
} catch (\Exception $e) {
    echo sprintf("%s: %s", get_class($e), $e->getMessage());
}


exit;       

/*
$content->location = array(
    'latitude' => 52.379112,
    'longitude' => 4.900384,
);
 $message->type = \MessageBird\Objects\Conversation\Content::TYPE_LOCATION;
*/